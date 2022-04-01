<?php

namespace App\Http\Requests;

use App\Rules\EnnAlgorithmRule;
use App\Rules\EnnLenghtRule;
use App\Services\EnnServices\EnnAlgorithmServices;
use Illuminate\Foundation\Http\FormRequest;

class EnnPostRequest extends FormRequest
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
            'enn' => ['required', 'numeric',
                new EnnLenghtRule(),
                new EnnAlgorithmRule(new EnnAlgorithmServices())]
        ];
    }
}
