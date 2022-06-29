<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WorkTimeController extends Controller {
    public function index() {
        $id = Session::get( 'userid' );
        $dbWorkTime = DB::table('work_time')
            ->join('day_schedule', 'day_schedule.DayScheduleID', '=', 'work_time.DayScheduleID')
            ->join('week_schedule', 'week_schedule.WeekScheduleID', '=', 'day_schedule.WeekScheduleID')
            ->join('user', 'user.UserID', '=', 'week_schedule.DoctorID')
            ->Where('userid',$id)
            ->get();
        
        return view( 'client.work-time', compact( 'dbWorkTime' ) );
    }
    public function edit_worktime($WorktimeID){
        $dbWorkTime = DB::table('work_time')
            ->join('day_schedule', 'day_schedule.DayScheduleID', '=', 'work_time.DayScheduleID')
            ->join('week_schedule', 'week_schedule.WeekScheduleID', '=', 'day_schedule.WeekScheduleID')
            ->join('user', 'user.UserID', '=', 'week_schedule.DoctorID')
            ->Where('WorktimeID',$WorktimeID)
            ->get();
        $dayOfWeek = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN'];
        return view( 'client.update-work-time',compact('dbWorkTime','dayOfWeek'));
    }
    public function update_worktime(Request $request, $id){
        $data = array();
        $data['Start'] = $request->Start;
        $data['Finish'] = $request->Finish;
        $data['Location'] = $request->Location;
        $data['Date'] = $request->Date;
        DB::table('work_time')
            ->join('day_schedule', 'day_schedule.DayScheduleID', '=', 'work_time.DayScheduleID')
            ->join('week_schedule', 'week_schedule.WeekScheduleID', '=', 'day_schedule.WeekScheduleID')
            ->join('user', 'user.UserID', '=', 'week_schedule.DoctorID')
            ->Where('WorktimeID',$id)
            ->update( $data );
        Session::put( 'message', 'Cập nhật lich trinh thành công!!!' );
        return Redirect::to( '/worktime' );
    }
    public function add_workTime(){
        $dayOfWeek = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN'];
        return view( 'client.add-work-time',compact('dayOfWeek'));
    }
    public function save_workTime(Request $request){
        $id = Session::get( 'userid' );
        $data = array();
        $data['Start'] = $request->Start;
        $data['Finish'] = $request->Finish;
        $data['Location'] = $request->Location;
        $data['Date'] = $request->Date;
        $data['FirstDay'] = $request->FirstDay;
        $data['LastDay'] = $request->LastDay;
        DB::table('work_time')
            ->join('day_schedule', 'day_schedule.DayScheduleID', '=', 'work_time.DayScheduleID')
            ->join('week_schedule', 'week_schedule.WeekScheduleID', '=', 'day_schedule.WeekScheduleID')
            ->join('user', 'user.UserID', '=', 'week_schedule.DoctorID')
            ->Where('userid',$id)
            ->insert( $data );
        Session::put( 'message', 'Cập nhật lich trinh thành công!!!' );
        return Redirect::to( '/worktime' );
    }


}
