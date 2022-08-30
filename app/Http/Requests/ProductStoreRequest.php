<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|string|max:25',
            'description' => 'nullable|string|max:100',
            'category' => 'required|string|regex:/^[\pL\s\-]+$/u|string|max:50',
            'time_and_date' => 'nullable|date',
        ];
    }
}
