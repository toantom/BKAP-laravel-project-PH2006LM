<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners= Banner::paginate(5);
        return view('backend.banner.index', compact('banners'));
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
    public function store(Request $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/banner'),$file_name);
        $request['slug'] = Str::slug($request->name);
        
        $banner = Banner::create([
            'name' => $request->name,
            'image'=> $file_name,
            'title' => $request->title,
            'content' => $request->content,
            'status'=>$request->status,
            'slug'=> $request->slug
        ]);
        if($banner){
            return redirect()->route('banner.index')->with('addbanner-success','Thêm mới thành công');
        }else{
            return redirect()->back()->with('addbanner-error','Thêm mới không thành công');
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
        $banners= Banner::paginate(5);
        $banner = Banner::find($id);
        return view('backend.banner.edit',compact('banners','banner'));
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
        $filename = Banner::find($id)->image;
        if( $request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            File::delete('public/images/banner/'.$filename.'');
            $request->file('image')->move(public_path('images/banner/'),$file_name);
        }else{
            $file_name = $filename;
        }
        $request['slug'] = Str::slug($request->name);
        $ban = Banner::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$file_name,
            'title' => $request->title,
            'content' => $request->content,
            'status'=>$request->status,
            'slug'=>$request->slug
        ]);
        if($ban){
            return redirect()->route('banner.index')->with('updatebanner-success','Sửa thành công');
        }else{
            return redirect()->back()->with('updatebanner-error','Sửa không thành công');
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
        $file_name = Banner::find($id)->image;
        if($file_name){
            File::delete('public/images/banner/'.$file_name.'');
        }
        $ban = Banner::where('id',$id)->delete();
        if($ban){
            return redirect()->back()->with('delbanner-success','Xoá thành công');
        }else{
            return redirect()->back()->with('delbanner-error','Xóa không thàn công');
        }
    }
}
