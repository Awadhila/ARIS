<?php

namespace Database\Factories;

use App\Models\payment;
use App\Models\delivery;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{

    protected $model = delivery::class;

    public function definition()
    {
        return [
            'inventory_id' => Inventory::all()->random()->id,
            'payment_id'=> payment::where('Status',null)->first()->id,
        ];
    }
}
