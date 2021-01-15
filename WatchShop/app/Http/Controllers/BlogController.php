<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Auth;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listBlog(){
        $blogs = Blog::paginate(4);
        return view('frontend.blog',compact('blogs'));
    }
    public function showBlog($slug){
        $blog_slug = Category::where('slug', $slug)->first();
        $id = $blog_slug->id;
        $blogs = Blog::where('id_cate',$id)->paginate(2);
        return view('frontend.blog',compact('blogs','blog_slug'));
    }
    public function blogDetail($slug){
        $blog_slug = Blog::where('slug', $slug)->first();
        $id = $blog_slug->id;
        $blog = Blog::find($id);
        $blogs = Blog::orderBy('created_at','desc')->paginate(3);

        return view('frontend.blogdetail',compact('blogs','blog'));
    }

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
        $cateblog = Category::where('status','=',0)->get();
        $admin = Admin::all();
        return view('backend.blog.create', compact('cateblog','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
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
            'id_admin' =>Auth::guard('admin')->user()->id,
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
        $admin = Admin::all();
        return view('backend.blog.edit',compact('blog','admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $filename = Blog::find($id)->image;
        if( $request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            File::delete('public/images/blog/'.$filename.'');
            $request->file('image')->move(public_path('images/blog/'),$file_name);
        }else{
            $file_name = $filename;
        }
        $request['slug'] = Str::slug($request->name);
        $blog = Blog::where('id',$id)->update([
            'name' => $request->name,
            'slug' =>$request->slug,
            'id_cate' => $request->id_cate,
            'id_admin' =>Auth::guard('admin')->user()->id,
            'content' =>$request->content,
            'image' => $file_name,
            'status' => $request->status
        ]);
        if($blog){
            return redirect()->route('blog.index')->with('updateblog-success','them thanh cong');
        }else{
            return redirect()->back()->with('updateblog-error','Thêm mới không thành công');
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
