<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InfoUserController extends Controller {
    public function index() {
        $id = Session::get( 'userid' );
        $info = DB::table( 'user' )->where( 'userid', $id )->get();
        return view( 'client.edituser', compact( 'info' ) );
    }

    public function update_info( Request $request, $id ) {
        $data = array();
        $data[ 'FullName' ] = $request->FullName;
        $data[ 'Email' ] = $request->Email;
        $data[ 'DateOfBirth' ] = $request->DateOfBirth;
        $data[ 'PhoneNumber' ] = $request->PhoneNumber;
        $data[ 'CitizenCard' ] = $request->CitizenCard;
        $data[ 'gender' ] = $request->gender;
        $data[ 'Password' ] = md5( $request->Password );
        DB::table( 'user' )->where( 'userid', $id )->update( $data );
        Session::put( 'message', 'Cập nhật thông tin thành công!!!' );
        return Redirect::to( '/edituser' );
    }
}
