<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRegisterRequest;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }
    //view dang nhap

    
    public function register_form(){
        $error_re = 0;
        return view('frontend.login-register',compact('error_re'));
    }
    // view thông tin tài khoản
    public function infor(){
        return view('frontend.information');
    }

    //dang ky

    public function create(UserRegisterRequest $request)
    {
        //
        $add = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'birthday'=>$request->birthday,
            'password'=> Hash::make($request->password),
        ]);
        if($add){
            $error_re = 0;
            return redirect()->route('frontend.login-register',compact('error_re'))->with('register','Đăng ký thành công');
        }else{
            $error_re = 1 ;
            return redirect()->route('frontend.login-register',compact('error_re'))->with('error_re','Đăng ký không thành công');
        };
    }
    //dang nhap


    public function login(Request $request)
    {
        //
        if(Auth::attempt($request->only('email','password'),$request->has('remember'))){
            return redirect()->route('frontend.index')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }


    //dang xuat
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('frontend.index');
    }



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
