<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\supplier;


class clientsController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }
    public function supp_index(){
        $form = array("Supplier", "Name", "Contact");
        $Objects = array("form_view"=> supplier::Paginate(1, ['*'], 'form_view'),
                         "list_view"=> supplier::Paginate(10, ['*'], 'list_view'),
                         "form" =>$form);
        return view('pages.suppliers',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
    }
    public function cus_index(){
        $form = array("Customer", "Name", "Contact");
        $Objects = array("form_view"=> customer::Paginate(1, ['*'], 'form_view'),
                        "list_view"=> customer::Paginate(10, ['*'], 'list_view'),
                         "form" =>$form
                        );
        return view('pages.customers',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view'])); 
    }
    public function supp_store(Request $request){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'contact' => 'max:255|required',
        ]);
        $request->user()->suppliers()->create([
            'name' => $request->Name,
            'contact' =>$request->contact
        ]);
        return back();
    }
    public function cus_store(Request $request){
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
    public function supp_update(Request $request, $id){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'contact' => 'max:255|required',
        ]);
        $cus = supplier::find($id);
        $cus->name = $request->Name;
        $cus->contact =$request->contact;
        $cus->save();        
        $this->index();
        return redirect()->route('supp');
    }
    public function cus_update(Request $request, $id){
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
    public function supp_delete($id){
        $supp = supplier::find($id);
        $supp->delete();
        $this->index();
        return redirect()->route('supp');
    }
    public function cus_delete($id){
        $cus = customer::find($id);
        $cus->delete();
        $this->index();
        return redirect()->route('cus');
    }
}
