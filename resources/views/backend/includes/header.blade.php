<header class="main-header" id="alert">
    <a href="{{ env('APP_URL') }}" target="blank" class="logo">
        <span class="logo-mini"><img width="31" height="19"
                src="{{ $setting->company_favicon ?? asset('uploads/234234.png') }}" alt="{{ $setting->company_name }}" /></span>
        <span class="logo-lg"><img src="{{ $setting->company_logo ?? asset('uploads/234234.png') }}" alt="{{ $setting->company_name }}" /></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" onclick="collapseSidebar()" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
            <span href="{{ env('APP_URL') }}"
                class="sidebar-session">{{ $setting->company_name ?? 'Etihad technology pvt.ltd' }} </span>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
            <div class="pull-right">
                <form class="navbar-form navbar-left search-form" role="search" action="" method="POST">
                    <div class="input-group" style="padding-top:3px;">
                        <input type="text" name="search_text" class="form-control search-form search-form3"
                            placeholder="{{ __('Search Data List') }}">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn"
                                style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;"
                                class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <div class="navbar-custom-menu">
                    <!-- Messages Dropdown Menu -->
                    @php
                        $unread_messages = \App\Models\MailMessages::where('is_read', 0)->get();
                    @endphp
                    {{-- <div class="langdiv">
                        <select class="languageselectpicker" onchange="set_languages(this.value)" type="text" id="languageSwitcher">
                            <option data-content='<span class="flag-icon flag-icon-us"></span> English' value="4"Selected></option>
                            <option data-content='<span class="flag-icon flag-icon-sa"></span> Arabic' value="5"></option>
                            <option data-content='<span class="flag-icon flag-icon-in"></span> Hindi' value="66"></option>
                            <option data-content='<span class="flag-icon flag-icon-es"></span> Spanish' value="26"></option>
                            <option data-content='<span class="flag-icon flag-icon-tr"></span> Turkish' value="61"></option>
                            <option data-content='<span class="flag-icon flag-icon-ru"></span> Russian' value="50"></option>
                            <option data-content='<span class="flag-icon flag-icon-fr"></span> French' value="65"></option>

                        </select>
                    </div> --}}

                    <ul class="nav navbar-nav headertopmenu">
                        <li class="cal15">
                            <a href="" data-placement="bottom" data-toggle="tooltip"
                                data-original-title="Mails"><i class="fas fa-envelope"></i><span
                                    class='label label-warning'>{{ $unread_messages->count() }}</span></a>
                        </li>

                        <li class="cal15">
                            <a href="" data-placement="bottom" data-toggle="tooltip"
                                data-original-title="Scholarship"><i class="fas fa-graduation-cap"></i><span
                                    class='label label-warning'>3</span></a>
                        </li>

                        <li class="cal15">
                            <a href="" data-placement="bottom" data-toggle="tooltip"
                                data-original-title="Book"><i class="fas fa-users"></i><span class='label label-warning'>4</span></a>
                        </li>

                        <li class="cal15">
                            <a data-placement="bottom" data-toggle="tooltip" data-original-title="Subscriber"
                                href="" class="dropdown-toggle todoicon"><i class="fa fa-bell"></i>
                                <span class="todo-indicator"></span>
                            </a>
                        </li>

                        <!-- user-profile -->
                        <li class="dropdown user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('profile.show') }}"
                                aria-expanded="false">
                                <img src="{{ asset('uploads/company-logo.jpg') }}" class="topuser-image" alt="User Image">
                            </a>
                            <ul class="dropdown-menu dropdown-user menuboxshadow">
                                <li>
                                    <div class="sstopuser">
                                        <div class="ssuserleft">
                                            <a href="{{ route('profile.show') }}"><img src="{{ asset('uploads/company-logo.jpg') }}" alt="User Image"></a>
                                        </div>

                                        <div class="sstopuser-test">
                                            <h4 style="text-transform: capitalize;">{{ Auth::user()->name }} </h4>
                                            <h5>{{ Auth::user()->email }}</h5>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="sspass">
                                            <a href="{{ route('profile.show') }}" data-toggle="tooltip" title=""
                                                data-original-title="My Profile"><i class="fa fa-user"></i>Profile</a>
                                            <a class="pl25" href="{{ route('profile.show') }}" data-toggle="tooltip"
                                                title="" data-original-title="Change Password"><i
                                                    class="fa fa-key"></i>Password</a>

                                            <!-- Hidden logout form -->
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                            <!-- Anchor tag with logout functionality -->
                                            <a class="pull-right" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out fa-fw"></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                    <!--./sstopuser-->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
