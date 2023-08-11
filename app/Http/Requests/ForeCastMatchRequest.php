<?php

namespace App\Http\Requests;

use App\Enums\PredictionScore;
use Illuminate\Foundation\Http\FormRequest;

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
            'predictions' => ['required', 'array'],
            'predictions.*.fixture_id' => ['required'],
            'predictions.*.book_marker_id' => ['required', 'exists:book_markers,id'],
            'predictions.*.bet_id' => ['required', 'exists:bets,id'],
            'predictions.*.forecast_odd' => ['nullable', 'numeric'],
            // get the value from the enum BetOdds

            'predictions.*.prediction_value' => ['required', 'string'],
            'predictions.*.prediction_score' => ['required',],
            'predictions.*.prediction_odd' => ['required', 'numeric'],
            'predictions.*.is_submitted' => ['required','boolean'],
            'predictions.*.code' => ['nullable', 'boolean']
        ];
    }
}
