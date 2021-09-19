<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'edited_name' => ['required', 'min:3' ,'max:30'],
            'edited_username' => 'required',
            'edited_email' => 'required|email|min:10|max:50',
            'edited_password' => [
                                    'required',
                                    'string',
                                    'min:8', 
                                    'max:20',
                                    'regex:/[a-z]/',      
                                    'regex:/[A-Z]/',      
                                    'regex:/[0-9]/',      
                                    'regex:/[@$!%*#?&]/', 
                                ],
            'edited_confirmPassword' => 'required|same:edited_password',
            'edited_phone' => 'required|min:11|max:15'
        ];
    }
}
