<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'mailsubject' => 'required',
            'content' => 'required',
            // 'file' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'mailsubject.required' => 'Por favor informe o assunto',
            'content.required' => 'Por favor informe o conteúdo',
            // 'file.required' => 'Por favor anexe os arquivos',
        ];
    }
}
