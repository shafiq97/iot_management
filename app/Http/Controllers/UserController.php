<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $data = array(
            'list' => DB::table('devices')->get()
        );

        return view('user.index', $data);
    }


    function view_devices()
    {
        $data = array(
            'list' => DB::table('devices')->get()
        );

        return view('user.view_devices', $data);
    }

    public function viewProfile()
    {
        $id = Auth::user()->id;
        $user = DB::select('select * from users where id = "' . $id . '"');
        $result = false;
        return view('user.profile')->with('user', $user)->with('result', $result);
    }

    public function updateuserinfo(Request $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');

        $result = DB::update('update users set email = ?, name=? where id = ?',[$email,$name,$id]);

        $user = DB::select('select * from users where id = "' . $id . '"');
        return view('user.profile')->with('user', $user)->with('result', $result);

    }
}
