<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForeCastMatchRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'book_marker_id' => ['nullable', 'exists:book_markers,id'],
            'is_submitted' => ['nullable','boolean'],
            'code' => ['nullable', 'boolean'],
            'predictions' => ['nullable', 'array'],
            'predictions.*.fixture_id' => ['nullable'],
            'predictions.*.probability' => ['nullable', 'string'],
            'predictions.*.probability_odd' => ['nullable', 'numeric'],
            'predictions.*.game_id' => ['required_if:preditions,required', 'exists:games,id'],

        ];
    }
}
