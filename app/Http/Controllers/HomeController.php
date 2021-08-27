<?php

namespace App\Http\Controllers;

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
        // $this->middleware('auth');
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
    public function json()
    {
        return view('cap-json');
    }

    public function revisorDashboard()
    {
        return view('users.revisorDashboard');
    }
    public function adminDashboard()
    {
        return view('users.adminDashboard');
    }

    public function statusAdmin(User $user){
       
        $user->is_admin  = !$user->is_admin;
        $user->save();
        return redirect()->back(); 
    }
     
    public function statusRevisor(User $user){
        $user->is_revisor  = !$user->is_revisor;
        $user->save();
        return redirect()->back();   
        
    }
    public function condizioni()
    {
        return view('condizioni-di-vendita');
    }
    public function back()
    {
        return redirect()->back();  
    }



}
