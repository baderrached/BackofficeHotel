<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $user = DB::table('clients')->get();
        return view('clients.index', ['client' => $user]);
    }

}
