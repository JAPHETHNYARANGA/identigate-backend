<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class items extends Controller
{
    //

    public function items(){
        return response([
            'success'=>true,
            'message' =>'All items returned'
        ],200);
    }
}
