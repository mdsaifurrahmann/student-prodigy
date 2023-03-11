<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $users = User::paginate(10);

        return view('content.dashboard.users.list', compact('users'));

    }


    public function destroy($id){

       if(Auth::check()){
          if(DB::table('users')->where('id', $id)->exists()){
             DB::table('users')->where('id', $id)->delete();
             return redirect()->back()->with('success', 'User removed successfully! Have a nice day!');
          } else{
             return redirect()->back()->with('error', 'Sorry! User Doesn\'t exist!');
          }
       } else{
          return redirect()->back()->with('error', 'You do not have sufficient permission to perform this action! Have a nice day!');
       }

    }
}
