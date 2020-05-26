<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaRequest extends FormRequest
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
            'cinema.name' => 'required|max:210',
            'cinema.country' => 'required|max:210',
            'cinema.city' => 'required|max:210',
            'cinema.location' => 'required|max:210',
        ];
    }
}
