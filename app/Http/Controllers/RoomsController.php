<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Intervention\Image\Facades\Image;


use Illuminate\Support\Facades\DB;
class RoomsController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 1){
            $room = DB::table('rooms')->get();
            foreach ($room as $rooms){
                $hotel = DB::table('hotels')->where('id',$rooms->hotel_id)->value('name');
                $rooms->hotel_name = $hotel;
                }
            return view('rooms.index', ['room' => $room]);
        }
        else if (auth()->user()->role == 2){

            $hotel = DB::table('hotels')->where('admin_id',auth()->user()->id)->value('id');
            $room = DB::table('rooms')->where('hotel_id',$hotel)->get();


            foreach ($room as $rooms){
                $hotel = DB::table('hotels')->where('id',$rooms->hotel_id)->value('name');
                $rooms->hotel_name = $hotel;
                }
            return view('rooms.index', ['room' => $room]);
        }
       
    }


    public function add()
    {
        return view('rooms.add');
    }

    public function insert(Request $req)
    {
        $RoomImg =  $req->file('image');
   
   

    if(auth()->user()->role == 2){

        $Room = new Room;
        $Room->room_name = $req->name;
        $Room->hotel_id = auth()->user()->hotel_id;
        $Room->nb_adulte = $req->adulte;
        $Room->nb_children = $req->children ;
        $Room->type = $req->type;
        $Room->descreption = $req->desc;
        $Room->price = $req->price;
        $Room->nb_disponible = $req->price;

             // fonction parameter
       
       $input['image'] = $req->input('image').'.'.time().'.'.$RoomImg->extension();
       $destinationPath = 'images';


        $img = Image::make($RoomImg->path());
        $img->resize(100, 100, function ($constraint) {
             $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['image']);

       
        $Room->image = $img->basename ; 


        $Room->save();


        
        return back()->withStatus(__('Room added successfully.'));
    }else{
        abort(403);
    }




       
     
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


    public function update(Request  $req )
    {
        if($req->image){
            $roomImg =  $req->file('image');
            $input['image'] = $req->input('image').'.'.time().'.'.$roomImg->extension();
            $destinationPath = 'images';
     
     
             $img = Image::make($roomImg->path());
             $img->resize(100, 100, function ($constraint) {
                  $constraint->aspectRatio();
             })->save($destinationPath.'/'.$input['image']);
            $room = DB::table('rooms')->where('id',$req->id)->update(['room_name' => $req->name , 'nb_adulte'=> $req->adulte , 'nb_children'=> $req->children  , 'type' => $req->type,  'descreption'=> $req->desc, 'price' => $req->price, 'image'=> $img->basename ]);
        }else{
            $room = DB::table('rooms')->where('id',$req->id)->update(['room_name' => $req->name , 'nb_adulte'=> $req->adulte , 'nb_children'=> $req->children  , 'type' => $req->type,  'descreption'=> $req->desc, 'price' => $req->price ]);

        }
     
            return back()->withStatus(__('Updated  !'));;


   
    }




}
