<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\Hotel;
class HotelController extends Controller
{
    public function index()
    {
        $hotel = DB::table('hotels')->get();
        return view('Hotel.index', ['hotel' => $hotel]);
    }

    public function add()
    {
        return view('Hotel.add');
    }

    public function insert(Request $req)
    {
       

        $Hotel = new Hotel;
        $Hotel->name = $req->name;
        $Hotel->room = "";
        $Hotel->location = $req->location ;
        $Hotel->image = $req->image;
        $Hotel->save();
       
         return back()->withStatus(__('Hoted added successfully.'));
    }
}
