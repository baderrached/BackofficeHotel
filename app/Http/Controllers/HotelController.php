<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use Intervention\Image\Facades\Image;
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
       
      

        $Hotel = new Hotel;
        $Hotel->name = $req->name;
        $Hotel->room = "";
        $Hotel->location = $req->location ;

        $input['image'] = $req->input('image').'.'.time().'.'.$HotelImg->extension();
        $destinationPath = 'images';
 
 
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

    public function getedit(string $id)
    {
        $hotel = DB::table('hotels')->where('id',$id)->get();
       
        return view('Hotel.edit', ['hotel' => $hotel]);
    }

    public function edit(Request $req , $id)
    {

        
        $HotelImg =  $req->file('image');
        // fonction parameter

       if($HotelImg  == null){
        $Hotel = DB::table('hotels')->where('id',$id)->update(['name' => $req->name , "location" => $req->location]);
        return back()->withStatus(__('Hoted updated successfully.'));
     
       }

       if( $HotelImg  != null){

        $input['image'] = $req->input('image').'.'.time().'.'.$HotelImg->extension();
        $destinationPath = 'images';
 
 
         $img = Image::make($HotelImg->path());
         $img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
         })->save($destinationPath.'/'.$input['image']);
 

        $Hotel = DB::table('hotels')->where('id',$id)->update(['name' => $req->name , "location" => $req->location , "image" =>  $img->basename]);
        
        return back()->withStatus(__('Hoted updated successfully.'));
     
       }
      


      
         return back()->withStatus(__('Hoted updated successfully.'));
    }

  






}
