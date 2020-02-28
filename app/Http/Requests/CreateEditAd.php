<?php

namespace App\Http\Requests;

use App\Rules\AdOwner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEditAd extends FormRequest
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
        $rules = [
            'title' => 'required|between:3,50',
            'description' => 'required',
            'state' => Rule::in(['bad', 'average', 'good', 'excellent']),
            'price' => 'numeric',
        ];

        if($this->has('id')) {
//            $rules += ['id' => 'exists:ads,id'];
            $rules += ['id' => new AdOwner()];
        }

        return $rules;
    }
}
