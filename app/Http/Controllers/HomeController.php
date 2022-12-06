<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.cars.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.cars.index';
        }
        return redirect()->route($home);
    }





    public function makeIndex(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.makes.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.makes.index';
        }
        return redirect()->route($home);
    }
}
