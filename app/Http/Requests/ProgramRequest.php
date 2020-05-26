<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'program.movie_id' => 'required|exists:movies,id',
            'program.room_id' => 'required|exists:rooms,id',
            'program.cinema_id' => 'required|exists:cinemas,id',
            'program.date' => 'required|date|after:today',
        ];
    }
}
