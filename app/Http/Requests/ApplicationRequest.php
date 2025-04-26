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
            'name' => 'required|string|max:255|',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'name.max' => 'Поле "Имя" не должно превышать 255 символов',
            'phone.required' => 'Поле "Номер телофона" обязательно для заполнения',
            'phome.max' => 'Поле "Номер телофона" не должно превышать  символов',
            'email.required' => 'Поле "Почта" не должно превышать 255 символов',
            'email.max' => 'Поле "Почта" не должно превышать 255 символов',
            'description.required' => 'Поле "Описание" не должно превышать 255 символов',
        ];
    }
}
