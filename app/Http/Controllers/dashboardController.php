<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\delivery;
use App\Models\sales;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }
    public function index()
    {       
        $Title = 'Transaction';
        $Type = 'View';
        $Objects = array("form_view"=>null ,
                         "list_view"=>null ,
                         'Type' =>$Type,
                         'id' =>null,
                         'title'=> $Title,
                         'tab'=>null
        );
        return view('dashboard',[
            'Objects' => $Objects,
            ]);
    }
    public function sales_view($tab){
        if (sales::count() > 0){
            $Title = 'Transaction';
            $Type = 'Sales View';
            $form = array("supplier_id","inventory_id", "quantity","price");
    
            $sales = array();
            if($tab == 'debit'){
                $payments =  payment::where('type', '=', "sales")
                ->where('status', '=', 1)
                ->Paginate(1, ['*'], 'form_view');
            }else{
                $payments = payment::where('type', '=', "sales")
                ->where('status', '=', 0)
                ->Paginate(1, ['*'], 'form_view');
            }
            foreach ($payments as $value) {
                $items = sales::with(['customers','inventories'])
                ->where('payment_id',  $value->id)
                ->Paginate(5, ['*'], 'list_view');
            }
            $Objects = array("form_view"=> $payments,
                             "list_view"=> $items,
                             'Type' =>$Type,
                             'id' =>null,
                             'title'=> $Title,
                             'tab'=>$tab,
                             'form'=> $form
            );
            return view('dashboard',[
                'Objects' => $Objects,
                ])->with(compact($Objects['form_view']));
        }else{
            return back();
        }

    }
    public function delivery_view($tab){
        if(delivery::count() > 0){
            $Title = 'Transaction';
            $Type = 'Delivery View';
            $form = array("supplier_id","inventory_id", "Quantity","price");
    
            if($tab == 'debit'){
                $payments =  payment::where('type', '=', "delivery")
                ->where('status', '=', 1)
                ->Paginate(1, ['*'], 'form_view');
            }else{
                $payments =  payment::where('type', '=', "delivery")
                ->where('status', '=', 0)
                ->Paginate(1, ['*'], 'form_view');
            }
            foreach ($payments as $value) {
                $items = delivery::with(['suppliers','inventories'])
                                 ->where('payment_id',  $value->id)
                                 ->Paginate(5, ['*'], 'list_view');
            }
            $Objects = array("form_view"=> $payments,
                             "list_view"=> $items,
                             'Type' =>$Type,
                             'id' =>null,
                             'title'=> $Title,
                             'tab'=>$tab,
                             'form'=> $form
            );
            return view('dashboard',[
                'Objects' => $Objects,
                ])->with(compact($Objects['form_view'],$Objects['list_view']));
        }else{
            return back();
        }
    }
}
