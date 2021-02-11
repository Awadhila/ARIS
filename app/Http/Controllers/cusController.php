<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cusController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }

    public function index()
    {
        $form = array("Customer", "Name", "Contact");

        $customers = customer::get();
        $cus = array();
        $i =0;
        foreach ($customers as $customer) {
            $cus[$i][0] = $customer->name;
            $cus[$i][1] = $customer->contact;
            $i++;
        }

        return view('pages.customers',[
            'customers' => $cus,
            'form' => $form

        ]);   
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);

        $request->user()->customers()->create([
            'name' => $request->Name,
            'contact' =>$request->Contact
        ]);


        return back();
    }
}
