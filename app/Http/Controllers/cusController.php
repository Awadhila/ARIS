<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Support\Facades;
class cusController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }

    public function index()
    {
        $form = array("Customer", "Name", "Contact");
        $Objects = array("form_view"=> customer::Paginate(1, ['*'], 'form_view'),
                        "list_view"=> customer::Paginate(10, ['*'], 'list_view'),
                         "form" =>$form
                        );
        return view('pages.customers',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view'])); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'max:255|required',
            'contact' => 'max:255|required',
        ]);
        $request->user()->customers()->create([
            'name' => $request->Name,
            'contact' =>$request->contact
        ]);
        return back();
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'contact' => 'max:255|required',
        ]);
        $cus = customer::find($id);
        $cus->name = $request->Name;
        $cus->contact =$request->contact;
        $cus->save();        
        $this->index();
        return redirect()->route('cus');
    }
    public function delete($id){
        $cus = customer::find($id);
        $cus->delete();
        $this->index();
        return redirect()->route('cus');
    }
}
