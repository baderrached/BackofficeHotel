<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Extra;
use App\Models\User;
use Intervention\Image\Facades\Image ;
class ExtraController extends Controller
{
    public function index()
    {
        $extra = DB::table('extra_list')->where('hotel_id' , auth()->user()->hotel_id)->get();
        return view('Extra.index', ['extra' => $extra]);
    }

    public function add()
    {
        return view('Extra.add');
    }


    public function list()
    {
        $extra = DB::table('orders')->where('hotel_id' , auth()->user()->hotel_id)->get();

        foreach ($extra as $extras){
            $user = DB::table('clients')->where('id' , $extras->user_id)->value('username');
            $extras->user_name = $user;
        }
        return view('Extra.list', ['extra' => $extra]);
    }

    public function insert(request $req){

        $ExtraImg =  $req->file('image');

        $Extra = new Extra;
        $Extra->name = $req->name;
        $Extra->hotel_id = auth()->user()->hotel_id;
        $Extra->category = $req->category;
        $Extra->descreption = $req->desc;
        $Extra->price = $req->price;
       
        
           
       $input['image'] = $req->input('image').'.'.time().'.'.$ExtraImg->extension();
       $destinationPath = 'images';


        $img = Image::make($ExtraImg->path());
        $img->resize(100, 100, function ($constraint) {
             $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['image']);

       

        $Extra->image = $img->basename;
        $Extra->save();
        return back()->withStatus(__('Extra added successfully.'));

    }

    public function done(string $id)
    {

       
        $extra = DB::table('orders')->where('id', '=', $id)->update(['status' => "Done"]);;


        return back();
     
    }

}
