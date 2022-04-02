<?php

namespace App\Rules;

use App\Services\InnServices\InnAlgorithmServices;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

class InnAlgorithmRule implements Rule
{

    /**
     * @var InnAlgorithmServices
     */
    protected InnAlgorithmServices $innAlgorithmServices;

    /**
     * Create a new rule instance.
     *
     * @param InnAlgorithmServices $innAlgorithmServices
     */
    public function __construct(InnAlgorithmServices $innAlgorithmServices)
    {
        $this->innAlgorithmServices = $innAlgorithmServices;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->innAlgorithmServices->validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.innAlgorithm');
    }
}
