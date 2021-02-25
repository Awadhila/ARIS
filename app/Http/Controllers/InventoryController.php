<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class InventoryController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }
    public function index()
    {
        $form = array("Inventory", "Name", "Origin","Catagory","Price","availible","Damaged","Sold","stock","Discription",);

        $Objects = array("Supp"=> supplier::get(),
                         "Inventory"=>Inventory::with('suppliers','sales','deliveries')->paginate(1), 
                         "form" =>$form
                        );

        return view('pages.Inventory',[
            'Objects' => $Objects,
        ]);  
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'max:255|required',
            'Origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['fruit', 'vegetables']),
        ]);

        $Supp = DB::table('suppliers')->where('name',$request->Supplier)->first();

        Inventory::create([
            'name' => $request->Name,
            'supplier_id' => $Supp->id,
            'trade_origin'=> $request->Origin,
            'Catagory'=> $request->Catagory,
            'price' => $request->Price,
        ]);

        return back();
    }

    public function update(Request $request, $id){
        dd($request->input('Name'));
        
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['fruit', 'vegetables']),
            'Price' =>'required',Rule::in(['fruit', 'vegetables']),
        ]);

        $image = $request->file('file');
        $imageName = time().'-'.$image->extention();
        $image->move(public_path('Images'),$imageName);
        $inv = Inventory::find($id);
        $inv->name = $request->Name;
        $inv->Origin =$request->Origin;
        $inv->Catagory =$request->Catagory;
        $inv->price =$request->staticPrice;
        $inv->discription = $request->Discription;
        $inv->image = $imageName;

    }

}


