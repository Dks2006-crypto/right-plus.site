<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
        return [
            'form.name' => 'required|string|max:255|',
            'form.phone' => 'required|string|max:20',
            'form.email' => 'required|email|max:255',
            'form.description' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'form.name.required' => 'Поле "Имя" обязательно для заполнения',
            'form.name.max' => 'Поле "Имя" не должно превышать 255 символов',
            'form.phone.required' => 'Поле "Номер телофона" обязательно для заполнения',
            'form.phome.max' => 'Поле "Номер телофона" не должно превышать 20 символов',
            'form.email.required' => 'Поле "Eamil" обязательно для заполнения',
            'form.email.max' => 'Поле "Email" не должно превышать 255 символов',
            'form.description.required' => 'Поле "Описание" обязательно для заполнения',
        ];
    }
}
