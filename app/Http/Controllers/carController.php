<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::all();
        return view('cars.index')->with('Cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'file|image',
            'Make' => 'required',
            'Model' => 'required',
            'Colour' => 'required',
            'Registration' => 'required',
            'AskingPrice' => 'required',
            'Location' => 'required',
            'dateOfNCT' => 'required',
            'taxDate' => 'required',
            'email' => 'required',
        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;
        $path = $image->storeAs('public/images', $filename);
        Car::create([
            'image' => $filename,
            'Make' => $request->Make,
            'Model' => $request->Model,
            'colour' => $request->Colour,
            'Registration' => $request->Registration,
            'Make' => $request->Make,
            'Asking Price' => $request->AskingPrice,
            'Location' => $request->Location,
            'dateOfNCTExpiration' => $request->dateOfNCT,
            'dateOfTaxExpiration' => $request->taxDate,
            'Contact Email Address' => $request->email,
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
        ]);
        return to_route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        if($car->user_id != Auth::id()){
            return abort(403);
        }
        return view('cars.edit')->with('car', $car);

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
        //
    }
}
