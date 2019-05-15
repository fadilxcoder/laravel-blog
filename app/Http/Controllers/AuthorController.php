<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post as Post;
use App\Comment as Comment;
use \Carbon\Carbon as Carbon;
use App\Http\Requests\CreatePost;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:author');
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id', $posts)->get();
        $today = $comments->where('created_at', '>=', Carbon::today())->count();
        return view('author.dashboard', compact('comments', 'today'));
    }
    
    public function comments()
    {
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id', $posts)->get();
        return view('author.comments',compact('comments') );
    }
    
    public function posts()
    {
        return view('author.posts');
    }
    
    public function newPost()
    {
        return view('author.new-post');
    }
    
    public function submitNewPost(CreatePost $r)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $r['title'];
        $post->content = $r['content'];
        $post->save();
        
        return back()->with('success', 'Post successfully created.');
    }
    
    public function deletePost($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with("success","Comment deleted successfully !");
    }
    
    public function editPost($id)
    {
        $post = Post::where(array('id' => $id, 'user_id' => Auth::id()))->first();
        return view('author.edit-post', compact('post'));
    }
    
    public function submitEditPost(CreatePost $r, $id)
    {
        $post = Post::where(array('id' => $id, 'user_id' => Auth::id()))->first();
        $post->title = $r->title;
        $post->content = $r->content;
        $post->save();
        
        return back()->with('success', 'Post successfully updated.');
    }
}
