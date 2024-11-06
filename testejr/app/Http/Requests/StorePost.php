<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        if($method = 'PUT')
        return [
            'Titulo' => 'required|string',
            'Conteudo' => 'required|string',
        ];

        return [
            'Titulo' => 'required|string',
            'Conteudo' => 'required|string',
            'categoria' => 'selected_category',
            'autor' => 'required|string',
        ];
    }
}
