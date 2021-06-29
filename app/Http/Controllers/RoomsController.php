<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Image;


use Illuminate\Support\Facades\DB;
class RoomsController extends Controller
{
    public function index()
    {
        $room = DB::table('rooms')->get();
        return view('rooms.index', ['room' => $room]);
    }


    public function add()
    {
        return view('rooms.add');
    }

    public function insert(Request $req)
    {
        $RoomImg =  $req->file('image');
        // fonction parameter
       
       $input['image'] = $req->input('image').'.'.time().'.'.$RoomImg->extension();
       $destinationPath = 'images';

        $Room = new Room;
        $Room->room_name = $req->name;
        $Room->hotel_id = $req->hotel;
        $Room->nb_adulte = $req->adulte;
        $Room->nb_children = $req->children ;
        $Room->type = $req->type;
        $Room->descreption = $req->desc;
        $Room->price = $req->price;
        $Room->nb_disponible = $req->price;


        $img = Image::make($RoomImg->path());
        $img->resize(100, 100, function ($constraint) {
             $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['image']);


       
        $Room->image = $img->basename ; 


        $Room->save();
       
         return back()->withStatus(__('Room added successfully.'));
    }

    public function deleteRoom(string $id)
    {

        $status = "inactive";
        $room = Room::where('id', '=', $id)->update(['activated' => $status]);;


        return back();
     
    }
    public function restoreRoom(string $id)
    {

        $status = "active";
        $room = Room::where('id', '=', $id)->update(['activated' => $status]);;


        return back();
       
    }

    public function getedit(string $id)
    {
        $room = DB::table('rooms')->where('id',$id)->get();
       
        return view('rooms.edit', ['room' => $room]);
    }


    public function update(Request  $request )
    {
        dd($request->all());
        Room::where('id',$request->id)->update($request->all());
     
            return back()->withStatus(__('Updated  !'));;


   
    }




}
