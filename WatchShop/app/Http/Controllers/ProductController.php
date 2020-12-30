<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_img;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show_pro($id)
    {
        $pro_fend = Product::find($id);
        $id_cate = $pro_fend->id_cate;
        $pro_related = Product::where('id_cate','=',$id_cate)->limit(4)->get();
        $feedbacks = Feedback::where('id_product','=',$id)->get();
        $pro_img = Product_img::where('id_product','=',$id)->get();
        $pro_upsell = Product::limit(4)->get();
        return view('frontend.product',compact('pro_upsell','pro_fend','pro_img','feedbacks','pro_related'));

    }


}
