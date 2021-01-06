<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_img;
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


    public function index(){
        $cats = Category::paginate(5);
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
        $request->file('image')->move(public_path('images/brand'),$file_name);
        $request['slug'] = Str::slug($request->name);
        
        $cate = Category::create([
            'name' => $request->name,
            'image'=> $file_name,
            'status'=>$request->status,
            'slug'=>$request->slug
        ]);
        if($cate){
            return redirect()->route('category.index')->with('addcate-success','Thêm mới thành công');
        }else{
            return redirect()->back()->with('addcate-error','Thêm mới không thành công');
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
        $cats = Category::paginate(5);
        $cat = Category::find($id);
        return view('backend.category.edit',compact('cats','cat'));
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
        $filename = Category::find($id)->image;
        if( $request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            File::delete('public/images/brand/'.$filename.'');
            $request->file('image')->move(public_path('images/brand/'),$file_name);
        }else{
            $file_name = $filename;
        }
        $request['slug'] = Str::slug($request->name);
        $cate = Category::where('id',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'image'=>$file_name,
            'slug'=>$request->slug
        ]);
        if($cate){
            return redirect()->route('category.index')->with('updatecate-success','Sửa thành công');
        }else{
            return redirect()->back()->with('updatecate-error','Sửa không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $pro = Product::where('id_cate',$id)->get();
        $filename = Category::find($id)->image;
        if($pro->count() > 0){
            return redirect()->back()->with('delcate-error','Xóa không thàn công');
        }else{
            if($filename){
                File::delete('public/images/brand/'.$filename.'');
            }
            $cate = Category::where('id',$id)->delete();
            if($cate){
                return redirect()->route('category.index')->with('delcate-success','Xoá thành công');
            }else{
                return redirect()->back()->with('delcate-error','Xóa không thàn công');
            }
        }
    }
}
