<?php

namespace App\Http\Requests;

use App\Enums\PredictionScore;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ForeCastMatchRequest extends FormRequest
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
            'book_marker_id' => ['required', 'exists:book_markers,id'],
            'is_submitted' => ['nullable','boolean'],
            'code' => ['nullable', 'boolean'],
            'predictions' => ['required', 'array'],
            'predictions.*.fixture_id' => ['required'],

            'predictions.*.probability_id' => ['required', 'exists:probabilities,id'],
            'predictions.*.prediction_odd' => ['nullable', 'numeric'],
            'predictions.*.prediction_value' => ['nullable'],


        ];
    }
}
