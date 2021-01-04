<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Helper\CartHelper;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //addcart
    public function addcart(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->add($product);
        return redirect()->route('frontend.cart');
    }
    //showcart
    public function show(CartHelper $cart){
        $data = new CartHelper;
        return view('frontend.cart',compact('data'));
    }
    //delete item
    public function deletecart(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->delete($product);
        return redirect()->back();
    }
    //update cart ajax
    public function updatecart( CartHelper $cart,Request $request){
        $id= $request->id;
        $qty = $request->qty;
        $cart->update($id,$qty);
    }
    //addcart detail
    public function addcartdetail(CartHelper $cart,Request $request){
        $id = $request->id;
        $qty = $request->quantity;
        $product = Product::find($id);
        $cart->addCartD($product,$qty);
        return redirect()->route('frontend.cart');
    }
}
