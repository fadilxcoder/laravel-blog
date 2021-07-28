<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserUpdate;
use App\Models\Comment;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function comments()
    {
        return view('user.comments');
    }

    public function deleteComment($id)
    {
        $comment = Comment::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with("success","Comment deleted successfully !");
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profilePost(UserUpdate $request)
    {
        $user = Auth::user();

        if(!empty($request->get('current_password')) && !empty($request->get('new_password')) && !empty($request->get('new_confirm_password'))):

            if (!(Hash::check($request['current_password'], $user->password)))
            {
                return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
            }
            elseif(strcmp($request['current_password'], $request['new_password']) == 0)
            {
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
            elseif(strcmp($request['new_password'], $request['new_confirm_password']) != 0)
            {
                return redirect()->back()->with("error","New Password Confirmation does not match New Password.");
            }
            else
            {
                $user->password = bcrypt($request['new_password']);
            }
        endif;


        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->save();

        return redirect()->back()->with("success","Account Updated successfully !");
    }

}
