<?php

namespace App\Http\API\Trips\Requests;

use Domain\Trips\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTripRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'car_id' => [
                'required',
                'integer',
                Rule::exists((new Car())->getTable(), 'id'),
            ],
            'miles' => 'required|numeric|min:0',
        ];
    }

    public function car(): Car
    {
        /** @var Car $car */
        $car = Car::query()->findOrFail($this->input('car_id'));

        return $car;
    }
}
