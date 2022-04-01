<?php

namespace App\Rules;

use App\Services\EnnServices\EnnAlgorithmServices;
use Illuminate\Contracts\Validation\Rule;

class EnnAlgorithmRule implements Rule
{

    /**
     * @var EnnAlgorithmServices
     */
    protected EnnAlgorithmServices $ennAlgorithmServices;

    /**
     * Create a new rule instance.
     *
     * @param EnnAlgorithmServices $ennAlgorithmServices
     */
    public function __construct(EnnAlgorithmServices $ennAlgorithmServices)
    {
        $this->ennAlgorithmServices = $ennAlgorithmServices;
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
        return $this->ennAlgorithmServices->validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Inn is not valid';
    }
}
