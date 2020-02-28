<?php

namespace App\Rules;

use App\Ad;
use App\Services\AdService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdOwner implements Rule
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
        $ad = Ad::find($value);
        return $ad ? $ad->user_id : null === Auth::id();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "This ad doesn't exist or it doesn't belong to authenticated user";
    }
}
