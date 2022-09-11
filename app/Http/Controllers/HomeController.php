<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function index()
    {
        if(Auth::user()->role == "Gerant"){

            return redirect('/rapports');

        }
        elseif(Auth::user()->role == "Administrateur"){

            return redirect('/dashboard');
        }
        else{

            return redirect('/dashboard');
        }

    }
}
