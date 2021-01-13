<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function index()
    {
        //
    }
    //Add feedback
    public function create(FeedbackRequest $request)
    {   $check = DB::table('Order_details')
                    ->crossJoin('Orders')
                    ->where(['id_user'=>Auth::user()->id,'id_product'=>$request->id_product])
                    ->get();
        if(count($check) == 0){
             return redirect()->back()->with('fail','');
        }else{
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
