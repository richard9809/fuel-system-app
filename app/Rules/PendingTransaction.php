<?php

namespace App\Rules;

use App\Models\Transaction;
use Illuminate\Contracts\Validation\Rule;

class PendingTransaction implements Rule
{
    protected $driverID;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($driverID)
    {
        $this->driverID = $driverID;
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
        $lastTransaction = Transaction::where('driver', $this->driverID)
            ->where(function ($query) {
                $query->where(function ($subquery) {
                    $subquery->whereNull('receipt')
                            ->where('rejected', 0);
                })
                ->orWhere(function ($subquery) {
                    $subquery->whereNotNull('receipt')
                            ->where('rejected', 1);
                });
            })
            ->latest('id')
            ->first();
        
        return !$lastTransaction;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Last request is pending.';
    }
}
