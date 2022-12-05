<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
        $user->authorizeRoles('user');
        $cars = Car::paginate(5);
        return view('user.cars.index')->with('Cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        /*This returns the view that displays the advertisement creation form*/
        return view('user.cars.create');
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
        $user->authorizeRoles('user');

        $request->validate([
            'image' => 'file|image',
            'Make' => 'required',
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

        /*The following code specifies the image file type and also generates a title to store on behalf of the image in the database */

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $image->storeAs('public/images', $filename);

        /*The following code creates a car object to be used to store to the database and specifies which columns to 
        store each piece of data to*/

        Car::create([
            'image' => $filename,
            'Make' => $request->Make,
            'Model' => $request->Model,
            'colour' => $request->Colour,
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
        return to_route('user.cars.index');
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
        $user->authorizeRoles('user');
        /*This function returns the view that displays the specific advertisement clicked by the user */
        return view('user.cars.show')->with('car', $car);
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
        $user->authorizeRoles('user');
        /*The following verifies that the user is the advertisement publisher prior to allowing them to get to the edit view
        in order to make any changes */

        if ($car->user_id != Auth::id()) {
            /*This displays a message telling the user why they can't edit the 
             advertisement if they are not the creator of the advertisement.*/
            echo '<script type="text/javascript">
               
                window.onload = function () { alert("You cannot edit this ad as you are not the creator"); } 
            </script>';
            /*This returns the previous screen */
            return view('user.cars.show')->with('car', $car);
        } else {
            /*This returns the edit form screen */
            return view('user.cars.edit')->with('car', $car);
        }
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
        $user->authorizeRoles('user');
        /*The update function uses the same validation as create in order to update the advertisement
        on the database */
        if ($car->user_id != Auth::id()) {
            echo '<script type="text/javascript">
                window.onload = function () { alert("You cannot edit this ad as you are not the creator"); } 
            </script>';
            return view('user.cars.show')->with('car', $car);
        }
        $request->validate([
            'image' => 'file|image',
            'Make' => 'required',
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
            'Make' => $request->Make,
            'Model' => $request->Model,
            'colour' => $request->Colour,
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
        return to_route('user.cars.show', $car);
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
        $user->authorizeRoles('user');
        /*The destory function takes the car variable, checks the user is rthe owner and either 
        warns the user that they're not the creator via a javascript alert or deletes the advertisement
        if validation is passed */
        if ($car->user_id != Auth::id()) {
            echo '<script type="text/javascript">
                window.onload = function () { alert("You cannot delete this ad as you are not the creator"); } 
            </script>';
            return view('user.cars.show')->with('car', $car);
        }
        $car->delete();
        return to_route('user.cars.index');
    }
}
