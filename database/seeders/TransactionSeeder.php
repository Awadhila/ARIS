<?php

namespace Database\Seeders;

use App\Models\sales;
use App\Models\payment;
use App\Models\customer;
use App\Models\delivery;
use App\Models\supplier;
use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supp = supplier::all()->random();
        $inv = Inventory::inRandomOrder()->where('supplier',$supp->id)->first();
        $quantity =rand(1,10);

        $inv->stock += floatval($quantity);
        $inv->save();
        DB::table('payments')->delete();
        DB::table('deliveries')->delete();
        payment::factory()->count(1)->create();
        Log::alert($inv);

        delivery::factory()->create([
            'supplier_id' => $supp->id,
            'inventory_id' => $inv->id,
            'Quantity' => $quantity,
            'Price' => floatval($inv->priceBuy*$quantity)
        ]);
        $payment = payment::where('status',null)->first();
        $payment->status = rand(0,1);
        $payment->Total =  delivery::where('supplier_id',$supp->id)->sum('Price');
        $payment->save();

    }
}
