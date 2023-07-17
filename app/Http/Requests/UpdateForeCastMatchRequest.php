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
            'fixture_id' => ['nullable'],
            'book_marker_id' => ['nullable', 'exists:book_markers,id'],
            'forecast' => ['nullable', 'string'],
            'forecast_odd' => ['nullable', 'numeric'],
            'prediction_value' => ['nullable', 'string'],
            'prediction_odd' => ['nullable', 'numeric'],
            'is_submitted' => ['nullable', 'boolean']
        ];
    }
}