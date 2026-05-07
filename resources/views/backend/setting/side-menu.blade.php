<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists">
            <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}"><a class="active" href="{{ route('setting.index') }}">General Setting</a></li>
            <li><a class="{{ request()->is('admin/socialMedia*') ? 'active' : '' }}" href="{{ route('socialMedia') }}">social Media</a></li>
            <li><a class="{{ request()->is('admin/seo*') ? 'active' : '' }}" href="{{ route('seo') }}">SEO | meta setting</a></li>
            <li><a class="{{ request()->is('admin/uiUX*') ? 'active' : '' }}" href="{{ route('uiUX') }}">UI/UX</a></li>
            <li><a class="{{ request()->is('admin/user*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a></li>
            {{-- <li><a class="" href="#">Payment Methods</a></li> --}}
            {{-- <li><a class="" href="#">Front CMS Setting</a></li> --}}
            {{-- <li class=""><a class="" href="#"> Prefix Setting </a></li> --}}
            {{-- <li><a class="" href="#">Roles Permissions</a></li> --}}
            {{-- <li><a class="" href="#">Backup / Restore</a></li> --}}
            {{-- <li class=""><a class="" href="#">Captcha Settings</a></li> --}}
            {{-- <li class=""><a class="" href="#">Modules</a></li> --}}
            {{-- <li class=""><a class="" href="#">System Update</a></li> --}}
        </ul>
    </div>
</div>
