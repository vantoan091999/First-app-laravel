<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoanModel;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginView() {
        $msg = session::get('msg');
        return view('login', ['msg'=>$msg]);
    }

    public function index() {
        return view('admin.index');
    }

    public function registration() {
        return view('registration');
    }

    public function store(request $request) {

        $data = [
            'name' =>$request['name'],
            'email' =>$request['email'],
            'phone' =>$request['phone'],
            'password' =>md5($request['password']), 
        ];
        User::create($data);
        return view('registration')->with('msg', 'đăng ký thành công');
    }//queries_redirect

    public function login(Request $request) {
         $credentials = $request->only('email', 'password');
        
        if(Auth::guard('users')->attempt($credentials)) { //check email vaf password co giong vs database k 
            return redirect()->route('index');
        } 
        // $user = Auth::guard('users')->user();
        return redirect()->route('login')->with('msg', 'Sai tk hoac mk');
    }

}
