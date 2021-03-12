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
        $Objects = array("shop_view"=>DB::table('inventories')->where('supplier_id',$id)->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type,
                         "id"=>$id
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    function getCart(Request $request){
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
            $inv = DB::table('inventories')->where('id',$Objects[$x][0])->first();
            $total = floatval($inv->price*$Objects[$x][1]);
            if ($request->Type == "delivery"){
                delivery::create([
                    'inventory_id' => $inv->id,
                    'supplier_id' => $request->Id,
                    'payment_id' => $payment->id,
                    'Quantity' => floatval($Objects[$x][1]),
                    'Price' =>  $total
                ]);
            }else {
                sales::create([
                    'inventory_id' => $Objects[$x][0],
                    'customer_id' => $request->id,
                    'payment_id' => $payment->id,
                    'Quantity' => $Objects[$x][1],
                    'Price' =>  $total
                ]);
            }

        }

        return response()->json($request->Id);

        

    }
}
