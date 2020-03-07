<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class CheckEmployeeExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if(isset($value)){
            $employee = DB::table('employees as e')
                           ->join('people as p','p.id', '=', 'e.person_id')
                           ->whereRaw("concat(p.first_name,' ',p.last_name) = ?",[$value])
                           ->first();
            if(!isset($employee)){
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cannot find this employee.';
    }
}
