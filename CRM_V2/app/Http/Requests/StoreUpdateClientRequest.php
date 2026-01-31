<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|string|min:2|max:100|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'email'   => 'nullable|email:rfc,dns|max:150',
            'phone'   => 'nullable|regex:/^[0-9\+\-\s]{7,20}$/',
            'address' => 'nullable|string|max:255',
        ];
    }
}
