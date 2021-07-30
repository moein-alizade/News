<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPostRequest extends FormRequest
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
            // اعتبار سنجی
            'slug' => ['required', 'unique:posts,slug'],
// exists => برای چک کردن اینکه آیدی که به سمت ما می آید بصورت رندوم نباشه و قصد مختل کردن سایت ما نباشد
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required'],
            'body' => ['required']
        ];
    }
}
