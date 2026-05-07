<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'contact_no',
        'province_no',
        'district_no',
        'local_address',
        'full_address',
        'company_logo',
        'company_second_logo',
        'company_pdf_logo',
        'footer_logo',
        'company_favicon',
        'pan_vat',
        'brief_description',

        'subscribe_sub_title',
        'subscribe_main_title',
        'news_sub_title',
        'news_main_title',
        'blog_sub_title',
        'blog_main_title',
        'post_no',
        'phone',
        'home_bg_img',

        'first_main_title',
        'second_main_title',
        'third_main_title',
        'fourth_main_title',
        'fifth_main_title',
        'sixth_main_title',
        'seventh_main_title',

        'first_sub_title',
        'second_sub_title',
        'third_sub_title',
        'fourth_sub_title',
        'fifth_sub_title',
        'sixth_sub_title',
        'seventh_sub_title',

        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
        'image_six',
        'image_seven',

        'footer_title_home',
        'footer_slogan',
        'footer_title_other',
        'footer_slogan_other',
        'get_quote',


        'facebook',
        'instagram',
        'spotify',
        'whatsapp',
        'youtube',
        'twitter',
        'github',
        'mail',
        'pdf',
        'gmail',

        'map_url',
        'aboutus',
        'linkedin',

        'university_partner',
        'worldwide_country',
        'total_branch',
        'global_admissions',

        'color_one',
        'color_two',
        'color_three',
        'color_four',
        'color_five',

        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_no', 'id')->withDefault();
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_no', 'id')->withDefault();
    }
}
