<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentFormRequest;
use App\Models\Menu;
use App\Models\MailMessages;
use App\Mail\UserSubmissionMail;
use App\Models\Setting;
use App\Models\Projects;
use App\Models\Clients;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use LDAP\Result;

class FrontController extends Controller
{
    public function content($type)
    {
        return Content::status()->where('content_type',$type)->first();
    }

    public function index()
    {
        $blogs = Blog::where('publish_status',1)->take(12)->latest()->get();
        $clients = Clients::where('publish_status',1)->take(12)->latest()->get();
        $miniblog = Blog::where('publish_status',1)->take(8)->latest()->get();
        $project_list = Projects::where('publish_status',1)->latest()->get();
        $gallery = Projects::where('publish_status',1)->where('shown_on_gallery',1)->latest()->get();
        $pro_main = Projects::where('publish_status',1)->where('shown_on_main',1)->latest()->get();

        $meta =$this->getMeta();

        return view('frontend.index', compact( 'meta','blogs','miniblog','pro_main','gallery','project_list','clients'));
    }

    private function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['meta_title']  ?? $meta['title'] ?? config('settings.meta_title'),
            'meta_keywords' => $meta['meta_keywords']  ?? config('settings.meta_keywords'),
            'meta_description' => $meta['meta_description']  ?? config('settings.meta_description'),
            'meta_keyphrase' =>  $meta['meta_keyphrase'] ?? config('settings.meta_description'),
            'og_image' => $meta['image'] ?? config('settings.og_image'),
            'og_url' => route('index'),
            'og_site_name' => config('settings.name'),
            'twitter' => config('settings.twitter'),
        ];
    }



    public function blogsLoadMore(Request $request)
    {
        $page    = (int) $request->get('page', 2);
        $perPage = (int) $request->get('per_page', 8);
        $blogs   = Blog::where('publish_status', 1)->latest()->paginate($perPage, ['*'], 'page', $page);

        $html = '';
        foreach ($blogs as $blog) {
            $html .= '
            <div class="post-article-wrapper">
                <span class="tag-dec">&lt;articles&gt;</span>
                <article class="post-articles">
                    <div class="blog-post-title">
                        <h5>
                            <a href="' . route('blogs', $blog->slug) . '" target="_blank" style="color: ' . e($blog->color) . '">
                                ' . e($blog->title) . '
                            </a>
                        </h5>
                    </div>
                    <time class="post-date">' . \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') . '</time>
                    <div class="blog-post-content">
                        <p>' . e(\Illuminate\Support\Str::limit(strip_tags($blog->description), 120)) . '</p>
                    </div>
                </article>
                <span class="tag-dec">&lt;/article&gt;</span>
            </div>';
        }

        return response()->json([
            'html'      => $html,
            'has_more'  => $blogs->hasMorePages(),
            'next_page' => $page + 1,
        ]);
    }

    //BlogDetails//
    public function blogDetail($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $recents  = Blog::status()->take(10)->latest()->get();
        $blog->page_visit += 1;
        $blog->update();
        // $blogCats = BlogCategory::where('publish_status',1)->take(7)->latest()->get();
        $meta = [
            'meta_title' => $blog->meta_title ? $blog->meta_title : $blog->title,
            'meta_keyword' => $blog->meta_keywords ? $blog->meta_keywords : $blog->title,
            'meta_description' => $blog->meta_description ? $blog->meta_description : $blog->description,
            'og_image' => Storage::disk('uploads')->url($blog->og_image ? $blog->og_image : $blog->cover_image),
            'og_site_name' => companydata('company_name'),
        ];
        return view('frontend.blog.show',compact('blog','meta','recents'));
    }


     // Mail-message
     public function messageSave(Request $request)
     {
         $this->validate($request, [
             'full_name'  => 'required|max:250',
             'email'      => 'required|max:250|email',
             'phone'      => 'nullable|max:20',
             'subject'    => 'nullable|max:250',
             'engagement' => 'nullable|max:50',
             'budget'     => 'nullable|max:50',
             'message'    => 'nullable|max:5000',
         ]);

         try {
             MailMessages::create([
                 'full_name'  => $request->full_name,
                 'email'      => $request->email,
                 'phone'      => $request->phone,
                 'subject'    => $request->subject,
                 'engagement' => $request->engagement,
                 'budget'     => $request->budget,
                 'message'    => $request->message,
             ]);

             try {
                 $data['email'] = $request->email;
                 Mail::send('emails.usersubmissionmail', $data, function ($message) use ($data) {
                     $message->to($data['email'])->subject('Message Received.');
                 });

                 $adminEmail = Setting::first()->email;
                 $userEmail  = $request->email;
                 Mail::send('emails.adminContact', compact('userEmail'), function ($message) use ($adminEmail) {
                     $message->to($adminEmail)->subject('Message Received.');
                 });
             } catch (\Exception $mailError) {
                 \Log::warning('Mail sending failed: ' . $mailError->getMessage());
             }

             if ($request->ajax()) {
                 return response()->json(['success' => 'Message sent successfully!']);
             }

             return redirect()->back()->with('success', 'Thank you! We will get back to you soon.');

         } catch (\Exception $e) {
             if ($request->ajax()) {
                 return response()->json(['error' => $e->getMessage()], 500);
             }

             return redirect()->back()->with('error', $e->getMessage());
         }
     }

    // Subscribers
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'You have already subscribed.',
        ]);

        try {
            $subscriber = new Subscribers();
            $subscriber->email = $request->email;
            $subscriber->is_read = 0;
            $subscriber->save();

            if ($request->ajax()) {
                return response()->json(['success' => 'Thank you for your subscription.']);
            }

            return redirect()->back()->with('success', 'Thank you for your subscription. We will get back to you soon.');
        } catch (\Exception $error) {
            if ($request->ajax()) {
                return response()->json(['error' => $error->getMessage()], 500);
            }

            return redirect()->back()->with('error', 'Something went wrong: ' . $error->getMessage());
        }
    }


}
