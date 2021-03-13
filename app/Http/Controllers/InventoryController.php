<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class InventoryController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }
    public function index()
    {
        $title = "Inventory";
        $form = array("name", "origin","catagory","stock","sold","damaged","priceBuy","priceSale","image","discription");
        $non_editable =array("stock","sold","priceBuy","priceSale","origin","catagory");
        $Objects = array("Supp"=> supplier::get(),
                         "form_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(1, ['*'], 'form_view'), 
                         "list_view"=>Inventory::with('suppliers','sales','deliveries')->Paginate(10, ['*'], 'list_view'), 
                         "form" =>$form,
                         "non_editable" =>$non_editable,
                         "title"=>$title
                        );
        return view('pages.Inventory',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'max:255|required',
            'Trade_origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['fruit', 'vegetables']),
        ]);

        $Supp = DB::table('suppliers')->where('name',$request->Supplier)->first();

        Inventory::create([
            'name' => $request->Name,
            'supplier_id' => $Supp->id,
            'origin'=> $request->Origin,
            'catagory'=> $request->Catagory,
            'priceBuy' => $request->Price,
            'priceSale' => floatval(($request->Price) + 50),
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
            if ($inv->image != null){
                Storage::delete('/public/Images'.$inv->image);
            }
            $image = $request->file('Image');
            $imageName = $request->Name.'-'.time().'.'.$image->extension();
            $request->file('Image')->storeAs('/public/Images',$imageName);
            $inv->image = $imageName;
        }
        $inv->name = $request->Name;
        $inv->trade_origin =$request->Origin;
        $inv->Catagory =$request->Catagory;
        $inv->priceBuy =$request->Price;
        $inv->priceSale = floatval(($request->Price) + 50);

        $inv->discription = $request->Discription;
        $inv->save();        
        return redirect()->route('inv');
    }
    public function delete( $id){
        $inv = Inventory::find($id);
        if ($inv->image != null){
            Storage::delete('upload/test.png');
            Storage::delete("\public\Images\'".$inv->image);
        }
        $inv->delete();
        return redirect()->route('inv');
    }
}
