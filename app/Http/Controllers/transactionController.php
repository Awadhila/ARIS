<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Models\payment;
use App\Models\delivery;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transactionController extends Controller
{
    public function index(){
        $Type = 'Type';
        $Objects = array("shop_view"=>null,
            'Type' =>$Type,
            'id' =>null
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ]);
    }
    public function Sales($id){
        $Type = 'sales';
        $id = $id;
        $Objects = array("shop_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type,
                         "id"=>$id
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    public function Delivery($id){
        $Type = 'delivery';
        $id = $id;
        $Objects = array("shop_view"=>DB::table('inventories')->where('supplier',$id)->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type,
                         "id"=>$id
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    function checkout(Request $request){
        $Objects=array();
        $i = 0;
        foreach ($request->cart as $item) {
            $Objects[$i][0] = floatval($item["id"]);
            $Objects[$i][1] = floatval($item["count"]);
            Log::debug('Message.', ['id' =>$Objects[$i][0],'count' =>$Objects[$i][0]]);
            $i++;
        }
        payment::create([
            'Type'=> $request->Type, 
            'Status' =>null,
        ]);
        $payment = DB::table('payments')->where('Status',null)->first();
        for ($x = 0; $x <  count($Objects); $x++) {
            $inv = inventory::find($Objects[$x][0]);

            if ($request->Type == "delivery"){
                $total = floatval($inv->priceBuy*$Objects[$x][1]);
                $inv->stock +=floatval($Objects[$x][1]);

                delivery::create([
                    'inventory_id' => $inv->id,
                    'supplier_id' => $request->Id,
                    'payment_id' => $payment->id,
                    'Quantity' => floatval($Objects[$x][1]),
                    'Price' =>  $total
                ]);
            }else {
                $inv->stock -=floatval($Objects[$x][1]);
                $total = floatval($inv->priceSale)*floatval($Objects[$x][1]);

                sales::create([
                    'inventory_id' => $Objects[$x][0],
                    'customer_id' => $request->Id,
                    'payment_id' => $payment->id,
                    'Quantity' => floatval($Objects[$x][1]),
                    'Price' =>  $total
                ]);
            }
            $inv->save();
        }
        $payment = payment::find($payment->id);
        if ($request->status == "True"){
            $payment->status = 1;
        }else{
            $payment->status = 0;
        }
        $payment->save();
        return response()->json();
    }
}
