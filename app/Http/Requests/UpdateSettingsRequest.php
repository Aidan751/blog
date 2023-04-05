<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'site_name' => 'required|max:255',
            'about_us' => 'required',
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'nullable|max:255',
            'city' => 'required|max:255',
            'state' => 'nullable|max:255',
            'country' => 'required|max:255',
            'zip_code' => 'nullable|max:255',
            'contact_number' => 'required|max:255',
            'contact_description' => 'required|max:255',
            'contact_email' => 'required|max:255',
            'email_description' => 'required|max:255',
        ];
    }
}
