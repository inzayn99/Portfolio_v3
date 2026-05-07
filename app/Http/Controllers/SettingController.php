<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\District;
use App\Models\MissionMessages;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $provinces = Province::all();
        $districts = District::where('province_id', $setting->province_no)->get();
        return view('backend.setting.company_setting', compact('provinces', 'districts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }

    public function socialMedia()
    {
        // $setting = Setting::first();
        return view('backend.setting.socialmedia');
    }
    public function uiUX()
    {
        $setting = Setting::first();
        return view('backend.setting.ui-ux');
    }
    public function seo()
    {
        $setting = Setting::first();
        return view('backend.setting.seo');
    }

    public function aboutUs()
    {
        // $setting = Setting::first();
        $mission = MissionMessages::first();
        return view('backend.setting.aboutus', compact('mission'));
    }

    public function updateMissionVision(Request $request, $id)
    {

    }

    public function update(SettingRequest $request, $id)
    {
        $setting = Setting::first();
        // $mission_messages = MissionMessages::first();
        if(isset($_POST['companySetting']))
        {
            $setting->update([
                'company_name' => $request['company_name'],
                'email' => $request['email'],
                'contact_no' => $request['contact_no'],
                'phone' => $request['phone'],
                'post_no' => $request['post_no'],
                'pan_vat' => $request['pan_vat'],
                'province_no' => $request['province'],
                'district_no' => $request['district'],
                'local_address' => $request['local_address'],
                'full_address' => $request['full_address'],
                'company_logo' => $request->company_logo,
                'company_second_logo' => $request->company_second_logo,
                'company_pdf_logo' => $request->company_pdf_logo,
                'footer_logo' => $request->footer_logo,
                'company_favicon' => $request->company_favicon,
                'map_url' => $request['map_url'],
                'brief_description' => $request['brief_description'],

                'university_partner'=> $request['university_partner'],
                'worldwide_country'=> $request['worldwide_country'],
                'total_branch'=> $request['total_branch'],
                'global_admissions'=> $request['global_admissions'],

            ]);
            return redirect()->back()->with('success', 'Company information successfully updated.');
        }
        elseif (isset($_POST['metaSetting']))
        {
            $setting->update([
                'meta_title' => $request['meta_title'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_description' => $request['meta_description'],
                'og_image' => $request->og_image,
            ]);
            return redirect()->back()->with('success', 'Meta information successfully updated.');

        }
        elseif (isset($_POST['uiUX']))
        {
            $setting->update([
                'color_one' => $request['color_one'],
                'color_two' => $request['color_two'],
                'color_two' => $request['color_two'],
                'color_three' => $request['color_three'],
                'color_four' => $request['color_four'],
                'color_five' => $request['color_five'],
            ]);
            return redirect()->back()->with('success', 'UI-UX information successfully updated.');

        }
        elseif (isset($_POST['socialMedia']))
        {
            $setting->update([
                'facebook' => $request['facebook'],
                'instagram' => $request['instagram'],
                'spotify' => $request['spotify'],
                'whatsapp' => $request['whatsapp'],
                'youtube' => $request['youtube'],
                'twitter' => $request['twitter'],
                'linkedin' => $request['linkedin'],
                'github' => $request['github'],
                'gmail' => $request['gmail'],
                'pdf' => $request['pdf']
            ]);
            return redirect()->back()->with('success', 'Social media information successfully updated.');

        }

        elseif (isset($_POST['home']))
        {
            $setting->update([
                'subscribe_sub_title'=>$request->subscribe_sub_title,
                'subscribe_main_title'=>$request->subscribe_main_title,
                'news_sub_title'=>$request->news_sub_title,
                'news_main_title'=>$request->news_main_title,
                'blog_sub_title'=>$request->blog_sub_title,
                'blog_main_title'=>$request->blog_main_title,
                'home_bg_img'=>$request->home_bg_img,
                'first_main_title'=>$request->first_main_title,
                'second_main_title'=>$request->second_main_title,
                'third_main_title'=>$request->third_main_title,
                'fourth_main_title'=>$request->fourth_main_title,
                'fifth_main_title'=>$request->fifth_main_title,
                'sixth_main_title'=>$request->sixth_main_title,
                'seventh_main_title'=>$request->seventh_main_title,

                'first_sub_title'=>$request->first_sub_title,
                'second_sub_title'=>$request->second_sub_title,
                'third_sub_title'=>$request->third_sub_title,
                'fourth_sub_title'=>$request->fourth_sub_title,
                'fifth_sub_title'=>$request->fifth_sub_title,
                'sixth_sub_title'=>$request->sixth_sub_title,
                'seventh_sub_title'=>$request->seventh_sub_title,

                'image_one'=>$request->image_one,
                'image_two'=>$request->image_two,
                'image_three'=>$request->image_three,
                'image_four'=>$request->image_four,
                'image_five'=>$request->image_five,
                'image_six'=>$request->image_six,
                'image_seven'=>$request->image_seven,

                'color_one'=>$request->color_one,
                'color_two'=>$request->color_two,
                'color_three'=>$request->color_three,
                'color_four'=>$request->color_four,
                'color_five'=>$request->color_five,

                'footer_title_home'=>$request->footer_title_home,
                'footer_slogan'=>$request->footer_slogan,
                'footer_title_other'=>$request->footer_title_other,
                'footer_slogan_other'=>$request->footer_slogan_other,

            ]);
            return redirect()->back()->with('success', 'Home information successfully updated.');

            // $mission_messages->update([
            //     'mission' => $request['mission'],
            //     'vision' => $request['vision'],
            //     'company_values' => $request['company_values'],
            //     'welcome_title' => $request['welcome_title'],
            //     'welcome_sub_title' => $request['welcome_sub_title'],
            //     'welcome_message' => $request['welcome_message'],
            //     'youtube_link' => $request['youtube_link'],
            // ]);

        }

    }

    public function destroy(Setting $setting)
    {
        //
    }

    public function getdistricts($id)
    {
        $districts = District::where('province_id', $id)->get();
        return response()->json($districts);
    }
}
