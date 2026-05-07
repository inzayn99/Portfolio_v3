<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuCategory::insert([
            [

                'name' => 'Home',
                'slug' => Str::slug('Home')
            ],
            [
                'name' => 'About Us',
                'slug' => Str::slug('About')
            ],
            [
                'name' => 'Page',
                'slug' => Str::slug('Page')
            ],
            [
                'name' => 'Contact Us',
                'slug' => Str::slug('Contact')
            ],
            [
                'name' => 'Tour',
                'slug' => Str::slug('Tour')
            ],

            [
                'name' => 'Blogs',
                'slug' => Str::slug('Blogs')
            ],
            [
                'name' => 'News',
                'slug' => Str::slug('news')
            ],
            
           
        ]);

        Menu::insert([
            [
                'name' => 'Home',
                'page_title'=>'Home',
                'slug' => 'home',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'home',
                'main_child'=>0,
                'position'=>0
            ],
            [
                'name' => 'About Us',
                'page_title'=>'About',
                'slug' => Str::slug('About'),
                // 'external_link'=>'#about_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'about',
                'main_child'=>0,
                'position'=>0

            ],
            [
                'name' => 'Blog',
                'page_title'=>'Blog',
                'slug' => Str::slug('Blog'),
                // 'external_link'=>'#blog_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'blogs',
                'main_child'=>0,
                'position'=>0

            ],
            [
                'name' => 'News',
                'page_title'=>'News',
                'slug' => Str::slug('News'),
                // 'external_link'=>'#news_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'news',
                'main_child'=>0,
                'position'=>0

            ],
            [
                'name' => 'Tours',
                'page_title'=>'Tours',
                'slug' => Str::slug('tour'),
                // 'external_link'=>'#blog_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'tour',
                'main_child'=>0,
                'position'=>0

            ],
            [
            'name' => 'Contact Us',
            'page_title'=>'Contact Us',
            'slug' => 'contact',
            // 'external_link'=>'#contact_wrapper',
            'publish_status'=>1,
            'header_footer'=>1,
            'category_slug'=>'contact',
            'main_child'=>0,
            'position'=>0
            ]

        ]);
    }
}
