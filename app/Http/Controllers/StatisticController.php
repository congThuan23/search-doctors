<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;
use PDF;

class StatisticController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function statistic_filter($top){
        $output = '';
        $statistic = DB::table('user')->where('RoleID',3)
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('dept','special_info.DeptID', '=', 'dept.DeptID')
            ->select('user.FullName','user.Count','dept.Name')
            ->orderby('user.Count', 'DESC')->take($top)->get();

        $i = 1;
        foreach ($statistic as $item){
            $output .= '<tr>' .
                '<td>' . $i++ . '</td>' .
                '<td>' . $item->FullName . '</td>' .
                '<td>' . $item->Name . '</td>' .
                '<td>' . $item->Count . '</td>' .
                '</tr>';
        }
        return response()->json($output);
    }

    public function statistic(Request $request)
    {
        $this->AuthLogin();

        $statistic = DB::table('user')->where('RoleID',3)
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('dept','special_info.DeptID', '=', 'dept.DeptID')
            ->select('user.FullName','user.Count','dept.Name')
            ->orderby('user.Count', 'DESC')->paginate(5);

        $customer_block = DB::table('user')->where('RoleID',4)->where('Status',0)
            ->count('UserID');
        $customer_activate = DB::table('user')->where('RoleID',4)->where('Status',1)
            ->count('UserID');

        return view('admin.statistic.statistic_top', compact('statistic','customer_block','customer_activate'))
            ->with('i',(request()->input('page',1) - 1) * 5);
    }

    public function print_report(Request $request){
        $statistic = DB::table('user')->where('RoleID',3)
            ->join('special_info','user.UserID', '=', 'special_info.DoctorID')
            ->join('dept','special_info.DeptID', '=', 'dept.DeptID')
            ->select('user.FullName','user.Count','dept.Name')
            ->orderby('user.Count', 'DESC')->take(1000)->get();

        view()->share('statistic',$statistic);
        if($request->has('download')){
            $pdf = PDF::loadView('StatisticPDF');
            return $pdf->download('StatisticPDF.pdf');
        }
        return view('StatisticPDF');
    }

}
