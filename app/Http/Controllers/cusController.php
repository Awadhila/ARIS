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
        $customers = customer::get();
        return view('pages.customers',[
            'customers' => $customers
        ]);   
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'cusName' => 'max:255|required',
            'cusContact' => 'max:255|required',
        ]);

        $request->user()->customers()->create([
            'name' => $request->cusName,
            'contact' =>$request->cusContact
        ]);


        return back();
    }
}
