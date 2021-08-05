<?php

namespace App\Http\Controllers;

use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Facades\Image;

class SparestoController extends Controller
{
    public function index()
    {
        $spa = DB::table('spa_restau')->where('hotel_id', auth()->user()->hotel_id)->get();
        foreach($spa as $spas){
            $hotel = DB::table('hotels')->where('id',$spas->hotel_id)->value('name');
            $spas->hotel_name = $hotel ;

        }
  
        return view('spa.index', ['spa' => $spa]);
    }

  
    public function update($id)
    {
        $admin = DB::table('users')->where('role','2')->where('id',$id)->get()->toArray();
        $hotel = DB::table('hotels')->get();
        return view('spa.edit' , ['admin' => $admin , 'hotel'=> $hotel]);
    }

    public function edit($id , request $req)
    {
        $admin = DB::table('users')->where('role','2')->where('id',$id)
        ->update(['name' => $req->name , 'email' => $req->email , 'hotel_id' => $req->hotel]);
        
        
        $admins = DB::table('users')->where('role','2')->get();
        

        return redirect('sparesto');
    }


    public function add()
    {
        $hotel = DB::table('hotels')->get();
        return view('spa.add' , ['hotel' => $hotel]);
    }


    public function insert(Request $req)
    {

        $SpaImg =  $req->file('image');
        $Spa = new Spa;
        $Spa->name = $req->name;
        $Spa->hotel_id = auth()->user()->hotel_id;
        $input['image'] = $req->input('image').'.'.time().'.'.$SpaImg->extension();
       $destinationPath = 'images';


        $img = Image::make($SpaImg->path());
        $img->resize(100, 100, function ($constraint) {
             $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['image']);

       
        $Spa->image = $img->basename ; 

        $Spa->save();

        return back()->withStatus(__('Item added successfully.'));
    }


    public function deletespa(string $id)
    {

        $status = "inactive";
        $spa = Spa::where('id', '=', $id)->update(["status" => $status]);


        return back();
     
    }
    public function restorespa(string $id)
    {

        $status = "active";
        $spa = Spa::where('id', '=', $id)->update(["status"  => $status]);


        return back();
       
    }


}
