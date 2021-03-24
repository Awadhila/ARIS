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
    public function run(){

        
        DB::table('payments')->delete();
        DB::table('deliveries')->delete();
        DB::table('sales')->delete();
        $supps = supplier::all();
        foreach ($supps as $supp) {
            $invs = Inventory::where('supplier',$supp->id)->get();
            if ( !empty($invs) ){
                payment::factory()->count(1)->create([
                    'Type' => 'delivery',
                ]);
                foreach ($invs as $inv) {
                    $quantity = 100;
    
                    delivery::factory()->create([
                        'supplier_id' => $supp->id,
                        'inventory_id' => $inv->id,
                        'Quantity' => 100,
                        'Price' => floatval($inv->priceBuy*$quantity)
                    ]);   
                    $inv->stock += floatval($quantity);
                    $inv->save();
                } 
                $payment = payment::where('status',null)->first();
                $payment->status = rand(0,1);
                $payment->Total =  delivery::where('supplier_id',$supp->id)->sum('Price');
                $payment->save();
            }
        } 
        $cuss = customer::all();
        foreach ($cuss as $cus) {
            payment::factory()->count(1)->create([
                'Type' => 'sales',

            ]);
            sales::factory()->count(rand(1,10))->create([
                'customer_id' => $cus->id,

            ]); 
            $payment = payment::where('status',null)->first();
            $payment->status = rand(0,1);
            $payment->Total =  delivery::where('supplier_id',$supp->id)->sum('Price');
            $payment->save();
        }




    }
}
