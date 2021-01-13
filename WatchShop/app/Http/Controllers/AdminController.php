<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


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
        if(Auth::attempt($request->only('email','password'),$request->has('remember'))){
            return redirect()->route('backend.index')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    //đăng xuất admin
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('backend.login');
    }

    // public function index()
    // {
    //     $admin=Session::get('admin');
    //     if (!isset($admin)) {
    //         return redirect()->route('backend.login');
    //     }else {
    //         return view('backend.index');
    //     }
    //     return view('backend.index');
    // }
    // public function login()
    // {
    //     return view('backend.login');
    // }
    // public function postLogin(Request $req)
    // {
    //     // dd($req->all());
    //     $email = $req->email;
    //     $password = $req->password;
    //    $admin= Admin::where('email','=',$req->email)->first();
    //    if (empty($admin)) {
    //         return redirect()->back()->with('error', 'Sai email');
    //    }else {
    //         if(Hash::check($password,$admin->password)) {
    //             Session::put('admin',$admin);
    //             return redirect()->route('backend.index')->with('success', 'Đăng nhập thành công');
    //         } else {
    //             return redirect()->back()->with('error', 'Sai mật khẩu');
    //         }
    //    }
    // }
    // public function logout()
    // {
    //     Session::forget('admin');
    //     return redirect()->route('backend.login')->with('success', 'Đăng xuất thành công');
    // }
    // public function user_manager()
    // {
    //     $all = User::all();
    //     // dd($all);
    //     return view('backend.user.index', compact('all'));
    // }
    // public function delete_user($id)
    // {
    //     User::find($id)->delete();
    //     return redirect()->back()->with('success', 'Xóa người dùng thành công');
    // }
}
