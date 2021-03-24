<?php

namespace Database\Factories;

use App\Models\Sales;
use App\Models\payment;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{

    protected $model = Sales::class;

    public function definition()
    {


            return [
                'payment_id'=> payment::where('Status',null)->first()->id,
            ];


    }
}
