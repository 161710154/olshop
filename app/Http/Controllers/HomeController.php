<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use App\Custom;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
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
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        if (Laratrust::hasRole('member')) return $this->memberDashboard();
        if (Laratrust::hasRole('membercustom')) return $this->membercustomDashboard();
    }
    protected function adminDashboard()
    {
        $countNotif=Custom::where('status',0)->get()->count();
        return view('admin.index',compact('countNotif'));
    }

    protected function memberDashboard()
    {
        return view('frontend.index');
    }


    public function mail($id)
    {
       $cart = \App\Cart::where('user_id', $id)->get();
       $custom = \App\Custom::where('user_id', $id)->get();
       $user = \App\User::where('id', $id)->first();
       Mail::to($user->email)->send(new SendMailable($cart,$custom));
       
       return redirect('/');
    }


    // protected function membercustomDashboard()
    // {
    //     return view('frontend.customorder');
    // }
}
