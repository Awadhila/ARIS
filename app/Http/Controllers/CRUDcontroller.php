<?php
namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
class CRUDcontroller extends Controller {
    public function __construct(){
        $this ->middleware('auth');
    }
    public function supp_index($tab){
        $title = "Supplier";
        $form = array("name", "contact");
        $Objects = array("form_view"=> supplier::with('inventories')
                        ->Paginate(1, ['*'], 'form_view'),
                         "list_view"=> supplier::Paginate(10, ['*'], 'list_view'),
                         "form" => $form,
                         "title" => $title,
                         "tab" => $tab
                        );
        return view('pages.CRUD',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
    }
    public function cus_index($tab){
        $title = "Customer";
        $form = array("name", "contact");
        $Objects = array("form_view"=> customer::Paginate(1, ['*'], 'form_view'),
                        "list_view"=> customer::Paginate(10, ['*'], 'list_view'),
                        "form" => $form,
                        "title" => $title,
                        "tab" => $tab
                        );
        return view('pages.CRUD',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view'])); 
    }
    public function inv_index(){
        $title = "Inventory";
        $form = array("name","supplier", "origin","catagory","priceBuy","image","discription");
        $non_editable =array("stock","sold","priceSale");
        $Objects = array("Supp"=> supplier::get(),
                         "form_view"=>Inventory::with('suppliers','sales','deliveries')
                         ->Paginate(1, ['*'], 'form_view'), 
                         "list_view"=>Inventory::with('suppliers','sales','deliveries')
                         ->Paginate(10, ['*'], 'list_view'), 
                         "form" =>$form,
                         "non_editable" =>$non_editable,
                         "title"=>$title
                        );
        return view('pages.Inventory',[
            'Objects' => $Objects,
        ])->with(compact($Objects['form_view'],$Objects['list_view']));
    }
    public function supp_store(Request $request){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);
        $request->user()->suppliers()->create([
            'name' => $request->Name,
            'contact' =>$request->Contact
        ]);
        return redirect()->back()->with('message', 'New supplier named '.$request->Name.' has been registered');
    }
    public function cus_store(Request $request){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);
        $request->user()->customers()->create([
            'name' => $request->Name,
            'contact' =>$request->Contact
        ]);
        return redirect()->back()->with('message', 'New customer named '.$request->Name.' has been registered');
    }
    public function inv_store(Request $request){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['Fruit', 'Vegetables']),
            'PriceBuy' =>'numeric|required'
        ]);
        $Supp = supplier::where('name',  $request->Supplier)->first();

        Inventory::create([
            'name' => $request->Name,
            'supplier' => $Supp->id,
            'origin'=> $request->Origin,
            'catagory'=> $request->Catagory,
            'priceBuy' => $request->PriceBuy,
            'priceSale' => floatval(($request->PriceBuy) + 50),
        ]);

        return redirect()->back()->with('message', 'New Inventory Item named '.$request->Name.' has been registered');;
    }
    public function supp_update(Request $request, $id){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);
        $supp = supplier::find($id);
        $supp->name = $request->Name;
        $supp->contact =$request->Contact;
        $supp->save();        
        return back();
    }
    public function cus_update(Request $request, $id){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Contact' => 'max:255|required',
        ]);
        $cus = customer::find($id);
        $cus->name = $request->Name;
        $cus->contact =$request->Contact;
        $cus->save();        
        return back();
    }
    public function inv_update(Request $request, $id){
        $this->validate($request, [
            'Name' => 'max:255|required',
            'Origin' => 'required',Rule::in(['Local', 'Import']),
            'Catagory' =>'required',Rule::in(['fruit', 'vegetables']),
            'PriceBuy' =>'required|numeric'
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
        $inv->origin =$request->Origin;
        $inv->catagory =$request->Catagory;
        $inv->priceBuy =$request->PriceBuy;
        $inv->priceSale = floatval(($request->PriceBuy) + 50);
        $inv->discription = $request->Discription;
        $inv->save();        
        return redirect()->back();
    }
    public function supp_delete($id){
        
        $supp = supplier::find($id);
        $supp->delete();
        return redirect()->route('supp',['form'])->with('message', 'Suppleir with ID '.$id.' has been deleted');
    }
    public function cus_delete($id){
        $cus = customer::find($id);
        $cus->delete();
        return redirect()->route('cus',['form'])->with('message', 'Customer with ID '.$id.' has been deleted');
    }
    public function inv_delete( $id){
        $inv = Inventory::find($id);
        if ($inv->image != null){
            Storage::delete('upload/test.png');
            Storage::delete("\public\Images\'".$inv->image);
        }
        $inv->delete();
        
        return redirect()->route('inv')->with('message', 'Invetory item with ID '.$id.' has been deleted');
    }
    
}
