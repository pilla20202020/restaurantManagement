<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
class ProfileRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'old_password' => 'required_with:password|current_password',
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    public function profileFillData()
    {
        $data = [
            'name' => $this->get('name'),
            'email' => $this->get('email'),
        ];

        if ($this->filled('password')) {
            $data['password'] = Hash::make($this->get('password'));
        }

        return $data;
    }
}

