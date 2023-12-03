<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


use App\Citizens;
use App\Tasks;

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
       // return view('dashboard');
       $citizens = Citizens::orderby('created_at','DESC')->paginate(4);
       $citizensDelete = DB::table('citizens')->where('deleted_at','!=', null)->orderby('created_at','DESC')->get();
       $tasks = Tasks::orderby('created_at','DESC')->get();
       $citizensTotal= Citizens::all();
       return view('dashboard',compact('citizens','citizensTotal','tasks','citizensDelete'));
    }
}
