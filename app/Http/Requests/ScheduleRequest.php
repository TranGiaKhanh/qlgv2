<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'teacher' => 'required|min:3|max:50',
            'class' => 'max:255'
        ];
    }

    public function messages()
    {
        return[
            'teacher.required' => 'Không được để trống tên',
        ];
    }
}
