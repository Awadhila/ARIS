<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\Factory;


class CustomerFactory extends Factory
{
    protected $model = customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'Contact' => $this->faker->phoneNumber,        
        ];
    }
}
