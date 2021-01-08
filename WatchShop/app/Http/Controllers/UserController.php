<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\ResetPassRequest;
use App\Http\Requests\User\UpdateInfoRequest;
use App\Http\Requests\User\UpdatePassRequest;
use phpDocumentor\Reflection\Types\Nullable;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }
    //view reset pass
    public function reset(){
        return view('frontend.resetpassword');
    }
    //post reset pass
    public function resetpass(ResetPassRequest $request){
        $user = User::where(['email'=>$request->email ,'phone'=> $request->phone]);
        if(null !== $user ){
            $user->update([
                'password'=> Hash::make($request->password),
            ]);
            return redirect()->route('frontend.login-register')->with('resetok','Đặt lại mật khẩu thành công');
        }else{
            return redirect()->back()->with('fail','Email và Số điện thoại đã đăng ký không trùng khớp');
        }
    }
    //view dang nhap
     public function register_form(){
        $error_re = 0;
        return view('frontend.login-register',compact('error_re'));
    }
    // view thông tin tài khoản
    public function infor(){
        $bill = Order::where('id_user','=',Auth::user()->id)->get();
        return view('frontend.information',compact('bill'));
    }
    //view update pass
    public function updatepass(){
        return view('frontend.updatepass');
    }
    // update pass
    public function updatepassword($id, UpdatePassRequest $request){
        if(Hash::check($request->old_password,User::find($id)->password)){
            User::find($id)->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('frontend.information')->with('updateok',"Đổi mật khẩu thành công");
        }else{
            return redirect()->back()->with('updatefail',"Mật khẩu cũ không đúng");
        }
    }
    //update thong tin user
    public function update($id,UpdateInfoRequest $request){
        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'birthday'=>$request->birthday,
        ]);
        return redirect()->back()->with('success','Sửa thông tin thành công');
    }

    //dang ky

    public function create(UserRegisterRequest $request)
    {
        //
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'birthday'=>$request->birthday,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('frontend.login-register')->with('register','Đăng ký thành công');
        
        
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
