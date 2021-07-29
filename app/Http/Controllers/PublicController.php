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
        # $cars = DB::select('SELECT * FROM Cars');

        # Fluent
        $cars = DB::table('cars')
                ->select('id', 'model_name', 'year')
                ->where('year', '<', '2020')
                ->get()
        ;

        return view('carsList', [
            'cars' => $cars,
        ]);
    }

    public function carSingle($id)
    {
        # Non Fluent
        # $carSqlQuery = DB::select('SELECT * FROM Cars WHERE id = :id', ['id' => $id]);

        # Fluent
        # $car = DB::table('cars')->find($id);
        $car = DB::table('cars')
            ->select('id', 'model_name', 'information', 'year')
            ->where('id', '=', $id)
            ->first()
        ;

        # Insert Query Builder
        /*
        DB::table('cars')->insert([
            'model_name' => 'xyz' . rand(99, 9999),
            'information' => 'You may use the Composer package manager to install Telescope into your Laravel project.',
            'year' => date('Y')
        ]);
        */

        # Update Query Builder
        /*
        DB::table('cars')->where('id', '=', 11)->update([
            'model_name' => 'ABC' . rand(99, 9999),
            'information' => 'Telescope makes a wonderful companion to your local Laravel development environment.',
            'year' => date('Y')
        ]);
        */

        # Delete Query Builder
        /*
        DB::table('cars')->where('id', '=', 11)->delete();
        */

        return view('carSingle', [
            # 'car' => $carSqlQuery[0],
            'car' => $car
        ]);
    }
}
