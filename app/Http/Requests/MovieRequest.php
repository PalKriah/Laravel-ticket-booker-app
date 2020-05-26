<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'movie.name' => 'required|max:210',
            'movie.description' => 'required|max:500',
            'genres.*' => 'required|exists:genres,id',
            'file' => 'file',
        ];
    }
}
