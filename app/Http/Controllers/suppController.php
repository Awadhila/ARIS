<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use App\Http\Controllers\Controller;

class suppController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }
    public function index()
    {
        $form = array("Supplier", "Name", "Contact");
        $Objects = array("Supplier"=> supplier::get(),
                         "form" =>$form
                        );

        return view('pages.suppliers',[
            'Objects' => $Objects,
        ]);  
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);

        $request->user()->suppliers()->create([
            'name' => $request->Name,
            'contact' =>$request->Contact
        ]);


        return back();
    }
}
