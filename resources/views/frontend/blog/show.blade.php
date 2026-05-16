@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <div class="container">

        <!-- Card - Blog Detail -->
        <div class="card-inner active" id="blog-card">
            <div class="row card-container">

                <!-- Left: Blog Content (inside simplebar — scrollable) -->
                <div class="card-wrap blog-content-col col col-m-12 col-t-12 col-d-12 col-d-lg-6" data-simplebar>

                    <!-- Inner Top -->
                    {{-- <div class="content inner-top">
                        <div class="row">
                            <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                                <div class="title-bg">{{ Str::limit($blog->title, 20) }}</div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Blog Single -->
                    <div class="content blog-single">
                        <div class="row">
                            <div class="col col-m-12 col-t-12 col-d-12 col-d-lg-12">
                                <div class="post-box card-box"
                                    style="background: transparent !important; -webkit-box-shadow: none;">
                                    <h1>{{ $blog->title }}</h1>
                                    <div class="blog-detail">
                                        Posted: {{ $blog->created_at->format('d F Y') }}
                                        <span class="reading-time">
                                            <i class="fa-regular fa-clock"></i> {{ $blog->reading_time }} min read
                                        </span>
                                    </div>
                                    <div class="blog-content">
                                        {!! $blog->description !!}
                                    </div>

                                    <!-- Prev / Next Navigation -->
                                    @if($prev || $next)
                                    <div class="blog-prevnext">
                                        <div class="blog-prevnext-item prev-item">
                                            @if($prev)
                                            <a href="{{ route('blogs', $prev->slug) }}" class="prevnext-link">
                                                <span class="prevnext-dir">
                                                    <i class="fa-solid fa-arrow-left"></i> Previous
                                                </span>
                                                <span class="prevnext-title">{{ Str::limit($prev->title, 55) }}</span>
                                                <span class="prevnext-date">{{ $prev->created_at->format('d M Y') }}</span>
                                            </a>
                                            @endif
                                        </div>

                                        <div class="prevnext-divider"></div>

                                        <div class="blog-prevnext-item next-item">
                                            @if($next)
                                            <a href="{{ route('blogs', $next->slug) }}" class="prevnext-link next-link">
                                                <span class="prevnext-dir">
                                                    Next <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                <span class="prevnext-title">{{ Str::limit($next->title, 55) }}</span>
                                                <span class="prevnext-date">{{ $next->created_at->format('d M Y') }}</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Share Buttons -->
                                    <div class="blog-share">
                                        <span class="blog-share-label">Share</span>
                                        <div class="blog-share-buttons">
                                            <a class="share-btn share-twitter"
                                                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}"
                                                target="_blank" rel="noopener" title="Share on X (Twitter)">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                            <a class="share-btn share-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank" rel="noopener" title="Share on Facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a class="share-btn share-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank" rel="noopener" title="Share on LinkedIn">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                            <a class="share-btn share-whatsapp"
                                                href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . request()->fullUrl()) }}"
                                                target="_blank" rel="noopener" title="Share on WhatsApp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                            <button class="share-btn share-copy" onclick="copyBlogLink(this)"
                                                title="Copy link">
                                                <i class="fa-solid fa-link"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: Sidebar (outside simplebar — does NOT scroll with content) -->
                <div class="blog-sidebar col col-m-12 col-t-12 col-d-3 col-d-lg-3">

                    <!-- Recent Posts -->
                    <div class="sidebar-widget recent-posts-widget">
                        <div class="sidebar-widget-title">Recent Posts</div>
                        <ul class="recent-posts-list">
                            @foreach ($recents as $recent)
                                @if ($recent->slug !== $blog->slug)
                                    <li class="recent-post-item">
                                        <a href="{{ route('blogs', $recent->slug) }}"
                                            style="color: {{ $recent->color ?? 'inherit' }}">
                                            {{ $recent->title }}
                                        </a>
                                        <span class="recent-post-date">{{ $recent->created_at->format('d M Y') }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Contact Form -->
                    <div class="sidebar-widget contact-widget">
                        <span class="tag-dec">&lt;html&gt;</span>
                        <span class="tag-dec tag-dec--indent">&lt;head&gt;</span>
                        <span class="tag-dec tag-dec--indent">&lt;body&gt;</span>

                        <span class="tag-dec tag-dec--indent">&lt;form&gt;</span>
                        <form id="sidebarContact" action="{{ route('message.store') }}" method="POST"
                            class="sidebar-contact-form">
                            @csrf
                            <div class="group-val">
                                <input type="text" name="full_name" placeholder="Full Name" required />
                            </div>
                            <div class="group-val">
                                <input type="text" name="phone" placeholder="Phone" />
                            </div>
                            <div class="group-val">
                                <input type="email" name="email" placeholder="Email Address" required />
                            </div>
                            <div class="group-val">
                                <input type="text" name="subject"
                                    placeholder="Any key milestones or ideal start date?" />
                            </div>
                            <div class="group-val">
                                <select name="engagement" class="sidebar-select">
                                    <option value="" disabled selected>What type of engagement do you look for?
                                    </option>
                                    <option value="freelance">Freelance / Contract</option>
                                    <option value="fulltime">Full-time</option>
                                    <option value="parttime">Part-time</option>
                                    <option value="consulting">Consulting</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="group-val">
                                <select name="budget" class="sidebar-select">
                                    <option value="" disabled selected>What's the expected investment range?</option>
                                    <option value="<1k">Less than $1,000</option>
                                    <option value="1k-5k">$1,000 – $5,000</option>
                                    <option value="5k-10k">$5,000 – $10,000</option>
                                    <option value="10k-25k">$10,000 – $25,000</option>
                                    <option value=">25k">$25,000+</option>
                                </select>
                            </div>
                            <div class="group-val">
                                <textarea name="message" placeholder="How can we help?" rows="4"></textarea>
                            </div>
                            <div class="align-left">
                                <button type="submit" class="contact-button sidebar-submit-btn">
                                    <div>
                                        <span class="bg"></span>
                                        <span class="base"></span>
                                        <span class="text">Send Message</span>
                                    </div>
                                </button>
                            </div>
                        </form>
                        <span class="tag-dec tag-dec--indent">&lt;/form&gt;</span>

                        <span class="tag-dec tag-dec--indent">&lt;/body&gt;</span>
                        <span class="tag-dec">&lt;/html&gt;</span>
                    </div>

                </div>
                <!-- End Sidebar -->

            </div>
        </div>

        <!-- Lines Grid -->
        <div class="lines-grid">
            <div class="row">
                <div class="col col-m-12 col-t-6 col-d-4 col-d-lg-3"></div>
                <div class="col col-m-12 col-t-6 col-d-4 col-d-lg-3">
                    <div class="lines">
                        <div class="line-1"></div>
                        <div class="line-2" style="animation-delay: 10s;"></div>
                    </div>
                </div>
                <div class="col col-m-12 col-t-6 col-d-4 col-d-lg-3">
                    <div class="lines">
                        <div class="line-1"></div>
                    </div>
                </div>
                <div class="col col-m-0 col-t-0 col-d-0 col-d-lg-3">
                    <div class="lines">
                        <div class="line-1"></div>
                        <div class="line-2" style="animation-delay: 0s;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <style>
        .content.inner-top .title-bg {
            top: -3px !important;
            font-size: 115px !important;
        }

        .copyCode {
            position: relative;
            background-color: #050404 !important;
            box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
            border: 0.2px solid #313131 !important;
            border-radius: 8px !important;
            padding: 12px 16px 16px !important;
            overflow: hidden;
        }

        .copyCode span {
            background-color: transparent !important;
            font-size: 12px !important;
        }

        .copy-code-btn {
            position: absolute;
            top: 10px;
            right: 12px;
            background: rgba(255, 255, 255, 0.07);
            border: none;
            cursor: pointer;
            color: #888;
            padding: 4px 10px;
            border-radius: 4px;
            transition: color 0.2s, background 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .copy-code-btn:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.12);
        }

        .copy-code-btn.copied {
            color: #28c840;
        }

        .copy-code-btn i {
            font-size: 13px;
        }

        /* Card container: flex row so both cols sit side by side */
        #blog-card .card-container {
            display: flex !important;
            flex-direction: row !important;
            height: 100% !important;
            overflow: hidden !important;
        }

        /* Left blog content col — takes its own simplebar scroll */
        #blog-card .blog-content-col {
            flex: 0 0 68%;
            max-width: 68%;
            margin-left: auto;
            height: 100% !important;
            overflow: hidden !important;
        }

        /* Hide SimpleBar scrollbar track on blog content */
        #blog-card .blog-content-col .simplebar-track {
            display: none !important;
        }

        /* Prev / Next navigation */
        .blog-prevnext {
            display: flex;
            align-items: stretch;
            gap: 0;
            margin-top: 40px;
            margin-bottom: 8px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            overflow: hidden;
        }

        .blog-prevnext-item {
            flex: 1;
            min-width: 0;
        }

        .prevnext-link {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 20px 22px;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.02);
            transition: background 0.2s;
            height: 100%;
            box-sizing: border-box;
        }

        .prevnext-link:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .next-item .prevnext-link {
            align-items: flex-end;
            text-align: right;
        }

        .prevnext-dir {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #555;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .next-item .prevnext-dir {
            justify-content: flex-end;
        }

        .prevnext-link:hover .prevnext-dir {
            color: #40d392;
        }

        .prevnext-title {
            font-size: 14px;
            font-weight: 600;
            color: #ccc;
            line-height: 1.4;
            transition: color 0.2s;
        }

        .prevnext-link:hover .prevnext-title {
            color: #fff;
        }

        .prevnext-date {
            font-size: 11px;
            color: #444;
        }

        .prevnext-divider {
            width: 1px;
            background: rgba(255, 255, 255, 0.08);
            flex-shrink: 0;
        }

        /* Share buttons */
        .blog-share {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 5px;
            padding-top: 24px;
            /* border-top: 1px solid rgba(255, 255, 255, 0.08); */
        }

        .blog-share-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #666;
            white-space: nowrap;
        }

        .blog-share-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.04);
            color: #aaa;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.15s;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        .share-twitter:hover {
            background: #000;
            border-color: #000;
        }

        .share-facebook:hover {
            background: #1877f2;
            border-color: #1877f2;
        }

        .share-linkedin:hover {
            background: #0a66c2;
            border-color: #0a66c2;
        }

        .share-whatsapp:hover {
            background: #25d366;
            border-color: #25d366;
        }

        .share-copy:hover {
            background: #555;
            border-color: #555;
        }

        .share-copy.copied {
            background: #4caf50;
            border-color: #4caf50;
            color: #fff;
        }

        /* Right sidebar — sticky, never scrolls with content */
        #blog-card .blog-sidebar {
            flex: 0 0 25%;
            max-width: 25%;
            position: sticky;
            top: 0;
            align-self: flex-start;
            max-height: 100vh;
            overflow-y: auto;
            padding: 30px 20px 30px 24px;
            box-sizing: border-box;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        #blog-card .blog-sidebar::-webkit-scrollbar {
            display: none;
        }

        /* Sidebar widgets */
        .sidebar-widget {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .sidebar-widget-title {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Recent posts */
        .recent-posts-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .recent-post-item {
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .recent-post-item:last-child {
            border-bottom: none;
        }

        .recent-post-item a {
            font-size: 15px;
            font-weight: 600;
            line-height: 1.4;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .recent-post-item a:hover {
            opacity: 0.7;
        }

        .recent-post-date {
            font-size: 11px;
            color: #666;
        }

        /* Tag decorators inside sidebar */
        .contact-widget .tag-dec {
            display: block;
            font-family: 'La Belle Aurore', cursive;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.25);
            line-height: 1.8;
        }

        .contact-widget .tag-dec.tag-dec--indent {
            padding-left: 16px;
        }

        /* Sidebar contact form */
        .sidebar-contact-form .group-val {
            margin-bottom: 10px;
        }

        .sidebar-contact-form input,
        .sidebar-contact-form textarea,
        .sidebar-contact-form .sidebar-select {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 6px;
            padding: 9px 12px;
            color: #ccc;
            font-size: 12px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
            box-sizing: border-box;
        }

        .sidebar-contact-form input::placeholder,
        .sidebar-contact-form textarea::placeholder {
            color: #4a4a4a;
        }

        .sidebar-contact-form input:focus,
        .sidebar-contact-form textarea:focus,
        .sidebar-contact-form .sidebar-select:focus {
            border-color: rgba(255, 255, 255, 0.25);
            background: rgba(255, 255, 255, 0.06);
        }

        .sidebar-contact-form textarea {
            resize: vertical;
            min-height: 90px;
        }

        /* Select with custom arrow */
        .sidebar-contact-form .sidebar-select {
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath fill='%23666' d='M0 0l5 6 5-6z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 32px;
        }

        .sidebar-contact-form .sidebar-select option {
            background: #1E1E1E;
            color: #ccc;
        }

        .sidebar-contact-form .sidebar-select option:disabled {
            color: #4a4a4a;
        }

        .sidebar-submit-btn {
            height: 38px;
            line-height: 38px;
            border-bottom: none !important;
            font-size: 12px;
            margin-top: 4px;
        }

        @media (max-width: 1024px) {
            #blog-card .card-container {
                flex-direction: column !important;
                overflow-y: auto !important;
            }

            #blog-card .blog-content-col,
            #blog-card .blog-sidebar {
                flex: 0 0 100% !important;
                max-width: 100% !important;
                height: auto !important;
                overflow: visible !important;
            }

            #blog-card .blog-sidebar {
                padding: 0 20px 30px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Inject copy button into every .copyCode block
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.copyCode').forEach(function(block) {
                var btn = document.createElement('button');
                btn.className = 'copy-code-btn';
                btn.innerHTML = '<i class="fa-regular fa-copy"></i> Copy';
                btn.addEventListener('click', function() {
                    var text = block.innerText.replace(/^Copy\n?/, '').trim();
                    navigator.clipboard.writeText(text).then(function() {
                        btn.innerHTML = '<i class="fa-solid fa-check"></i> Copied';
                        btn.classList.add('copied');
                        setTimeout(function() {
                            btn.innerHTML =
                                '<i class="fa-regular fa-copy"></i> Copy';
                            btn.classList.remove('copied');
                        }, 2000);
                    });
                });
                block.appendChild(btn);
            });
        });

        function copyBlogLink(btn) {
            navigator.clipboard.writeText(window.location.href).then(function() {
                btn.classList.add('copied');
                btn.querySelector('i').className = 'class="las la-check-circle';
                setTimeout(function() {
                    btn.classList.remove('copied');
                    btn.querySelector('i').className = 'las-solid fa-link';
                }, 2000);
            });
        }

        function showSidebarToast(message, type) {
            var existing = document.getElementById('sidebarToast');
            if (existing) existing.remove();

            var toast = document.createElement('div');
            toast.id = 'sidebarToast';
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

            var icon = type === 'success' ?
                '<i class="fa-solid fa-circle-check" style="font-size:20px;flex-shrink:0;"></i>' :
                '<i class="fa-solid fa-circle-exclamation" style="font-size:20px;flex-shrink:0;"></i>';

            toast.innerHTML = icon + '<span>' + message + '</span>';
            document.body.appendChild(toast);

            setTimeout(function() {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s ease';
                setTimeout(function() {
                    toast.remove();
                }, 300);
            }, 4000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('sidebarContact');
            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                var btn = form.querySelector('button[type="submit"]');
                var originalText = btn.querySelector('.text').innerText;
                btn.disabled = true;
                btn.querySelector('.text').innerText = 'Sending…';

                var formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(function(res) {
                        return res.json().then(function(data) {
                            return {
                                status: res.status,
                                data: data
                            };
                        });
                    })
                    .then(function(res) {
                        btn.disabled = false;
                        btn.querySelector('.text').innerText = originalText;

                        if (res.status === 422 && res.data.errors) {
                            var msg = Object.values(res.data.errors).map(function(e) {
                                return e[0];
                            }).join(' ');
                            showSidebarToast(msg, 'error');
                            return;
                        }

                        if (res.data.success) {
                            form.reset();
                            showSidebarToast(res.data.success, 'success');
                            return;
                        }

                        showSidebarToast(res.data.error || 'Something went wrong.', 'error');
                    })
                    .catch(function() {
                        btn.disabled = false;
                        btn.querySelector('.text').innerText = originalText;
                        showSidebarToast('Network error. Please try again.', 'error');
                    });
            });
        });
    </script>
@endpush
