<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        // get current user
        $user = Auth::user();

        // Profile
        $data['profile'] = $user->profile;

        // Works
        $data['works'] = $user->works;

        // Schools
        $data['schools'] = $user->schools;

        // Skills
        $data['skills'] = $user->skills;

        // Awards
        $data['awards'] = $user->awards;

        // Interests
        $data['interests'] = $user->interests;

        return view('home', $data);
    }
}
