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
        $suppliers = supplier::get();
        $supp = array();
        $i =0;
        foreach ($suppliers as $supplier) {
            $supp[$i][0] = $supplier->name;
            $supp[$i][1] = $supplier->contact;
            $i++;
        }

        return view('pages.suppliers',[
            'suppliers' => $supp,
            'form' => $form
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
    public function getSupp() {
        $suppliers = supplier::get();
        return $suppliers;
    }

}
