<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon as Carbon;
use App\Models\Post as Post;
use App\Models\Comment as Comment;
use App\Models\User as User;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('checkRole:admin');
//        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalPost      = Post::all();
        $totalComment   = Comment::all();
        $totalUser      = User::all();
        return view('admin.dashboard', compact('totalPost', 'totalComment', 'totalUser'));
    }

    public function comments()
    {
        $totalComment   = Comment::all();
        return view('admin.comments', compact('totalComment'));
    }

    public function deleteComment($id)
    {
        $post = Comment::where('id', $id)->delete();
        return redirect()->back()->with("success","Comment deleted successfully !");
    }

    public function posts()
    {
        $totalPost = Post::all();
        return view('admin.posts', compact('totalPost'));
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return redirect()->back()->with("success","Post deleted successfully !");
    }

    public function editPost($id)
    {
        $post = Post::where(array('id' => $id ))->first();
        return view('admin.edit-post', compact('post'));
    }

    public function submitEditPost(CreatePost $r , $id)
    {
        $post = Post::where(array('id' => $id))->first();
        $post->title = $r->title;
        $post->content = $r->content;
        $post->save();

        return back()->with('success', 'Post successfully updated.');
    }

    public function users()
    {
        $users = User::all();
        $comment = new Comment();
        return view('admin.users', compact('users', 'comment'));
    }

    public function adminUserEdit($id)
    {
        $user = User::find($id);
        return view('admin.edit-user', compact('user'));
    }

    public function submitUserEdit(UserUpdate $r, $id)
    {
        $user = User::where(array('id' => $id))->first();
        $user->name = $r->name;
        $user->email = $r->email;
        $user->author = $r->author;
        $user->admin = $r->admin;
        $user->save();

        return back()->with('success', 'User successfully updated.');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect()->back()->with("success","User deleted successfully !");
    }
}
