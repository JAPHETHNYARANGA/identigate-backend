<?php

namespace App\Http\Controllers;

use App\Models\items as ModelsItems;
use Illuminate\Http\Request;

class items extends Controller
{
    //

    public function postItems(Request $request){

        // 'id', 'userId', 'name', 'description'
        try{
            $items = new ModelsItems();

        $items ->name = $request->name;
        $items ->description = $request->description;

        $res = $items->save();

        if($res){
            return response([
                'success' =>true,
                'message' => 'item added successfully'
            ], 200);
        }else{
            return response(
                [
                    'success' =>false,
                    'message' =>'item add failed'
                ],201
            );
        }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        

    }

    public function getItems(){
        return response([
            'success'=>true,
            'message' =>'All items returned'
        ],200);
    }
}
