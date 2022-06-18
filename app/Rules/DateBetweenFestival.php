<?php

namespace App\Rules;
use App\Models\Festival;
use Carbon\Carbon;

use Illuminate\Contracts\Validation\Rule;

class DateBetweenFestival implements Rule
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
        $festival = Festival::find(1);
        $festivalStart = Carbon::parse($festival->start_date);
        $inputTime = Carbon::parse($value);
        $festivalEnd = Carbon::parse($festival->end_date);
        
        return $inputTime->between($festivalStart,$festivalEnd);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $festival = Festival::find(1);
        return ':attribute not between start or end of '.$festival->name;
    }
}
