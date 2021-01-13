<?php

namespace App\Providers;
use App\Models\Category;
use App\Helper\CartHelper;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CartHelper $cart)
    {
        view()->composer('*',function($view){
            if(Auth::check()){$wish=Wishlist::Where('id_user','=',Auth::user()->id)->get();}else{$wish=0;};
            $view->with([
                'cart'=>($data = new CartHelper),
                'cates'=>Category::where('status', '=', 1)->get(),
                'wishlist'=>$wish,
                'noti_order'=>count(Order::where('status','<',2)->get()),
                'noti_fb'=>count(Feedback::where('status','=',0)->get()),
                'new_user'=>count(User::where('status','=',0)->get()),
            ]);
        });
        Paginator::useBootstrap();
    }
}
