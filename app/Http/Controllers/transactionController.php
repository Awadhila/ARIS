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
            'Type' =>$Type
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ]);
    }
    public function Sales(){
        $Type = 'sales';
        $Objects = array("shop_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type
        );
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }

    public function Delivery($id){
        $Type = 'delivery';
        $Objects = array("shop_view"=>DB::table('inventories')->where('supplier_id',$id)->Paginate(10, ['*'], 'shop_view'),
                         "Type" =>$Type
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
        
        return response()->json($Objects);
    }
}
