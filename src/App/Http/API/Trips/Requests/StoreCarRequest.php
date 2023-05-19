<?php

namespace App\Http\API\Trips\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'year' => 'required|date_format:Y',
            'make' => 'required|string',
            'model' => 'required|string',
        ];
    }
}
