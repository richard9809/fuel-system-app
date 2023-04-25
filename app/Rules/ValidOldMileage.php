<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Vehicle;

class ValidOldMileage implements Rule
{
    protected $driver;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
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
        $vehicle = Vehicle::where('driver', $this->driver)->first();
        $oldMileage = $vehicle->mileage;
        return ($value > $oldMileage);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect mileage';
    }
}
