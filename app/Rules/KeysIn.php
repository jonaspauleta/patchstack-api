<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class KeysIn implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  string[]  $values
     * @return void
     */
    public function __construct(
        protected array $values
    ) {
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (count(array_diff_key($value, array_flip($this->values))) !== 0) {
            $fail('The selected :attribute key is invalid. Valid keys are: '.implode(', ', $this->values));
        }
    }
}
