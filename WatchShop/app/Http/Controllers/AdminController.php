<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        
        return view('backend.index');

    }
    
    public function login(){
        return view ('backend.login');
    }
    //đăng nhập admin
    public function postLogin(Request $request){
        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->has('remember'))){
            return redirect()->route('backend.index')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    //đăng xuất admin
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('backend.login');
    }
}
