<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{
    public function index()
    {
        $admin = DB::table('users')->where('role',2)->get();
        foreach ($admin as $admins){
        $hotel = DB::table('hotels')->where('id',$admins->hotel_id)->value('name');
        $admins->hotel_name = $hotel;

        }
        return view('admin.index', ['admin' => $admin]);
    }

  
    public function update($id)
    {
        $admin = DB::table('users')->where('role','2')->where('id',$id)->get()->toArray();
        $hotel = DB::table('hotels')->get();
        return view('admin.edit' , ['admin' => $admin , 'hotel'=> $hotel]);
    }

    public function edit($id , request $req)
    {
        $admin = DB::table('users')->where('role','2')->where('id',$id)
        ->update(['name' => $req->name , 'email' => $req->email , 'hotel_id' => $req->hotel]);
        
        
        $admins = DB::table('users')->where('role','2')->get();
        

        return redirect('admin');
    }


    public function add()
    {
        $hotel = DB::table('hotels')->get();
        return view('admin.add' , ['hotel' => $hotel]);
    }


    public function insert(Request $req)
    {
        $admin = new User;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = Hash::make($req->password);
        $admin->role = 2;
        $admin->hotel_id = $req->hotel;

        $admin->save();

        return back()->withStatus(__('Admin added successfully.'));
    }


    public function deleteAdmin(string $id)
    {

        $status = "inactive";
        $Admin = User::where('id', '=', $id)->delete();


        return back();
     
    }
    public function restoreAdmin(string $id)
    {

        $status = "active";
        $Admin = User::where('id', '=', $id)->restore();


        return back();
       
    }


}
