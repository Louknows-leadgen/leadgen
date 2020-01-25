<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CompareDatetime implements Rule
{
    protected $current_datetime;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->current_datetime = Carbon::now();
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
        //
        $to_compare_datetime = Carbon::parse($value);

        return $to_compare_datetime > $this->current_datetime;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Date should be present or above.';
    }
}
