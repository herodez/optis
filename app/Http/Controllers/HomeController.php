<?php

namespace App\Http\Controllers;

use App\Package;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function profile()
    {
       return view('profile');
    }
    
    public function settings()
    {
        return view('settings');
    }
    
    public function myPackages()
    {
        return view('my-packages');
    }
    
    public function submit()
    {
        return view('submit');
    }
    
    public function uploadPackage(Request $request)
    {
        $package = new Package();
        $package->url = $request->get('url');
        $package->save();
        
        return redirect('submit');
    }
}
