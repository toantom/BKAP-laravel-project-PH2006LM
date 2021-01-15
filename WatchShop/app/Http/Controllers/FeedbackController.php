<?php

namespace App\Http\Controllers;


use App\Models\Feedback;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //show index
    public function index()
    {
        $feedbacks = Feedback::orderBy('status','ASC')->orderBy('created_at','DESC')->paginate(5);
        return view('backend.feedback.index',compact('feedbacks'));
    }
    //Seen feedback
    public function seen($id)
    {
        Feedback::where("id",$id)->update(['status'=> "1" ]);
        return redirect()->route('backend.feedback')->with('success',"");
    }
    //Add feedback
    public function create(Request $request)
    {   
        $check = "feedback";
        $id = $request->id_product;
        $slug = $request->slug;
        if(Auth::check()){
        $checks = DB::table('Order_details')
                    ->crossJoin('Orders')
                    ->where(['id_user'=>Auth::user()->id,'id_product'=>$request->id_product])
                    ->get();
        if(count($checks) == 0){
             return redirect()->back()->with('fail','');
        }else{
        $rules = [
                'name' => 'required|string|max:255',
                'image' => 'required|mimes:jpg,jpeg,png,gif',
                'content'=>'required|max:255',
                'star'=>'required'
                ];
        $messages = [
                'name.required' => 'Tên người nhận không được để trống',
                'name.string' => 'Tên người nhận không đúng định dạng',
                'image.required'=>'Ảnh sản phẩm không được để trống',
                'image.mimes'=>'Ảnh không đúng định dạng',
                'content.required'=>'Nội dung không được để trống',
                'content.max'=>'Nội dung không quá 225 ký tự',
                'star.required'=>'Vui lòng đánh giá số sao'
                ];
        $request->validate($rules,$messages);
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('images/feedback'),$file_name);
        Feedback::create([
            "id_product"=>$request->id_product,
            "id_user"=>Auth::user()->id,
            "image"=>$file_name,
            "content"=>$request->content,
            "star"=>$request->star,
            "name"=>$request->name
        ]);
        $star = 0;
        $s = Feedback::where('id_product','=',$request->id_product)->get();
        foreach($s as $item){
            $star += $item->star;
        };
        $star_pro = $star/count($s);
        Product::find($request->id_product)->update([
            'star'=>$star_pro
        ]);
        return redirect()->back()->with('success',"");}
        }else{
            return view('frontend.login-register',compact('check','slug'));
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
        Feedback::find($id)->delete();
        return redirect()->back()->with('deletefeedback',"");
    }
}
