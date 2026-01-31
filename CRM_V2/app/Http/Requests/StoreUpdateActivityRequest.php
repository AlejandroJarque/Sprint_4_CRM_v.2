<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateActivityRequest extends FormRequest
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
            'description' => 'nullable|string',
            'activity_date' => 'required|date|after_or_equal:today',
            'client_id'   => 'required|exists:clients,id',
            'status'      => 'required|string|max:50',
            'type'        => 'required|string|max:50',
        ];
    }
}
