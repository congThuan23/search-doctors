<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function index(){
        $all_doctor = DB::table('user')->where('RoleID',3)
        ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
        ->join('language_of_doctor','User.UserID', '=', 'language_of_doctor.DoctorID')
        ->select('user.UserID','user.FullName as doctor_name','special_info.Degree as doctor_degree',
            'special_info.AcademicRank as doctor_academicRank','special_info.DeptID',
            'special_info.Certificate as doctor_certificate','special_info.Experience as doctor_experience',
            'special_info.ResearchWork as doctor_researchWork',
            'special_info.ClinicalFields as doctor_clinicalFields')
        ->orderby('user.Count', 'DESC')->distinct()->get();
        return view('doctor.index')->with('all_doctor', $all_doctor);
    }
}
