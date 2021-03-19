<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Models\payment;
use App\Models\delivery;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

<<<<<<< HEAD
class transactionController extends Controller{
=======
use function PHPSTORM_META\type;

class transactionController extends Controller
{
>>>>>>> 368c90513593cb05823ef3e2d260e4e6aaebcac2
    public function index(){
        $Title = 'Transaction';
        $Type = 'Type';
        $sales = array();
        $delivery = array();
        $payments = payment::Paginate(10, ['*'], 'payments');
        foreach ($payments as $value) {
            if ($value->Type == 'delivery'){
                $items = DB::table('deliveries')
                ->where('payment_id', $value->id)
                ->get();
                array_push($delivery, $items);               
            }else{
                $items = DB::table('sales')
                ->where('payment_id', $value->id)
                ->get();
                array_push($sales, $items);
            }  
        } 
        $Objects = array("form_view"=> $payments,
                         "Sales"=> $sales,
                         "delivery"=>$delivery,
                         "shop_view"=>null,
                         'Type' =>$Type,
                         'id' =>null,
                         'title'=> $Title
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
                         "Type" =>$Type,
                         "id"=>$id,
                         "form_view"=>null,
                         "Sales"=>null,
                         "delivery"=>null,
                         'title'=> $Title
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
                         "form_view"=>null,
                         "Sales"=>null,
                         "delivery"=>null,
                         'title'=> $Title
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
<<<<<<< HEAD
            $inv = Inventory::find($Objects[$x][0]);   
=======
            $inv = inventory::find($Objects[$x][0]);

>>>>>>> 368c90513593cb05823ef3e2d260e4e6aaebcac2
            if ($request->Type == "delivery"){
                $total = floatval(floatval($inv->priceBuy)*floatval($Objects[$x][1]));
                $inv->stock +=floatval($Objects[$x][1]);
                $total = floatval($inv->priceBuy*$Objects[$x][1]);
                delivery::create([
                    'inventory_id' => $inv->id,
                    'supplier_id' => $request->Id,
                    'payment_id' => $payment->id,
                    'Quantity' => floatval($Objects[$x][1]),
                    'Price' =>  $total
                ]);
<<<<<<< HEAD
            }else { 
                $inv->sold +=floatval($Objects[$x][1]);
                $total = floatval($inv->priceSale*$Objects[$x][1]);
=======
            }else {
                $inv->stock -=floatval($Objects[$x][1]);
                $total = floatval(floatval($inv->priceSale)*floatval($Objects[$x][1]));

>>>>>>> 368c90513593cb05823ef3e2d260e4e6aaebcac2
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
<<<<<<< HEAD
        return response()->json($request->Id);
=======
        $payment = payment::find($payment->id);
        if ($request->status == "True"){
            $payment->status = 1;
        }else{
            $payment->status = 0;
        }
        $payment->save();
        return response()->json();
>>>>>>> 368c90513593cb05823ef3e2d260e4e6aaebcac2
    }
}
