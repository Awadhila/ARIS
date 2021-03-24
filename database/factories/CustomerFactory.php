<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class CustomerFactory extends Factory
{
    protected $model = customer::class;

    public function definition()
    {
        return [
            'user_id' => DB::table('users')->where('name','Demo')->first()->id,
            'name' => $this->faker->name,
            'Contact' => $this->faker->phoneNumber,        
        ];
    }
}
