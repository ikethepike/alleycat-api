<?php

namespace AlleyCat\Http\Requests\Race;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name'      => 'required',
            'longitude' => 'float|required',
            'lattitude' => 'float|required',
            'count'     => 'int|max:50',
            'radius'    => 'required|integer',
        ];
    }
}
