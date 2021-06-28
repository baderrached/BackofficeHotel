<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

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
       

        $Room = new Room;
        $Room->room_name = $req->name;
        $Room->hotel_id = $req->hotel;
        $Room->nb_adulte = $req->adulte;
        $Room->nb_children = $req->children ;
        $Room->type = $req->type;
        $Room->descreption = $req->desc;
        $Room->price = $req->price;
        $Room->nb_disponible = $req->price;
        $Room->image = $req->image;


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






}
