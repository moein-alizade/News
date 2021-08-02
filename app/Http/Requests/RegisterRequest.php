<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        // کاربر ما اجازه ی فرستادن request دارد یا خیر؟ به نوعی اجازه ی عبور کردن ما را می دهد و درخواستی که سمت ما اومده معتبر هست یا خیر؟
        // return true;

        // در صورتی که کاربر لاگین نبود آنگاه اجازه ی ثبت نام داشته باشد
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required','unique:users,email', 'email'],
            'mobile' => ['required', 'unique:users,mobile'],
            'password' => ['required', 'confirmed'],
        ];
    }
}
