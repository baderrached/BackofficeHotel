<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {

        if(auth()->user()->role == 1){
            $room = DB::table('rooms')->count();
            $res = DB::table('reservations')->count();
            $extra = DB::table('extra_list')->count();
            $check_in = DB::table('reservations')->where('status',1)->count();

           
        }
        else if (auth()->user()->role == 2){

            $hotel = DB::table('hotels')->where('admin_id',auth()->user()->id)->value('id');
            $room = DB::table('rooms')->where('hotel_id',$hotel)->count();
            $res = DB::table('reservations')->where('room_id',$room)->count();
            $check_in = DB::table('reservations')->where('room_id',$room)->where('status',1)->count();
            $extra = DB::table('extra_list')->where('hotel_id' , auth()->user()->hotel_id)->count();

        }




        return view('dashboard' , ["room" => $room , "res" => $res , "extra" => $extra , "check_in" => $check_in]);
    }
}
