<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Menu;
use App\Models\ContactUs;
use App\Models\BlogCategory;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['meta_title']  ?? $meta['title'] ?? config('settings.name'),
            'meta_keyword' => $meta['meta_keywords']  ?? config('settings.meta_keyword'),
            'meta_description' => $meta['meta_description']  ?? config('settings.meta_description'),
            'meta_keyphrase' =>  $meta['meta_keyphrase'] ?? config('settings.meta_description'),
            'og_image' => $meta['og_image'] ?? config('settings.og_image'),
            'og_url' => route('index'),
            'og_site_name' => config('settings.name'),
            'twitter' => config('settings.twitter'),
        ];
    }

    public $keyValue = [
        'home' => 'home',
        'contact' => 'contact',
        'blogs' => 'blogs',
        'gallery' => 'gallery',
        'page' => 'page',

    ];

    public function category($category)
    {
        // return $category;
        $category  = Menu::where('category_slug', $category)->firstOrFail();
        $requiredFunction =  $this->keyValue[$category->category_slug];
        try {
            return $this->$requiredFunction($category);
        } catch (\Throwable $th) {
            return  abort('404');
        }
    }

    private function home()
    {
        return redirect()->route('index');
    }

    private function blogs($category)
    {
        // $blogCats = BlogCategory::where('publish_status',1)->take(7)->latest()->get();
        // $blogs = Blog::status()->latest()->paginate(10);

        return view('frontend.blog.blog', compact('category'))->with('meta', $this->getMeta($category));
    }

    //--COMMON--PAGE--//
    public function page($category)
    {
        // if($category=="message")
        // {

        //    $message =  Content::status()->where('content_type','Message')->firstOrFail();
        //     return view('frontend.chairman-message.detail',compact('message','dm'))->with('meta', $this->getMeta($message));
        // }

        // $dm = Content::status()->where('content_type','Digital Marketing')->first();
        $data = Menu::where(['title_slug'=>$category,'publish_status'=>1])->first();

        return view('frontend.page', compact('data'))->with('category','meta', $this->getMeta($data));
    }

    // public function courseAndMessage($category_slug,$content_slug)
    // {
    //     if($category_slug=='message'){

    //         $message = Content::where(['delete_status'=>0,'content_url'=>$content_slug])->first();
    //         // return $category_slug;
    //         $meta = $this->getMeta($message);
    //         return view('frontend.chairman-message.detail',compact('message','meta'));
    //     }
    //     if($category_slug=='course'){
    //         $course = Course::status()->where('slug',$content_slug)->first();
    //         $relatedCourses = Course::status()->where('course_category',$course->course_category)->latest()->take(5)->get();
    //         $meta = $this->getMeta($course);
    //         return view('frontend.course.course-detail',compact('course','relatedCourses','meta'));

    //     }
    // }
}
