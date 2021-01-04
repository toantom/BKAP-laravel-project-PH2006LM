<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function index()
    {
        //
    }
    //Add feedback
    public function create(FeedbackRequest $request)
    {
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('images/feedback'),$file_name);
        Feedback::create([
            "id_product"=>$request->id_product,
            "id_user"=>Auth::user()->id,
            "image"=>$file_name,
            "content"=>$request->content,
            "name"=>$request->name
        ]);
        return redirect()->back();
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
