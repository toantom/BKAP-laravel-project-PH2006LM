<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bans_client_1= Banner::where('status', '=', 1)->get();
        $bans_client_2= Banner::where('status', '=', 2)->get();
        $bans_client_3= Banner::where('status', '=', 3)->get();
        $pros= Product::all();
        $pros_sale= Product::where('discount', '>', 0)->get();
        $pros_bestsell = [];
        $order_count= Product::withCount('order')->get();
        foreach($order_count as $item){
            if($item->order_count > 0){
                $pros_bestsell[$item->id]= $item;
            }
        }
        $pros_man = Product::where('type', '=', 0)->get();
        $pros_woman = Product::where('type', '=', 1)->get();
        $blogs = Blog::all();
        return view('frontend.index',compact('blogs','bans_client_1','bans_client_2','bans_client_3','pros','pros_bestsell','pros_man','pros_woman','pros_sale'));
    }
    public function about(){
        return view('frontend.about');
    }
}