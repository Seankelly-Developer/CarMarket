<?php

namespace App\Http\Controllers\admin;

/*Purpose of the controller is to control the
 behaviour of a request and it handles 
 the requests that come from the routes */

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Colour;
use App\Models\Make;
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
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $cars = Car::paginate(5);
        return view('admin.cars.index')->with('Cars', $cars)->with('Colour');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        /*This returns the view that displays the advertisement creation form*/
        $make = Make::all();
        $colours = Colour::all();
        return view('admin.cars.create')->with('makes', $make)->with('colours', $colours);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*This function specifies what fields are required via validation below */

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'image' => 'file|image',
            'make_id' => 'required',
            'Model' => 'required',
            'colours' => ['required', 'exists:colours,id'],
            'Registration' => 'required',
            'AskingPrice' => 'required',
            'Location' => 'required',
            'Description' => 'required',
            'dateOfNCT' => 'required',
            'taxDate' => 'required',
            'email' => 'required',
        ]);

        /*The following code specifies the image file type and also generates a title to store on behalf of the image in the database */

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $image->storeAs('public/images', $filename);

        /*The following code creates a car object to be used to store to the database and specifies which columns to 
        store each piece of data to*/

        $car = Car::create([
            'image' => $filename,
            'make_id' => $request->make_id,
            'Model' => $request->Model,
            'Registration' => $request->Registration,
            'Asking_Price' => $request->AskingPrice,
            'Location' => $request->Location,
            'Description' => $request->Description,
            'dateOfNCTExpiration' => $request->dateOfNCT,
            'dateOfTaxExpiration' => $request->taxDate,
            'email' => $request->email,
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
        ]);
        $car->colours()->attach($request->colours);
        return to_route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        /*This function returns the view that displays the specific advertisement clicked by the user */
        return view('admin.cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    /*The edit function takes the car variable in order to specify which advertisement the user is
    requesting to edit. */
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        /*The following verifies that the user is the advertisement publisher prior to allowing them to get to the edit view
        in order to make any changes */
        $make = Make::all();
        $colours = Colour::all();
        return view('admin.cars.edit')->with('car', $car)->with('makes', $make)->with('colours', $colours);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $request->validate([
            'image' => 'file|image',
            'make_id' => 'required',
            'Model' => 'required',
            'Colour' => 'required',
            'Registration' => 'required',
            'AskingPrice' => 'required',
            'Location' => 'required',
            'Description' => 'required',
            'dateOfNCT' => 'required',
            'taxDate' => 'required',
            'email' => 'required',
        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $image->storeAs('public/images', $filename);
        $car->update([
            'image' => $filename,
            'make_id' => $request->make_id,
            'Model' => $request->Model,
            'Registration' => $request->Registration,
            'Make' => $request->Make,
            'Asking_Price' => $request->AskingPrice,
            'Location' => $request->Location,
            'Description' => $request->Description,
            'dateOfNCTExpiration' => $request->dateOfNCT,
            'dateOfTaxExpiration' => $request->taxDate,
            'email' => $request->email,
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
        ]);
        $car->colours()->attach($request->colours);
        return to_route('admin.cars.show', $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        /*The destory function takes the car variable, checks the user is rthe owner and either 
        warns the user that they're not the creator via a javascript alert or deletes the advertisement
        if validation is passed */
        $car->delete();
        return to_route('admin.cars.index');
    }
}
