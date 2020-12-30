<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bans_client_1= Banner::where('status', '=', 1)->get();
        $bans_client_2= Banner::where('status', '=', 2)->get();
        $bans_client_3= Banner::where('status', '=', 3)->get();
        $pros= Product::all();
        $pros_sale= Product::where('discount', '>', 0)->get();
        $pros_bestsell= Product::where('status', '=', 1)->get();
        $pros_man = Product::where('type', '=', 0)->get();
        $pros_woman = Product::where('type', '=', 1)->get();
        $blogs = Blog::all();
        return view('frontend.index',compact('blogs','bans_client_1','bans_client_2','bans_client_3','pros','pros_bestsell','pros_man','pros_woman','pros_sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
