<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引入DB
use DB;

class ViewController extends Controller
{
    public function test1()
    {
        return view('admin.test.test1');
    }
}