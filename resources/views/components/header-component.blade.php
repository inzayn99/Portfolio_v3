<!-- <div class="page"> -->
<!--Preloader-->
<div class="preloader">
    <div class="centrize full-width">
        <div class="vertical-center">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</div>
<!--Header-->
<header class="header">
    <!-- logo -->
    <div class="logo">
        <a href="{{ route('index') }}">
            <span>A</span>
        </a>
    </div>
    <!-- menu -->
    <div class="top-menu">
        <ul>
            <li class="active">
                <a href="#home-card">
                    <i class="icon la la-home"></i>
                    <span class="link">Home</span>
                </a>
            </li>
            <li>
                <a href="#about-card">
                    <i class="icon la la-external-link"></i>
                    <span class="link">Projects</span>

                </a>
            </li>
            <li>
                <a href="#resume-card">
                    <i class="icon la la-user"></i>
                    <span class="link">About</span>
                </a>
            </li>
            <li>
                <a href="#works-card">
                    <i class="icon icon la la-eye"></i>
                    <span class="link">Works</span>
                </a>
            </li>
            <li>
                <a href="#blog-card">
                    {{-- <i class="icon fa-solid fa-newspaper"></i> --}}
                    <span class="icon la la-newspaper-o"></span>
                    <span class="link">Blogs</span>
                </a>
            </li>
            {{-- <li>
                <a href="#blog-card">
                    <span class="icon la la-mountains"></span>
                    <span class="link">Adventure</span>
                </a>
            </li> --}}
            <li>
                <a href="#contacts-card">
                    <i class="icon la la-envelope"></i>
                    <span class="link">Contacts</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Started socials -->
    <div class="social">

        <a target="_blank" href="{{ $setting->linkedin }}">
            <i class="icon fa-brands fa-linkedin-in"></i>
        </a>
        <a target="_blank" href="{{ $setting->twitter }}">
            <i class="icon fa-brands fa-x-twitter"></i>
        </a>
        <a target="_blank" href="{{ $setting->spotify }}">
            <i class="icon fa-brands fa-spotify"></i>
        </a>
        <a target="_blank" href="{{ $setting->github }}">
            <i class="icon fa-brands fa-github"></i>
        </a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $setting->whatsapp }}">
            <i class="icon fa-brands fa-whatsapp"></i>
        </a>

        <a target="_blank" href="https://drive.google.com/file/d/1mBSxYiEjvCoLg0infB9EPIJwtSFLC0ZM/view">
            <span class="icon la la-download" style="font-size: 20px !important;"></span>
        </a>
    </div>
    <!-- Mobile Menu -->
    <span class="menu-btn">
        <span class="m-line"></span>
    </span>
</header>
