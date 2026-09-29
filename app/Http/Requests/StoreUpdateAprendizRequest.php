<?php

namespace App\Http\Requests;

use App\Models\Aprendiz;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        $aprendiz = $this->route('aprendiz');

        return $this->user()?->can($aprendiz ? 'update' : 'create', $aprendiz ?? Aprendiz::class) ?? false;
    }

    public function rules(): array
    {
        $id = $this->route('aprendiz')?->id;
        return [
            'nombre' => ['required', 'string', 'max:120'],
            'documento' => ['required', 'string', 'max:40', Rule::unique('aprendices', 'documento')->ignore($id)],
            'correo' => ['required', 'email', 'max:120', Rule::unique('aprendices', 'correo')->ignore($id)],
            'ficha_id' => ['nullable', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'documento.required' => 'El documento es obligatorio.',
            'documento.unique' => 'El documento ya existe.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo no es válido.',
            'correo.unique' => 'El correo ya existe.',
            'ficha_id.integer' => 'La ficha debe ser numérica.',
        ];
    }
}
