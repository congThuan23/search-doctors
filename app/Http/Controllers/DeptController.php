<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DeptController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function all_dept(Request $request)
    {
        $this->AuthLogin();

        $all_dept = DB::table('dept')->paginate(5);
        return view('admin.dept.all_dept', compact('all_dept'))
            ->with('i',(request()->input('page',1) - 1) * 5);
    }

    public function add_dept(){
        $this->AuthLogin();
        return view('admin.dept.add_dept');
    }

    public function delete_dept($DeptID){
        $this->AuthLogin();
        DB::table('dept')->where('DeptID',$DeptID)->delete();
        Session::put('message','Đã xóa một chuyên khoa.');
        return Redirect::to('all-dept');
    }

    public function save_dept(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['Name'] = $request->dept_name;
        $data['ParentID'] = $request->dept_sub;
        $data['Desc'] = $request->ten;

        DB::table('dept')->insert($data);
        Session::put('message','Đã thêm một chuyên khoa.');
        return Redirect::to('all-dept');
    }

    public function edit_dept($DeptID){
        $this->AuthLogin();
        $edit_dept = DB::table('dept')->where('DeptID',$DeptID)->get();

        return view('admin.dept.edit_dept', compact('edit_dept'));
    }

    public function update_dept(Request $request,$DeptID){
        $this->AuthLogin();
        $data = array();
        $data['Name'] = $request->dept_name;
        $data['ParentID'] = $request->dept_sup;
        $data['Desc'] = $request->ten;
        DB::table('dept')->where('DeptID',$DeptID)->update($data);
        Session::put('message','Đã cập nhật một chuyên khoa.');
        return Redirect::to('all-dept');
    }

    public function search_dept($dept_name)
    {
        $output = '';
        $all_dept = DB::table('dept')
            ->Where('Name', 'LIKE', '%' . $dept_name . '%')->get();
        $i = 1;

        foreach ($all_dept as $dept) {
            $output .= '<tr>' .
                '<td>' . $i++ . '</td>' .
                '<td>' . $dept->Name . '</td>' .
                '<td>' . $dept->ParentID . '</td>' .
                '<td>' . 'Sửa | Xoá' . '</td>' .
                '</tr>';
        }
        return response()->json($output);
    }
}
