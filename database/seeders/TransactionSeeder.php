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
            Log::info(strval($cus->name));


            payment::factory()->count(1)->create([
                'Type' => 'sales',

            ]);

            for ($x = 0; $x <= rand(1,10); $x++) {

                $inv = DB::table('inventories')->where('sold', '<=', 90)->get()->random();

                while(true){
                    $added = DB::table('sales')->where('customer_id', $cus->id)->where('inventory_id',  $inv->id)->pluck('inventory_id');               
                    if($added->count()){
                        $inv = DB::table('inventories')->where('sold', '<=', 90)->get()->random();
                    }else{
                        break;
                    }
                } 
                Log::info(strval('Added Item No | '.strval($x).' Item ID | '.$inv->id));
                $avalible = floatval($inv->stock) - floatval($inv->sold);
                $quantity = rand(1, 10);
                if($avalible > 0){
                    if ($quantity <= $avalible){
                        $quantity == $avalible;
                    }
                    $inv = Inventory::find($inv->id);
                    $inv->sold += floatval($quantity);
                    $inv->save();
                }
                sales::factory()->count(1)->create([
                    'customer_id' => $cus->id,
                    'inventory_id' => $inv->id,
                    'Quantity' => $quantity,
                    'Price' => floatval($inv->priceBuy*$quantity)
                ]);            
            }
            $added = DB::table('sales')->where('customer_id', $cus->id)->pluck('inventory_id');               

            Log::info($added);

 
            $payment = payment::where('status',null)->first();
            $payment->status = rand(0,1);
            $payment->Total =  sales::where('customer_id',$cus->id)->sum('Price');
            $payment->save();
        }




    }
}
