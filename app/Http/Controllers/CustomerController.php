<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
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

    public function all_customer(Request $request)
    {
        $this->AuthLogin();

        $all_customer = DB::table('user')->where('RoleID',4)->paginate(5);
        return view('admin.customer.all_customer', compact('all_customer'))
            ->with('i',(request()->input('page',1) - 1) * 5);
    }

    public function block_user($customer_id)
    {
        $this->AuthLogin();
        DB::table('user')->where('RoleID',4)->where('UserID', $customer_id)->update(['Status' => 0]);
        Session::put('message', 'Đã khóa tài khoản này.');
        return Redirect::to('all-customer');

    }

    public function active_user($customer_id)
    {
        $this->AuthLogin();
        DB::table('user')->where('RoleID',4)->where('UserID', $customer_id)->update(['Status' => 1]);
        Session::put('message', 'Đã kích hoạt tài khoản này.');
        return Redirect::to('all-customer');
    }

    public function edit_customer($customer_id)
    {
        $this->AuthLogin();

        $edit_customer = DB::table('User')->where('RoleID',4)->where('UserID', $customer_id)->get();
        $manager_customer = view('admin.customer.edit_customer')->with('edit_customer', $edit_customer);

        return view('admin_layout')->with('admin.customer.edit_customer', $manager_customer);
    }

    public function update_customer(Request $request, $customer_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['FullName'] = $request->customer_name;
        $data['DateOfBirth'] = $request->customer_dob;
        $data['Email'] = $request->customer_email;
        $data['Password'] = md5($request->customer_password);
        $data['PhoneNumber'] = $request->customer_phone;
        $data['Address'] = $request->customer_address;
        md5($request->admin_password);

        DB::table('user')->where('UserID', $customer_id)->update($data);
        Session::put('message', 'Đã cập nhật một tài khoản người dùng.');
        return Redirect::to('all-customer');
    }

    public function search_customer(Request $request)
    {
        $output = '';
        $all_customer = DB::table('user')->Where('RoleID', 4)
            ->Where('FullName', 'LIKE', '%' . $request->keyword . '%')->get();
        $i = 1;

        foreach ($all_customer as $customer) {
            $output .= '<tr>' .
                '<td>' . $i++ . '</td>' .
                '<td>' . $customer->FullName . '</td>' .
                '<td>' . $customer->Email . '</td>' .
                '<td>' . $customer->Password . '</td>' .
                '<td>' . ($customer->Status == 1 ? 'Activate'
                    : 'Block') . '</td>' .
                '<td>' . 'Sửa' . '</td>' .
                '</tr>';
        }
        return response()->json($output);
    }
}
