<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExtraController extends Controller
{
    public function index()
    {
        $extra = DB::table('extra')->get();
        return view('Extra.index', ['extra' => $extra]);
    }

    public function add()
    {
        return view('Extra.add');
    }


    public function list()
    {
        return view('Extra.list');
    }

}
