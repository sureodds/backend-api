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
           
            'predictions.*.book_marker_id' => ['required', 'exists:book_markers,id'],
            'predictions.*.bet_id' => ['required', 'exists:bets,id'],
            'predictions.*.forecast_odd' => ['nullable', 'numeric'],
            // get the value from the enum BetOdds
            'predictions.*.prediction_value' => ['required', 'string', Rule::in(PredictionScore::getValues())],
            'predictions.*.prediction_score' => [
                'nullable',
               'required_if:predictions.*.prediction_value,==,'. implode(',', [
                    PredictionScore::HOME,
                    PredictionScore::AWAY,
                    PredictionScore::DRAW,
                    PredictionScore::HANDICAP,
                    PredictionScore::HANDICAPHOME,
                    PredictionScore::HANDICAPAWAY,
                    PredictionScore::HANDICAPDRAW,
                    PredictionScore::FIRSTHALF,
                    PredictionScore::SECONDHALF,
                    PredictionScore::FIRSTHALFHOME,
                    PredictionScore::FIRSTHALFAWAY,
                    PredictionScore::FIRSTHALFDRAW,
                    PredictionScore::SECONDHALFHOME,
                    PredictionScore::SECONDHALFAWAY,
                    PredictionScore::SECONDHALFDRAW,
                    PredictionScore::TOTALGOALS,
                ])
            ],

        ];
    }
}
