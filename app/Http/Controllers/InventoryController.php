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
        $form = array("Inventory", "Name", "Origin","Catagory","stock","availible","damaged","Sold","Price");

        $Objects = array("Supp"=> supplier::get(),
                         "Inventory"=>Inventory::paginate(1), 
                         "form" =>$form
                        );
        //dd($Objects['inv'][0]);
        /*foreach ($inventorires as $inventory) {
            $inv[$i][0] = $inventory->name;
            $inv[$i][1] = $inventory->trade_origin;
            $inv[$i][2] = $inventory->Catagory;
            $inv[$i][3] = $inventory->stock;
            $inv[$i][4] = $inventory->availible;
            $inv[$i][5] = $inventory->damaged;
            $inv[$i][6] = $inventory->sold;
            $inv[$i][7] = $inventory->price;
            $i++;
        }*/
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
}


