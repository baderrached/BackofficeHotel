<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\Hotel;
use Image ;
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
        $HotelImg =  $req->file('image');
        // fonction parameter
       
       $input['image'] = $req->input('image').'.'.time().'.'.$HotelImg->extension();
       $destinationPath = 'images';

        $Hotel = new Hotel;
        $Hotel->name = $req->name;
        $Hotel->room = "";
        $Hotel->location = $req->location ;


        $img = Image::make($HotelImg->path());
        $img->resize(100, 100, function ($constraint) {
             $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['image']);


        $Hotel->image = $img->basename;
        $Hotel->status = "active";
        $Hotel->save();
       
         return back()->withStatus(__('Hoted added successfully.'));
    }

    public function deleteHotel(string $id)
    {

        $status = "inactive";
        $hotel = Hotel::where('id', '=', $id)->update(['status' => $status]);;


        return back();
     
    }
    public function restoreHotel(string $id)
    {

        $status = "active";
        $Hotel = Hotel::where('id', '=', $id)->update(['status' => $status]);;


        return back();
       
    }





}
