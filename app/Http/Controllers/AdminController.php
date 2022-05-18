<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



    public function index()
    {
        $no_of_devices = DB::table('devices')->count();
        $no_of_admin = DB::table('users')->where('role', '=', 'Admin')->count();
        $no_of_users = DB::table('users')->where('role', '=', 'User')->where('approved', '=', 'yes')->count();
        $no_of_pending_users = DB::table('users')->where('role', '=', 'User')->where('approved', '!=', 'yes')->count();
        return view('admin.index')
            ->with('no_of_devices', $no_of_devices)
            ->with('no_of_admin', $no_of_admin)
            ->with('no_of_users', $no_of_users)
            ->with('no_of_pending_users', $no_of_pending_users);
    }


    public function getUsers()
    {
        $allUsers = DB::select('select * from users where role = "User"');
        return view('admin.user')->with('name', $allUsers);
    }

    public function updateApprovalView(Request $request)
    {
        $id = $request->route('id');
        $user = DB::select('select * from users where id = "' . $id . '"');
        return view('admin.userUpdate')->with('user', $user);
    }

    public function updateApproval(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $approval = $request->input('approval');
        // var_dump($id);
        // $user = DB::select('select * from users where id = "'.$id.'"');
        DB::update('update users set approved = ? where id = ?', [$approval, $id]);
        return redirect()->route('updateUserApproval.user');
    }

    public function viewProfile()
    {
        $id = Auth::user()->id;
        $user = DB::select('select * from users where id = "' . $id . '"');
        $result = false;
        return view('admin.profile')->with('user', $user)->with('result', $result);
    }

    public function updateuserinfo(Request $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');

        $result = DB::update('update users set email = ?, name=? where id = ?', [$email, $name, $id]);

        $user = DB::select('select * from users where id = "' . $id . '"');
        return view('admin.profile')->with('user', $user)->with('result', $result);
    }

    public function temp(){
        return view('admin.temp');
    }
}
