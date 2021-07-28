<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

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

    # Query Builder & Eloquent

    public function carsList()
    {
        # Non Fluent
        $cars = DB::select('SELECT * FROM Cars');

        return view('carsList', [
            'cars' => $cars,
        ]);
    }

    public function carSingle($id)
    {
        # Non Fluent
        $carSqlQuery = DB::select('SELECT * FROM Cars WHERE id = :id', ['id' => $id]);

        return view('carSingle', [
            'car' => $carSqlQuery[0],
        ]);
    }
}
