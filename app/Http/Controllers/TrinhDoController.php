<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrinhDoController extends Controller
{
    //
    public function index()
    {
        $languages = DB::table('language')->get();
        $info = DB::table('special_info')->where('DoctorID', '=', session()->get('userid'))->first();
        return view('doctor.trinhdo', compact('languages','info'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hocham' => 'required',
            'hocvi' => 'required',
            'chungnhan' => 'required',
            'chungnhanmc' => 'required',
            'kinhnghiem' => 'required',
            'kinhnghiemmc' => 'required',
            'ngonngu' => 'required',
            'ngonngumc' => 'required',
            'ctnc' => 'required',
            'ctncmc' => 'required',
            'linhvuc' => 'required',
        ]);

        $info = DB::table('special_info')->where('DoctorID', '=', $request->UserID);
        if ($info->first()) {
            $info->update([
                'Degree' => $request->hocvi,
                'AcademicRank' => $request->hocham,
                'Certificate' => strip_tags($request->chungnhan),
                'Experience' => strip_tags($request->kinhnghiem),
                'ResearchWork' => strip_tags($request->ctnc),
                'ClinicalFields' => $request->linhvuc,
            ]);
        } else {
            DB::table('special_info')->insert([
                'Degree' => $request->hocvi,
                'AcademicRank' => $request->hocham,
                'Certificate' => strip_tags($request->chungnhan),
                'Experience' => strip_tags($request->kinhnghiem),
                'ResearchWork' => strip_tags($request->ctnc),
                'ClinicalFields' => $request->linhvuc,
                'DoctorID' => $request->UserID,
            ]);
        }

        $info = DB::table('special_info')->where('DoctorID', '=', $request->UserID)->first();

        //Xóa ngôn ngữ cũ luôn
        DB::table('language_of_doctor')->where('DoctorID', '=', $request->UserID)->delete();

        DB::table('language_of_doctor')->insert([
            'LanguageID' => $request->ngonngu,
            'DoctorID' => $request->UserID
        ]);

        //xóa hết trc khi thêm minh chứng mới
        DB::table('clear_proof')->where('InfoID', '=', $info->InfoID)->delete();

        DB::table('clear_proof')->insert([
            [
                'File' => $request->file('chungnhanmc')->getClientOriginalName(),
                'InfoID' => $info->InfoID
            ],
            [
                'File' => $request->file('kinhnghiemmc')->getClientOriginalName(),
                'InfoID' => $info->InfoID
            ],
            [
                'File' => $request->file('ngonngumc')->getClientOriginalName(),
                'InfoID' => $info->InfoID
            ],
            [
                'File' => $request->file('ctncmc')->getClientOriginalName(),
                'InfoID' => $info->InfoID
            ],
        ]);
        session()->flash('success', 'Đã cập nhật trình độ thành công');
        return back();
    }
}
