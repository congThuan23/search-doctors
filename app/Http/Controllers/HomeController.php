<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Table;

class HomeController extends Controller
{
    public $fullName = '';

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function verify_login(Request $request)
    {
        $email_user = $request->email_account;
        $password_user = md5($request->password_account);

        $result = DB::table('user')->where('Email',$email_user)->where ('Password',$password_user)->first();

        if($result){
            Session::put('username',$result->FullName);
            Session::put('userid',$result->UserID);
            if($result->RoleID == 3)
            {
                return redirect()->route('doctor');
            }
            else if ($result->RoleID == 4){
                return Redirect::to('/customer/'.$result->UserID);
            }
            else{
                return 'Đây là trang chuyên khoa';
            }
        }else{
            Session::put('message','UserName hoặc Mật khẩu sai!');
            return Redirect::to('/login');
        }
    }

    public function customer(Request $request, $userID)
    {
        $result = DB::table('user')->where('UserID',$userID)->first();
        Session::put('username',$result->FullName);
        Session::put('userid',$result->UserID);

        $all_doctor = DB::table('user')->where('RoleID',3)
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('language_of_doctor','User.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('user.UserID','user.FullName as doctor_name','special_info.Degree as doctor_degree',
                'special_info.AcademicRank as doctor_academicRank','special_info.DeptID',
                'special_info.Certificate as doctor_certificate','special_info.Experience as doctor_experience',
                'special_info.ResearchWork as doctor_researchWork',
                'special_info.ClinicalFields as doctor_clinicalFields')
            ->orderby('user.Count', 'DESC')->distinct()->get();

        $all_dept = DB::table('dept')->select('DeptID', 'Name')->get();

        $get_languageID = DB::table('language_of_doctor')
            ->join('user','user.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('language_of_doctor.LanguageID', 'user.UserID')->get();
        $all_language = DB::table('language')->select('LanguageID', 'Language')->get();

        $all_week_schedule = DB::table('week_schedule');
        $all_day_schedule = DB::table('day_schedule');
        $all_work_schedule = DB::table('work_schedule');

        return view('client.home', compact('all_doctor','all_dept','all_language','get_languageID',
            'all_week_schedule','all_day_schedule', 'all_work_schedule'));
    }

    public function index(Request $request)
    {
        $all_doctor = DB::table('user')->where('RoleID',3)
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('language_of_doctor','User.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('user.UserID','user.FullName as doctor_name','special_info.Degree as doctor_degree',
                'special_info.AcademicRank as doctor_academicRank','special_info.DeptID',
                'special_info.Certificate as doctor_certificate','special_info.Experience as doctor_experience',
                'special_info.ResearchWork as doctor_researchWork',
                'special_info.ClinicalFields as doctor_clinicalFields')
            ->orderby('user.Count', 'DESC')->distinct()->get();

        $all_dept = DB::table('dept')->select('DeptID', 'Name')->get();

        $get_languageID = DB::table('language_of_doctor')
            ->join('user','user.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('language_of_doctor.LanguageID', 'user.UserID')->get();
        $all_language = DB::table('language')->select('LanguageID', 'Language')->get();

        $all_week_schedule = DB::table('week_schedule');
        $all_day_schedule = DB::table('day_schedule');
        $all_work_schedule = DB::table('work_schedule');

        return view('client.home', compact('all_doctor','all_dept','all_language','get_languageID',
            'all_week_schedule','all_day_schedule', 'all_work_schedule'));
    }

    public function search_doctors(Request $request){
        $all_doctor = DB::table('user')->where('RoleID',3)
            ->Where('user.FullName', 'LIKE', "%{$request->doctor_search}%")
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('language_of_doctor','User.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('user.UserID','user.FullName as doctor_name','special_info.Degree as doctor_degree',
                'special_info.AcademicRank as doctor_academicRank','special_info.DeptID',
                'special_info.Certificate as doctor_certificate','special_info.Experience as doctor_experience',
                'special_info.ResearchWork as doctor_researchWork',
                'special_info.ClinicalFields as doctor_clinicalFields')
            ->orderby('user.Count', 'DESC')->distinct()->get();

        $all_dept = DB::table('dept')->select('DeptID', 'Name')->get();

        $get_languageID = DB::table('language_of_doctor')
            ->join('user','user.UserID', '=', 'language_of_doctor.DoctorID')
            ->select('language_of_doctor.LanguageID', 'user.UserID')->get();
        $all_language = DB::table('language')->select('LanguageID', 'Language')->get();

        return view('client.home', compact('all_doctor','all_dept','all_language','get_languageID'));
    }

    public function doctor($UserID){
        $result = DB::table('user')->where('UserID',$UserID)->first();
        Session::put('username',$result->FullName);
        Session::put('userid',$result->UserID);

        return view('doctor.index');
    }
}
