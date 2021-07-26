<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PublicController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::all();
        return view('home', $data);
    }

    public function singlePost($id)
    {
        $data['post'] = Post::find($id);
        return view('singlePost', $data);
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function contactUsPost()
    {

    }

}
