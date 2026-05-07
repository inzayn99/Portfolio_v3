<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\Resume;
use App\Models\HomeInfo;
use App\Models\LetsTalk;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Artisan;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Artisan::call('storage:link');
        // Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $setting = Setting::first();
        $contact = ContactUs::first();
        $resume = Resume::first();
        $homeinfo = HomeInfo::first();
        $lets = LetsTalk::first();

        View::share('setting', $setting);
        View::share('contact', $contact);
        View::share('resume', $resume);
        View::share('homeinfo', $homeinfo);
        View::share('lets', $lets);

        // View::share('footerMenu' , Menu::where(['parent_id'=> null,'publish_status'=>1])->whereNotIn('header_footer',['1'])
        // ->select('id', 'name', 'slug', 'position', 'parent_id','external_link','category_slug','title_slug')
        // ->orderBy('position', 'ASC')->take(8)->get());

    }
}
