<?php

namespace App\Http\Requests\Auth;

use App\Rules\PasswordIsMatch;
use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'password_old' => ['required', 'string', new PasswordIsMatch(auth()->user())],
            'password' => 'required|string|confirmed',
        ];
    }
}
