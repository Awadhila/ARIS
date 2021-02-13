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


        $transaction = array("delivery" => delivery::get(), 
                             "payment" => payment::get(),
                             "sales" =>sales::get(),
                             "payment" => Inventory::get());
        return view('pages.transaction',[

        ]);   
    }
}
