<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){

        $admin_email = $request->admin_userName;
        $admin_password = md5($request->admin_password);

        $result = DB::table('user')->where('Email',$admin_email)->where ('Password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->FullName);
            Session::put('admin_id',$result->UserID);

            return Redirect::to('/dashboard');
        }else{
            Session::put('message','UserName hoặc Mật khẩu sai!');
            return Redirect::to('/admin'); // trả về trang admin
        }
    }

    public function logout(){
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin'); // trả về trang admin
    }

}
