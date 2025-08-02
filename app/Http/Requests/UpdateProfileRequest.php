<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{


    public function rules(): array
    {
        $users = auth()->user()->id;
        return [
            'name'=>'required|min:6|max:255',
            'email'=>['required','email',
            Rule::unique('users')->ignore($users)
        ],
        'state_id'=>'required|numeric|exists:states,id'

        ];
    }
}
