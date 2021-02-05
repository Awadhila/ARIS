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
        $suppliers = supplier::get();
        return view('pages.suppliers',[
            'suppliers' => $suppliers
        ]);  
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'suppName' => 'max:255|required',
            'suppContact' => 'max:255|required',
        ]);

        $request->user()->suppliers()->create([
            'name' => $request->suppName,
            'contact' =>$request->suppContact
        ]);


        return back();
    }
}
