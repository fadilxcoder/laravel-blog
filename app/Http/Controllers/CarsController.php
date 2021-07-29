<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # dump(Car::all());
        # dump(Car::where('year', '<', '2020')->get());

        # Display response in batch of 5
        /*
        Car::chunk(5, function($cars){
            foreach ($cars as $_cars) {
                dump($_cars->id);
            }
            dump('clear');
        });
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # For example only

        # Save as Object
        /*
        $car = new Car();
        $car->model_name = 'BMW';
        $car->information = 'You should ensure you change your APP_ENV environment variable to production in your production environment.';
        $car->year = 2021;
        $car->save();
        */

        # Insert with create() & no save()
        /*
        $car = Car::create([
            'model_name' => 'Porche',
            'information' => 'You should ensure you change your APP_ENV environment variable to production in your production environment.',
            'year' => 1991
        ]);
        */

        # Insert with make();
        /*
        $car = Car::make([
            'model_name' => 'Mercedes',
            'information' => 'You should ensure you change your APP_ENV environment variable to production in your production environment.',
            'year' => 1900
        ]);
        $car->save();
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # $car = Car::where('id', '=', $id)->get();
        # dump($car[0]['model_name']);

        # $car = Car::where('id', '=', $id)->firstOrFail();
        # dump($car->model_name, $car['model_name']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # For example only

        # Get current value & udpate

        /*
        $car = Car::find($id)->firstOrFail();
        dump($car);

        Car::where('id', $id)->update([
            'model_name' => 'Tesla',
            'information' => 'Lane 8 - Ben Bohmer - Nora En Pure - Mees Salomé - Franky Wah - Sultan + Shepard (Omer Gigi Set)',
            'year' => 2027,
        ]);
        */

        # Delete data
        /*
        Car::find($id)->delete();
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Not tested
        // Pass parameter Car $car instead of $id, then do a $car->delete();
    }
}
