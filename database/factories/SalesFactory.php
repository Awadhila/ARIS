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

        $inv = DB::table('inventories')->get()->random();
        $avalible = floatval($inv->stock) - floatval($inv->sold);
        $quantity = rand(1, $avalible);
        if(intval($inv->stock - $inv->sold) > 0  ){
            $inv = Inventory::find($inv->id);
            $inv->sold += floatval($quantity);
            return [
                'inventory_id' => $inv->id,
                'payment_id'=> payment::where('Status',null)->first()->id,
                'Quantity' => $quantity,
                'Price' => floatval($inv->priceBuy*$quantity)
            ];
            $inv->save();

        }

    }
}
