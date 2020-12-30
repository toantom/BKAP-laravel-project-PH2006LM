<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_img;
use App\Models\Category;
use App\Models\Attribute;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
    use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro_img = Product_img::all();
        $prod = Product::paginate(10);
        return view('backend.product.index', compact('prod', 'pro_img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        $attr = Attribute::all();
        return view('backend.product.create', compact('cate','attr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('be/img/product'),$file_name);
        } 
        
        $request->merge(['image' => $file_name]);
        $request['slug'] = Str::slug($request->name);      
        $data = $request->except(['_token','avatar', 'avatars']);
        // dd($data);
        $product = Product::create($data);

        if($request->hasFile('avatars')){
            $files = $request->file('avatars');
            foreach ($files as $value) {
                $file_names = $value->getClientOriginalName();
                $value->move(public_path('be/img/product/imgs'),$file_names);
            }
        }
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
