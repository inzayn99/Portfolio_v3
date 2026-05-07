<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_name'=>'required|max:250',
            'applied_stream'=>'required|max:250',
            'image'=>'nullable|mimes:svg,png,webp,jpeg,jpg',

            'full_name'=>'required|max:250',
            'email'=>'required|max:250',
            'phone'=>'required|max:250',
            'city'=>'required|max:250',
            'qualification'=>'required|max:250',
            'language_proficiency'=>'required|max:250',
            'preferred_mode_counselling'=>'required|max:250',
            'date'=>'required|max:250',
            'time'=>'required|max:250',
            'branch_id'=>'required|max:250',
            'country_preferred'=>'required|max:250',
            'preferred_mode_counselling'=>'required|max:250',
            'source_of_information'=>'required|max:250',


        ];
    }
}
