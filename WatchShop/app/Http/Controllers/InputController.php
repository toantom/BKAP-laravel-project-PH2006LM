<?php

namespace App\Http\Controllers;
use App\Models\Input;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\InputStoreRequest;
use Auth;

class InputController extends Controller
{   
    //show input
    public function index()
    {
        $inputs = Input::orderBy('updated_at','DESC')->orderBy('updated_at','DESC')->paginate(5);
        return view('backend.input.index',compact('inputs'));
    }
    //show create
    public function create()
    {
        $sku = Product::all();
        return view('backend.input.create',compact('sku'));
    }
    // create input
    public function store(InputStoreRequest $request)
    {   
        $id = $request->id;
        $pro = Product::find($id);
         
        Input::create([
            'name'=>$pro->name,
            'sku'=>$pro->sku,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>($request->quantity)*($request->price),
            'id_admin'=>Auth::guard('admin')->user()->id,
        ]);
        $new = ($request->quantity)+($pro->stock);
        $pro->update([
            'stock'=> $new
        ]);
        return redirect()->route('backend.input')->with('inputsuccess',"");
    }
    //show edit
    public function edit($id)
    {   
        $sku = Product::all();
        $input = Input::find($id);
        return view('backend.input.edit',compact('input','sku'));
    }
    // edit input
    public function update(InputStoreRequest $request,$id)
    {   
        $pro = Product::find($request->id);
        $old_quantity = Input::find($id)->quantity;
        Input::find($id)->update([
            'name'=>$pro->name,
            'sku'=>$pro->sku,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>($request->quantity)*($request->price),
            'id_admin'=>Auth::guard('admin')->user()->id,
        ]);
        $new = ($request->quantity)+($pro->stock)-$old_quantity;
        $pro->update([
            'stock'=> $new
        ]);
        return redirect()->route('backend.input')->with('editsuccess',"");
    }
    // destroy input
    public function destroy($id)
    {
        Input::find($id)->delete();
        return redirect()->back()->with('deleteinput',"");
    }
}
