<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50'],
            'permissions' => ['array'],
            // چک کنیم ببینیم آیدی هاش معتبر هست و یا نه یعنی حتما توی دیتابیس مان موجود باشد
            // .*   =>  all indexes into this array
            'permissions.*' => ['exists:permissions,id'],
        ];
    }
}
