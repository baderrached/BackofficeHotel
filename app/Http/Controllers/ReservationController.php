<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReservationController extends Controller
{
    public function index()
    {
        $hotel = DB::table('hotels')->where('admin_id',auth()->user()->id)->value('id');
        $room =  DB::table('rooms')->where('id',$hotel)->value('id');
        $res = DB::table('reservations')->where('room_id',$room)->get();

        return view('reservation.index', ['res' => $res]);
        
    }


    public function edit(Request $req)
    {
       $id= $req->id;
       $status = $req->status;
    //    dd($status);
       if($status == 0){
        $res = DB::table('reservations')
        ->where('id',$id)
        ->update(['status' =>"1"]);
         return back();
       }
   
       
        if($status == 1){
       $res = DB::table('reservations')
       ->where('id',$id)
       ->update(['status' =>"0"]);
        return back();
    }

        
    }
}
