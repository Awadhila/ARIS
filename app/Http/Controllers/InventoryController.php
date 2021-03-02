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
                         "form_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(1, ['*'], 'form_view'), 
                         "list_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'list_view'), 
                         "form" =>$form
                        );
        return view('pages.Inventory',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
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

        $this->validate($request, [
            'Name' => 'max:255|required',
            'Origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['fruit', 'vegetables']),
            'Price' =>'required|numeric',Rule::in(['fruit', 'vegetables']),
        ]);
        $inv = Inventory::find($id);

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imageName = time().'.'.$inv->Name;
            $image->move(public_path('Images'),$imageName);
            $inv->image = $imageName;
        }
        $inv->name = $request->Name;
        $inv->trade_origin =$request->Origin;
        $inv->Catagory =$request->Catagory;
        $inv->price =$request->Price;
        $inv->discription = $request->Discription;
        $inv->save();        
        $this->index();
        return redirect()->route('inv');
    }
    public function delete( $id){
        $inv = Inventory::find($id);
        if ($inv->image != null){
            unlink(public_path('Images').'/'.$inv->image);
        }
        $inv->delete();
        $this->index();
        return redirect()->route('inv');
    }
}
