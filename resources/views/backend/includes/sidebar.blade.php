<aside class="main-sidebar" id="alert2">
    <form class="navbar-form navbar-left search-form2" role="search" action="" method="POST">
        <div class="input-group ">
            <input type="text" name="search_text" class="form-control search-form" placeholder="Search By Patient Name">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn"
                style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;" class="btn btn-flat">
                <i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>

    <section class="sidebar" id="sibe-box">
        <ul class="sidebar-menu verttop">
            <li class="treeview {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-television"></i> <span> Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/message*','admin/quick-inquiry*','admin/online-booking*','admin/scholarship-booking*','admin/full-inquiry*') ? 'active' : '' }}">
                <a href=""><i class="fas fa-envelope" aria-hidden="true"></i><span>Mails</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/message*') ? 'active' : '' }}"> <a href="{{ route('message.index') }}"><i class="fas fa-angle-right"></i> Contact Mails</a></li>
                    <li class="{{ request()->is('admin/quick-inquiry*') ? 'active' : '' }}"> <a href=""><i class="fas fa-angle-right"></i> Quick Inquiry</a></li>
                    <li class="{{ request()->is('admin/full-inquiry*') ? 'active' : '' }}"><a href=""><i class="fas fa-angle-right"></i> Full Inquiry</a></li>
                    <li class="{{ request()->is('admin/online-booking*') ? 'active' : '' }}"> <a href=""><i class="fas fa-angle-right"></i> Online Booking</a></li>
                    <li class="{{ request()->is('admin/scholarship-booking*') ? 'active' : '' }}"><a href=""><i class="fas fa-angle-right"></i> Scholarship Booking</a></li>
                </ul>
            </li>
            <li class="treeview {{ request()->is('admin/subscribers') ? 'active' : '' }}">
                <a href="">
                    <i class="fas fa-bell"></i> <span>Subscribers</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/contact-us*') ? 'active' : '' }}">
                <a href="{{ route('contact-us.index') }}"><i class="fas fa-info"></i> <span>Contact Information</span></a>
            </li>
            <li class="treeview {{ request()->is('admin/resumes*') ? 'active' : '' }}">
                <a href="{{ route('resume.index') }}"><i class="fas fa-info"></i> <span>Resume..</span></a>
            </li>
            <li class="treeview {{ request()->is('admin/homeinfo*') ? 'active' : '' }}">
                <a href="{{ route('homeinfo.index') }}"><i class="fas fa-info"></i> <span>Some Things I’ve Built.</span></a>
            </li>
            <li class="treeview {{ request()->is('admin/lets-talk*') ? 'active' : '' }}">
                <a href="{{ route('lets-talk.index') }}"><i class="fas fa-info"></i> <span>Let's talk</span></a>
            </li>
            <li class="treeview {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fas fa-user"></i> <span>Users</span>
                </a>
            </li>

             <li class="treeview {{ request()->is(['admin/projects*']) ? 'active' : '' }}">
                <a href=""><i class="fas fa-external-link-alt" aria-hidden="true"></i><span> Programming lang.</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/blog*') ? 'active' : '' }}"><a href="{{ route('projects.index') }}"><i class="fas fa-angle-right"></i>Projects</a></li>
                    <li class="{{ request()->is('admin/language*') ? 'active' : '' }}"><a href="{{ route('programming-language.index') }}"><i class="fas fa-angle-right"></i>Programming lang.</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/clients*') ? 'active' : '' }}">
                <a href="{{ route('clients.index') }}">
                    <i class="fas fa-external-link-alt"></i> <span>Clients</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/slider*') ? 'active' : '' }}">
                <a href="">
                    <i class="fas fa-object-ungroup"></i> <span> Home Banner</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/slider*') ? 'active' : '' }}">
                <a href="">
                    <i class="fas fa-object-ungroup"></i> <span> Home Banner</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/menu*') ? 'active' : '' }}">
                <a href="{{ route('menu.index') }}">
                    <i class="fas fa-bars"></i> <span>Menu Management</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/chatgpt') ? 'active' : '' }}">
                <a href="#">
                    <img src="{{ asset('uploads/chatgpt.png') }}" alt="" style="max-height: 15px"> <span>
                        &nbsp;ChatGPT</span>
                </a>
            </li>

            <li class="treeview {{ request()->is(['admin/blogs*', 'admin/authors*', 'admin/blog-category*']) ? 'active' : '' }}">
                <a href=""><i class="fa fa-newspaper" aria-hidden="true"></i><span> Blogs Management</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/blog*') ? 'active' : '' }}"><a href="{{ route('blogs.index') }}"><i class="fas fa-angle-right"></i>Blogs list</a></li>
                    <li class="{{ request()->is('admin/blog-category*') ? 'active' : '' }}"><a href="{{ route('blog-category.index') }}"><i class="fas fa-angle-right"></i>Category</a></li>
                    <li class="{{ request()->is('admin/authors*') ? 'active' : '' }}"><a href="{{ route('authors.index') }}"><i class="fas fa-angle-right"></i>Authors</a></li>
                </ul>
            </li>
            <!--setting-->
            <li class="treeview {{ request()->is(['admin/setting', 'admin/socialMedia','admin/uiUX','admin/seo','admin/users*']) ? 'active' : '' }}">
                <a href="#"><i class="fas fa-cogs"></i> <span>Setup</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}"><a href="{{ route('setting.index') }}"><i class="fas fa-angle-right"></i>Settings</a></li>
                    <li class="{{ request()->is('admin/socialMedia*') ? 'active' : '' }}"><a href="{{ route('socialMedia') }}"><i class="fas fa-angle-right"></i>Social Media</a></li>
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fas fa-angle-right"></i>Users</a></li>
                    <li class="{{ request()->is('admin/uiUX*') ? 'active' : '' }}"><a href="{{ route('uiUX') }}"><i class="fas fa-angle-right"></i>UI-UX</a></li>
                    <li class="{{ request()->is('admin/seo*') ? 'active' : '' }}"><a href="{{ route('seo') }}"><i class="fas fa-angle-right"></i>SEO</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
