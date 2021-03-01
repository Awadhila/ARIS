<?php

namespace App\Http\Controllers;

use App\Models\delivery;
use App\Models\Inventory;
use App\Models\payment;
use App\Models\sales;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    public function index()
    {
        $form = array("Customer", "Name", "Contact");
        $Objects = array("shop_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(9, ['*'], 'shop_view'));
        return view('pages.transaction',[
            'Objects' => $Objects,
            ])->with(compact($Objects['shop_view']));
    }
}
