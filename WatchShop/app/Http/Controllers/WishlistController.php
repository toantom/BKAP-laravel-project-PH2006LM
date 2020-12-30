<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WishlistController extends Controller
{
    public function index()
    {
        //
    }

    //Show Whislist
    public function show_whislist()
    {   
        $wishlist = Wishlist::Where('id_user','=', "21" )->get();
        return view('frontend.wishlist',compact('wishlist'));
    }
    //Add whislist
    public function create($id)
    {
        if(null !== Wishlist::where(['id_user'=> Auth::user()->id ,'id_product'=> $id])){
            return redirect()->route('frontend.wishlist')->with('wish',"Sản phẩm này đã có trong danh sách yêu thích");
        }else{
        Wishlist::create([
            'id_user'=> Auth::user()->id,
            'id_product'=>$id,
        ]);
        return redirect()->route('frontend.wishlist');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wishlist::where('id_product','=',$id)->delete();
        return Redirect()->back()->with('delete','Đã bỏ một sản phẩm ưa thích');
    }
}
