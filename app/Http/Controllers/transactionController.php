<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Models\payment;
use App\Models\customer;
use App\Models\delivery;
use App\Models\supplier;

use App\Models\Inventory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transactionController extends Controller
{
    public function index(){
        $Title = 'Transaction';
        $Type = 'Select';
        $Objects = array("shop_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'shop_view'),
                        'suppliers'=>supplier::select('id')->get(),
                        'customers'=>customer::select('id')->get(),
                        'Type' =>$Type,
                        'id' =>null,
                        'title'=> $Title,
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ]);
    }
    public function Sales($id){
        $Title = 'Transaction';
        $Type = 'sales';
        $id = $id;
        $Objects = array("shop_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'shop_view'),
                        'suppliers'=>null,
                        'customers'=>null,
                         "Type" =>$Type,
                         "id"=>$id,
                         'title'=> $Title,
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    public function Delivery($id){
        $Title = 'Transaction';
        $Type = 'delivery';
        $id = $id;
        $Objects = array("shop_view"=>DB::table('inventories')->where('supplier',$id)->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type,
                         "id"=>$id,
                         'suppliers'=>null,
                         'customers'=>null,
                         'title'=> $Title,
                         'tab'=>null

        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    function checkout(Request $request){
        $Objects=array();
        $total_pay  =0;
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
                $total = floatval(floatval($inv->priceBuy)*floatval($Objects[$x][1]));
                $inv->stock +=floatval($Objects[$x][1]);
                $total = floatval($inv->priceBuy*$Objects[$x][1]);
                $total_pay +=floatval($total);
                delivery::create([
                    'inventory_id' => $inv->id,
                    'supplier_id' => $request->Id,
                    'payment_id' => $payment->id,
                    'Quantity' => floatval($Objects[$x][1]),
                    'Price' =>  $total
                ]);
            }else {
                $inv->stock -=floatval($Objects[$x][1]);
                $total = floatval(floatval($inv->priceSale) *floatval($Objects[$x][1]));
                $total_pay +=floatval($total);

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
        $payment->Total = $total_pay;
        $payment->save();
        return response()->json();
    }
}
