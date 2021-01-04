<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexBE(){
        $cats = Category::where('status','=',1)->paginate(5);
        return view ('backend.category.index', compact('cats'));
    }
    //Show pro trang category
    public function showpro($id)
    {
        $pros = Product::where('id_cate','=',$id)->paginate(3);
        return view('frontend.category',compact('pros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('be/img/brand'),$file_name);
        $request['slug'] = Str::slug($request->name);
        
        Category::create([
            'name' => $request->name,
            'image'=> $file_name,
            'status'=>$request->status,
            'slug'=>$request->slug
        ]);
        return redirect()->route('backend.category');
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
        $cat = Category::find($id);
        return view('backend.category.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $filename = Product::find($id)->image;
        if( $request->file('image') != null){
            $file_name = $request->file('image')->getClientOriginalName();
            File::delete('be/img/brand/'.$filename.'');
            $request->file('image')->move(public_path('be/img/brand'),$file_name);
        }else{
            $file_name = $filename;
        }
        Category::where ('id',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'image'=>$file_name,
            'slug'=>$request->slug
        ]);
        return redirect()->route('backend.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filename = Category::find($id)->image;
        if($filename!=null){
            File::delete('be/img/brand/'.$filename.'');
        }
        Category::where('id',$id)->delete();
    	return redirect()->route('backend.category');
    }
}
