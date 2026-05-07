@extends('frontend.layouts.app')

@section('meta')
    @include('frontend.includes.meta')
@endsection

@section('content')
    {{-- Card: Started / Hero --}}
    <div class="card-inner card-started active" id="home-card">

        {{-- <div id="home-poster">
            <img src="{{ asset('frontend/assets/images/deploy.svg') }}" alt="image" />
        </div> --}}

        <div id="sound">
            <i class="fa-brands fa-soundcloud sound-cloud"></i>
            <span>Sound</span>
            <div class="on-off">
                <span id="off">OFF</span>
                <span id="on">ON</span>
            </div>
        </div>

        <canvas id="canvas" style="position: absolute; left: 0; z-index: 1"></canvas>

        <div class="slide"></div>

        <div class="centrize full-width">
            <div class="vertical-center">
                <div class="cover">
                    <div class="text-zone">

                        <span class="tag-dec">&lt;html&gt;</span>
                        <span class="tag-dec tag-dec--indent">&lt;head&gt;</span>
                        <span class="tag-dec tag-dec--indent">&lt;body&gt;</span>

                        <h1>
                            <span class="rubber_band">Hi,</span>
                            <br />
                            <span class="rubber_band">I'm Arbaaz Khan,</span>
                            <br />
                            <span class="rubber_band">I build things for the web.</span>
                        </h1>

                        <p class="gray-text"
                            style="
                                font-family: 'Nanum Pen Script', cursive;
                                font-size: 1.5rem;
                                line-height: 1.6rem;
                                color: #979797;
                                font-weight: 500;
                                padding-bottom: 40px;">
                            To gain confidence and fame using my potential in the field of Web Development
                            <br />
                            and express my innovative creative skills for self and company growth.
                        </p>

                        <span class="tag-dec">&lt;div&gt;</span>
                        <a href="mailto:{{ $setting->email }}" class="contact-button" style="margin-top: 0">
                            <div>
                                <span class="bg"></span>
                                <span class="base"></span>
                                <span class="text"> Hire me! </span>
                            </div>
                        </a>
                        <span class="tag-dec">&lt;/div&gt;</span>

                        <span class="tag-dec tag-dec--top">&lt;/body&gt;</span>
                        <span class="tag-dec">&lt;/html&gt;</span>

                    </div>


                </div>
            </div>
        </div>

        <div class="scroll-down">
            <span>arbaazkh4n@gmail.com</span>
            <i class="fa-solid fa-arrow-down"></i>
        </div>

        <div class="scroll-down scroll-down--left">
            <span>scroll down</span>
            <i class="fa-solid fa-arrow-down"></i>
        </div>

        {{-- Section: Work / Portfolio --}}
        <div>
            <div id="section-work" class="myPortfolio_wrapper">
                <div id="header">
                    <h2>{{ $homeinfo->title }}</h2>
                </div>
                <div class="text-zone-2">
                    <div>
                        <p>{!! $homeinfo->description !!}</p>
                    </div>
                    <div id="timeline">
                        <img src="{{ asset('frontend/assets/images/timeline1.png') }}" alt="image" />
                    </div>
                    <div class="links_wrap">
                        <span class="tag-dec">&lt;div&gt;</span>
                        <a href="https://drive.google.com/file/d/1mBSxYiEjvCoLg0infB9EPIJwtSFLC0ZM/view"
                            class="contact-button" style="margin-top: 0" target="_blank">
                            <div>
                                <span class="bg"></span>
                                <span class="base"></span>
                                <span class="text link">View Resume!</span>
                            </div>
                        </a>
                        <span class="tag-dec">&lt;/div&gt;</span>
                    </div>
                </div>
                <div class="fake-big fake-big-2">Work</div>
            </div>
        </div>

        {{-- Section: Magic Wall --}}
        <div id="home-magicwall">
            {{-- Row 1: left to right --}}
            <div class="marquee-row">
                <div class="marquee-track track-ltr">
                    @foreach ($pro_main as $data)
                        <div class="magic-wall_item">
                            <img src="{{ $data->cover_image }}" alt="{{ $data->title }}" />
                            <a href="{{ $data->link }}" target="_blank"></a>
                        </div>
                    @endforeach
                    @foreach ($pro_main as $data)
                        <div class="magic-wall_item">
                            <img src="{{ $data->cover_image }}" alt="{{ $data->title }}" />
                            <a href="{{ $data->link }}" target="_blank"></a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Row 2: right to left --}}
            <div class="marquee-row">
                <div class="marquee-track track-rtl">
                    @foreach ($pro_main as $data)
                        <div class="magic-wall_item">
                            <img src="{{ $data->cover_image }}" alt="{{ $data->title }}" />
                            <a href="{{ $data->link }}" target="_blank"></a>
                        </div>
                    @endforeach
                    @foreach ($pro_main as $data)
                        <div class="magic-wall_item">
                            <img src="{{ $data->cover_image }}" alt="{{ $data->title }}" />
                            <a href="{{ $data->link }}" target="_blank"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Section: Skills --}}
        <div>
            <div id="section-about" class="about_author_wrapper">
                <div class="text-zone3">
                    <div id="header">
                        <h2>Come on, Let's talk,<br> But you first.</h2>
                    </div>
                    <p>{!! $lets->description !!}</p>
                    <p class="extraordinary-text">Let's build something extraordinary!</p>
                </div>
                <div class="skills-charts">
                    <div id="myCanvasContainer">
                        <canvas width="500" height="500" id="myCanvas">
                            <ul id="tags">
                                <li><a href="#" target="_blank">HTML</a></li>
                                <li><a href="#" target="_blank">CSS</a></li>
                                <li><a href="#" target="_blank">ES5</a></li>
                                <li><a href="#" target="_blank">TypeScript</a></li>
                                <li><a href="#" target="_blank">REST</a></li>
                                <li><a href="#" target="_blank">JSON</a></li>
                                <li><a href="#" target="_blank">LARAVEL</a></li>
                                <li><a href="#" target="_blank">Data Science</a></li>
                                <li><a href="#" target="_blank">API</a></li>
                                <li><a href="#" target="_blank">PHP</a></li>
                                <li><a href="#" target="_blank">VueJs</a></li>
                                <li><a href="#" target="_blank">Node.js</a></li>
                                <li><a href="#" target="_blank">Git</a></li>
                                <li><a href="#" target="_blank">VPS</a></li>
                                <li><a href="#" target="_blank">_Hacking</a></li>
                                <li><a href="#" target="_blank">Bitbucket</a></li>
                                <li><a href="#" target="_blank">SASS</a></li>
                                <li><a href="#" target="_blank">JQuery</a></li>
                                <li><a href="#" target="_blank">Docker</a></li>
                                <li><a href="#" target="_blank">AI</a></li>
                                <li><a href="#" target="_blank">npm</a></li>
                                <li><a href="#" target="_blank">Express.js</a></li>
                            </ul>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section: Blog Articles (Home) --}}
        <div>
            <div data-load="blog" id="section-blog" class="section-full section-blog js-way">
                <div class="fake-big fake-big-2">Blogs</div>
                <div class="blog-articles" id="blog-grid-home">
                    @foreach ($miniblog as $data)
                        <div class="post-article-wrapper">
                            <span class="tag-dec">&lt;articles&gt;</span>
                            <article class="post-articles">
                                <div class="blog-post-title">
                                    <h5>
                                        <a href="{{ route('blogs', $data->slug) }}" target="blank"
                                            style="color: {{ $data->color }}">
                                            {{ $data->title }}
                                        </a>
                                    </h5>
                                </div>
                                <time
                                    class="post-date">{{ \Carbon\Carbon::parse($data->created_at)->format('F d, Y') }}</time>
                                <div class="blog-post-content">
                                    <p>{!! Str_limit(strip_tags($data->description), 120) !!}</p>
                                </div>
                            </article>
                            <span class="tag-dec">&lt;/article&gt;</span>
                        </div>
                    @endforeach
                    {{-- <div class="load-more-blogs-wrap" id="loadMoreBlogsHomeWrap">
                        <a class="load-more-blogs-btn"
                           id="loadMoreBlogsHome"
                           href="#"
                           data-page="2"
                           data-per-page="8"
                           data-url="{{ route('blogs.load-more') }}"
                           data-grid="blog-grid-home"
                           data-wrap="loadMoreBlogsHomeWrap">
                            Load more Blogs <span class="load-more-blogs-arrow">↓</span>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

    {{-- Card: Archive --}}
    <div class="card-inner" id="about-card">
        <div class="row card-container">
            <div class="card-wrap col col-m-12 col-t-12 col-d-8 col-d-lg-12" data-simplebar>

                <blockquote class="archive_titleh1">
                    <h1>Archive</h1>
                </blockquote>
                <blockquote class="sub-title_archive">
                    <h1>A big list of things I've worked on.</h1>
                </blockquote>

                <div class="content inner-top">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="whole-responsive">
                                <div class="table-wrapper-archive">
                                    <div class="col-year common-col">Year</div>
                                    <div class="col-title common-col">Title</div>
                                    <div class="col-made-at common-col">Made at</div>
                                    <div class="col-built-with common-col">Built with</div>
                                    <div class="col-link common-col">links</div>
                                </div>
                                @foreach ($project_list as $data)
                                    <div class="table-wrapper-archive table-tt">
                                        <div class="col-year common-rw">{{ $data->year }}</div>
                                        <div class="col-title common-rw">{{ $data->title }}</div>
                                        <div class="col-made-at common-rw">{{ $data->made_at }}</div>
                                        <div class="col-built-with common-rw">
                                            @foreach ($data->programmingLanguages as $language)
                                                <span class="built_with">{{ $language->title }}</span>
                                            @endforeach
                                            @if ($data->programmingLanguages->count() == 0)
                                                <span class="text-muted">No languages specified</span>
                                            @endif
                                        </div>
                                        <div class="col-link common-rw">
                                            @if ($data->link)
                                                <a href="{{ $data->link }}" target="_blank">
                                                    <i class="icon icon la la-external-link"></i>

                                                </a>
                                            @endif
                                            @if ($data->github_link)
                                                <a href="{{ $data->github_link }}" target="_blank">
                                                    <i class="icon la la-github"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Card: Resume --}}
    <div class="card-inner" id="resume-card">
        <div class="row card-container">
            <div class="card-wrap col col-m-12 col-t-12 col-d-8 col-d-lg-6" data-simplebar>

                <div class="card-image col col-m-12 col-t-12 col-d-4 col-d-lg-6"
                    style="background-image: url('{{ $resume->cover }}')">
                </div>

                <div class="content inner-top">
                    <div class="row">
                        <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                            <div class="title-bg">{{ $resume->title }}</div>
                            <div class="text">
                                <p>{!! $resume->description !!}</p>
                            </div>
                            <div class="circle-bts">
                                <a href="https://drive.google.com/file/d/1mBSxYiEjvCoLg0infB9EPIJwtSFLC0ZM/view"
                                    target="_blank">
                                    <span>
                                        <i class="icon la la-download"></i>
                                        Download CV
                                    </span>
                                </a>
                                <a href="{{ $setting->github }}" target="_blank">
                                    <i class="icon fa-brands fa-github"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone={{ $setting->whatsapp }}" target="_blank">
                                    <i class="icon fa-brands fa-whatsapp"></i>
                                </a>
                                <a href="{{ $setting->linkedin }}" target="_blank">
                                    <i class="icon fa-brands fa-linkedin"></i>
                                </a>
                                <a href="{{ $setting->spotify }}" target="_blank">
                                    <i class="icon fa-brands fa-spotify"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Work Experience --}}
                <div class="content resume">
                    <div class="row">
                        <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                            <div class="title">
                                <span>Where I've </span>Worked
                            </div>
                            <div class="resume-items card-box">
                                <div class="resume-item">
                                    <div class="name">Full Stack Developer</div>
                                    <div class="date">
                                        Aug 2023-Present
                                        <span>|</span>
                                        Third Rock Adventures.
                                    </div>
                                    <p>
                                        <small>
                                            - Developed and maintained web applications utilizing Laravel and Vue.js,
                                            enhancing functionality and performance.<br>
                                            - Engaged collaboratively with cross-functional teams to strategically
                                            identify and prioritize project requirements.<br>
                                            - Implementation of innovative features and functionalities.<br>
                                            - Interact web update and websites changes, assist and support in the
                                            upkeep and maintenance site fix bugs and resolve problem.
                                        </small>
                                    </p>
                                </div>
                                <div class="resume-item">
                                    <div class="name">Backend Developer</div>
                                    <div class="date">
                                        May 2022 - Nov 2022
                                        <span>|</span>
                                        Nectar Digit.
                                    </div>
                                    <p>
                                        <small>
                                            - Backend implementation built using PHP and Laravel to handle API
                                            integrations and database operations.<br>
                                            - Collaborated with cross-functional teams to identify and prioritize
                                            project requirements.<br>
                                            - Database management utilized MySQL as the database to store and manage
                                            product information and user data.<br>
                                            - Conducted code reviews and provided guidance to junior developers.<br>
                                            - Product catalog, shopping card functionality: Created a product catalog
                                            with features like search, filtering, and sorting.
                                        </small>
                                    </p>
                                </div>
                                <div class="resume-item">
                                    <div class="name">Full Stack Developer</div>
                                    <div class="date">
                                        Feb 2020 - Jan 2022
                                        <span>|</span>
                                        Etihad Technology.
                                    </div>
                                    <p>
                                        <small>
                                            - Designed and developed user-friendly websites, including optimized
                                            checkout page that increased user clicks.<br>
                                            - Worked closely with the design team to ensure applications were
                                            visually appealing and user-friendly.<br>
                                            - Version control system: Git, GitHub, Bitbucket, Docker, Postman, AJAX,
                                            jQuery, APIs.<br>
                                            - Effectively managed database for AI chatbot and Voicebots, ensuring
                                            seamless integration functionality.
                                        </small>
                                    </p>
                                </div>
                                <div class="resume-item">
                                    <div class="name">Internship</div>
                                    <div class="date">
                                        May 2019 - July 2019
                                        <span>|</span>
                                        ITTraining Nepal
                                    </div>
                                    <p>
                                        <small>
                                            - Assisted in the development of dynamic websites for clients.<br>
                                            - Worked as an intern in backend development on PHP and Laravel.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Skills --}}
                <div class="content skills">
                    <div class="row">
                        <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                            <div class="title">
                                <span>Technologies</span> I've been working with recently
                            </div>
                            <div class="skills-list">
                                <ul>
                                    <li>
                                        <div class="name">Laravel</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 90%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">Vue.js</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 50%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">JavaScript (ES6+)</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 75%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">NodeJs</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 60%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">PHP</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 80%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">TypeScript</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 50%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">Git, GitHub, Bitbucket, GitLab</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 85%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">CSS, Bootstrap, Tailwind, Postcss, SCSS</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 70%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="name">Postman</div>
                                        <div class="progress">
                                            <div class="percentage" style="width: 90%"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Skills & Tools --}}
                <div class="content clients">
                    <div class="row">
                        <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                            <div class="title">
                                <span>Skills & Tools</span>
                                <p>Learned by coding all night and debugging all day!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row client-items">
                        @foreach ($clients as $data)
                            <div class="col col-m-6 col-t-6 col-d-3 col-d-lg-3" style="padding: 0px 3px !important;">
                                <div class="client-item card-box">
                                    <div class="image">
                                        <a target="_blank" href="{{ $data->link }}">
                                            <img src="{{ $data->cover_image }}" alt="{{ $data->title }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Card: Works / Noteworthy Projects --}}
    <div class="card-inner" id="works-card">
        <div class="row card-container">
            <div class="card-wrap col col-m-12 col-t-12 col-d-8 col-d-lg-12" data-simplebar>

                <div class="mw-grid">

                    {{-- tile 1 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/thirdrockadventures.jpeg') }}"
                                    alt="Third Rock Adventures" loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/trek77/600/600" alt="Third Rock Adventures back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="https://www.thirdrockadventures.com/" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Third Rock Adventures</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 2 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/ideal.jpg') }}" alt="Ideal Study Abroad"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/study42/600/600" alt="Ideal Study Abroad back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="https://idealstudyabroad.com/" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Ideal Study Abroad</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 3 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/quickfix.jpeg') }}" alt="Quickfix V3"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/fix91/600/600" alt="Quickfix V3 back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="https://quickfix.com.np/" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Quickfix V3</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 4 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/urjakhabar.jpeg') }}" alt="Urja Khabar"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/energy55/600/600" alt="Urja Khabar back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="https://www.urjakhabar.com/" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Urja Khabar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 5 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/abh.jpg') }}" alt="Apsara Boutique Hotel"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/hotel33/600/600" alt="Apsara Boutique Hotel back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="https://apsaraboutiquehotel.com/" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Apsara Boutique Hotel</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 6 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/saajha.jpg') }}" alt="Saajha Project"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/arch21/600/600" alt="Saajha back" loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Saajha</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 7 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/NEB.jpg') }}" alt="NEB Project"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/forest88/600/600" alt="NEB back" loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">NEB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 8 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/london-block.jpg') }}" alt="London Block"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/city14/600/600" alt="London Block back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">London Block</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 9 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/DAVBUSSINESS.jpg') }}" alt="DAV Business"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/office62/600/600" alt="DAV Business back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">DAV Business</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 10 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/dav.jpg') }}" alt="DAV School"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/campus39/600/600" alt="DAV School back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">DAV School</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 11 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/davclz.jpg') }}" alt="DAV College"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/river72/600/600" alt="DAV College back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">DAV College</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 12 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/davschool.jpg') }}" alt="DAV School 2"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/mount56/600/600" alt="DAV School 2 back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">DAV School 2</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 13 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/medical.jpg') }}" alt="Medical Project"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/wave18/600/600" alt="Medical back" loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Medical</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 14 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/unnamed.jpg') }}" alt="Project 14"
                                    loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/urban44/600/600" alt="Project 14 back"
                                    loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Project 14</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tile 15 --}}
                    <div class="mw-tile">
                        <div class="mw-tile-inner">
                            <div class="mw-tile-front">
                                <img src="{{ asset('frontend/assets/images/3.jpg') }}" alt="Project 15" loading="lazy">
                            </div>
                            <div class="mw-tile-back">
                                <img src="https://picsum.photos/seed/sky99/600/600" alt="Project 15 back" loading="lazy">
                                <div class="mw-hover">
                                    <a href="#" target="_blank" class="mw-btn">
                                        <span>VIEW<br>PROJECT</span>
                                    </a>
                                    <p class="mw-tile-name">Project 15</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- Card: Blog --}}
    <div class="card-inner" id="blog-card">
        <div class="row card-container">
            <div class="card-wrap col col-m-12 col-t-12 col-d-8 col-d-lg-12" data-simplebar>
                <div>
                    <div data-load="blog" class="section-full section-blog js-way">
                        <div class="fake-big fake-big-2">Blogs</div>
                        <div class="blog-articles" id="blog-grid-card">
                            @foreach ($blogs as $article)
                                <div class="post-article-wrapper">
                                    <span class="tag-dec">&lt;articles&gt;</span>
                                    <article class="post-articles">
                                        <div class="blog-post-title">
                                            <h5>
                                                <a href="{{ route('blogs', $article->slug) }}" target="_blank"
                                                    style="color: {{ $article->color }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h5>
                                        </div>
                                        <time
                                            class="post-date">{{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</time>
                                        <div class="blog-post-content">
                                            <p>{!! Str_limit(strip_tags($article->description), 140) !!}</p>
                                        </div>
                                    </article>
                                    <span class="tag-dec">&lt;/article&gt;</span>
                                </div>
                            @endforeach
                            <div class="load-more-blogs-wrap" id="loadMoreBlogsCardWrap">
                                <a class="load-more-blogs-btn"
                                   id="loadMoreBlogsCard"
                                   href="#"
                                   data-page="2"
                                   data-per-page="8"
                                   data-url="{{ route('blogs.load-more') }}"
                                   data-grid="blog-grid-card"
                                   data-wrap="loadMoreBlogsCardWrap">
                                    Load more Blogs <span class="load-more-blogs-arrow">↓</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card: Contacts --}}
    <div class="card-inner" id="contacts-card">
        <div class="ct-layout">

            {{-- Left: Form --}}
            <div class="ct-left">
                <div class="ct-inner">

                    <div class="ct-title-wrap">
                        <h2 class="ct-title">Let's Work Together.</h2>
                    </div>

                    {{-- <span class="tag-dec tag-dec--top">&lt;p&gt;</span> --}}
                    {{-- <p class="ct-desc">Although I’m not currently looking for any new opportunities, my inbox is always
                        open. Whether you have a question or just want to say hi, I’ll try my best to get back to you!
                    </p> --}}
                    {{-- <span class="tag-dec">&lt;/p&gt;</span> --}}

                    <span class="tag-dec tag-dec--top">&lt;form&gt;</span>
                    <form id="messageSave" action="{{ route('message.store') }}" method="POST" class="ct-form">
                        @csrf
                        @method('POST')
                        <div class="ct-row-2">
                            <input type="text" name="full_name" placeholder="Full Name" />
                            <input type="text" name="phone" placeholder="Phone" />
                        </div>
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="text" name="subject" placeholder="Any key milestones or ideal start date?" />
                        <select name="engagement" class="ct-select">
                            <option value="" disabled selected>What type of engagement do you look for?</option>
                            <option value="freelance">Freelance / Contract</option>
                            <option value="fulltime">Full-time</option>
                            <option value="parttime">Part-time</option>
                            <option value="consulting">Consulting</option>
                            <option value="other">Other</option>
                        </select>
                        <select name="budget" class="ct-select">
                            <option value="" disabled selected>What's the expected investment range?</option>
                            <option value="<1k">Less than $1,000</option>
                            <option value="1k-5k">$1,000 – $5,000</option>
                            <option value="5k-10k">$5,000 – $10,000</option>
                            <option value="10k-25k">$10,000 – $25,000</option>
                            <option value=">25k">$25,000+</option>
                        </select>
                        <textarea name="message" placeholder="How can we help?" rows="5"></textarea>
                        <div class="ct-submit-wrap">
                            <button type="submit" class="contact-button ct-btn"
                                style="border-bottom: none; height: 40px; line-height: 40px;">
                                <div>
                                    <span class="bg"></span>
                                    <span class="base"></span>
                                    <span class="text">Send message</span>
                                </div>
                            </button>
                        </div>
                    </form>
                    <span class="tag-dec">&lt;/form&gt;</span>

                    <span class="tag-dec tag-dec--top">&lt;/body&gt;</span>
                    <span class="tag-dec">&lt;/html&gt;</span>

                </div>
            </div>

            {{-- Right: Map --}}
            <div class="ct-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.4321327830617!2d85.3302660504342!3d27.703940982708943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a04496d4b7%3A0xba6ad16c6cb08ecc!2sMaitidevi%20chowk!5e0!3m2!1sen!2snp!4v1640709632776!5m2!1sen!2snp"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

        </div>
    </div>

    {{-- Lines Grid removed --}}
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('viewResume');
            if (btn) {
                btn.addEventListener('click', function() {
                    window.open('https://drive.google.com/file/d/1mBSxYiEjvCoLg0infB9EPIJwtSFLC0ZM/view', '_blank');
                });
            }
        });
    </script>

    <script>
        function showContactToast(message, type) {
            var existing = document.getElementById('contactToast');
            if (existing) existing.remove();

            var toast = document.createElement('div');
            toast.id = 'contactToast';
            toast.style.cssText = [
                'position:fixed',
                'bottom:30px',
                'right:30px',
                'z-index:99999',
                'background:' + (type === 'success' ? '#16a34a' : '#e53935'),
                'color:#fff',
                'padding:14px 20px',
                'border-radius:10px',
                'font-size:14px',
                'font-weight:600',
                'box-shadow:0 8px 24px rgba(0,0,0,0.25)',
                'display:flex',
                'align-items:center',
                'gap:10px',
                'max-width:340px',
            ].join(';');

            var icon = type === 'success'
                ? '<i class="fa-solid fa-circle-check" style="font-size:20px;flex-shrink:0;"></i>'
                : '<i class="fa-solid fa-circle-exclamation" style="font-size:20px;flex-shrink:0;"></i>';

            toast.innerHTML = icon + '<span>' + message + '</span>';
            document.body.appendChild(toast);

            setTimeout(function () {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s ease';
                setTimeout(function () { toast.remove(); }, 300);
            }, 4000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('messageSave');
            if (!form) return;

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var btn = form.querySelector('button[type="submit"]');
                var originalText = btn.querySelector('.text') ? btn.querySelector('.text').innerText : btn.innerText;
                btn.disabled = true;
                if (btn.querySelector('.text')) btn.querySelector('.text').innerText = 'Sending…';

                var formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(function (res) {
                    return res.json().then(function (data) {
                        return { status: res.status, data: data };
                    });
                })
                .then(function (res) {
                    btn.disabled = false;
                    if (btn.querySelector('.text')) btn.querySelector('.text').innerText = originalText;

                    if (res.status === 422 && res.data.errors) {
                        var msg = Object.values(res.data.errors).map(function (e) { return e[0]; }).join(' ');
                        showContactToast(msg, 'error');
                        return;
                    }

                    if (res.data.success) {
                        form.reset();
                        showContactToast(res.data.success, 'success');
                        return;
                    }

                    showContactToast(res.data.error || 'Something went wrong.', 'error');
                })
                .catch(function () {
                    btn.disabled = false;
                    if (btn.querySelector('.text')) btn.querySelector('.text').innerText = originalText;
                    showContactToast('Network error. Please try again.', 'error');
                });
            });
        });
    </script>
@endpush
