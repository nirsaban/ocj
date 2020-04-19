<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "course_id" => "required|numeric",
            "category_id" => "required|numeric",
            "company" =>"required|min:2|max:50",
            "title" => "required|min:2|max:50",
            "description" => "required|min:10|max:5000",
            "requirements" => "required|min:2|max:5000",
            "salary"=>"required|min:2|max:10",
            "location"=>"required|min:5|max:50",
            "phone" =>"required|numeric|min:9",
            "email" => "required|email",
        ];
    }
    public function messages()
    {
        return [
            'course_id.required' => 'select the main subject',
            'category_id.required'  => 'select the sub category',
            'company.required' => 'fill the company input',
            'company.min' => 'the company input must be minimum 2 chars',
            'title.required' => 'fill the title input',
            'title.min' => 'the title input must be minimum 2 chars',
            'description.required' => 'fill the description input',
            'description.min' => 'the description input must be minimum 10 chars',
            'requirements.required' => 'fill the requirements input',
            'requirements.min' => 'the requirements input must be minimum 10 chars',
            'salary.required' => 'fill the salary input',
            'salary.min' => 'the title input must be minimum 5 chars',
            'location.required' => 'fill the location input',
            'location.min' => 'the location input must be minimum 2 chars',
            'phone.required' => 'fill the phone input',
            'phone.min' => 'the location input must be minimum 9 chars',
            'phone.numeric'=>'the phone input must be numeric , string given',
            "email.email" => 'this is no valid email',
            "email.required"=>'fill the email input'
        ];
    }
}

