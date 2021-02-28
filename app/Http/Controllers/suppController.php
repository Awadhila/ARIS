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
        $Objects = array("form_view"=> supplier::Paginate(1, ['*'], 'form_view'),
                         "list_view"=> supplier::Paginate(10, ['*'], 'list_view'),
                         "form" =>$form);
        return view('pages.suppliers',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
    }
    public function store(Request $request)
    {
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
    public function update(Request $request, $id){
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
    public function delete($id){
        $supp = supplier::find($id);
        $supp->delete();
        $this->index();
        return redirect()->route('supp');
    }
}
