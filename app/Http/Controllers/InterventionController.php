<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InterventionController extends Controller
{
    public function index(){
        $list = DB::table('extra_demande')->where('hotel_id', auth()->user()->hotel_id)->get();
        foreach($list as $lists){

            $user_name = DB::table('clients')->where('id',$lists->user_id)->value('username');
            $lists->user_name = $user_name ;
        }
  
        return view('intervention.index', ['inter' => $list]);
    }

    public function done(string $id)
    {

       
        $spa =  DB::table('extra_demande')->where('id', '=', $id)->update(["status"  => 1]);


        return back();
       
    }

}
