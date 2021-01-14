<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::where('status','=',0)->get();
        $admin = Admin::all();
        return view('backend.blog.create', compact('cates','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image){
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/blog'),$file_name);      
        }
        $request['slug'] = Str::slug($request->name);
        $blog = Blog::create([
            'name' => $request->name,
            'slug' =>$request->slug,
            'id_cate' => $request->id_cate,
            'id_admin' =>$request->id_admin,
            'content' =>$request->content,
            'image' => $file_name,
            'status' => $request->status
        ]);
        if($blog){
            return redirect()->route('blog.index')->with('addblog-success','them thanh cong');
        }else{
            return redirect()->back()->with('addblog-error','Thêm mới không thành công');
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
        $blog = Blog::find($id);
        $cate = Category::all();
        $admin = Admin::all();
        return view('backend.blog.edit',compact('blog','cate','admin'));
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
        $file_name = Blog::find($id)->image;
        if($file_name){
            File::delete('public/images/blog/'.$file_name.'');
        }
        $ban = Blog::where('id',$id)->delete();
        if($ban){
            return redirect()->back()->with('delblog-success','Xoá thành công');
        }else{
            return redirect()->back()->with('delblog-error','Xóa không thàn công');
        }
    }
}
