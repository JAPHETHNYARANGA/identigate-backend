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
        $items ->userId = $request->user()->userId;

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
        try{
            $item = ModelsItems::all();

            return response([
                'success' =>true,
                'message'=>'items fetched successfully',
                'items' =>$item
            ], 200);

            

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateItem(Request $request ,$id){
        try{
            $item = ModelsItems::find($id);

            $item ->id;
            $item->name = $request->name;
            $item->description = $request ->description;
            $item ->userId = $request->user()->userId;

            $res = $item->save();

            if ($res) {
                return response([
                    'success' => true,
                    'message' => 'item updated Successfully'
                ], 200);
            } else {
                return response([
                    'success' => false,
                    'message' => 'item update Failed'
                ], 201);
            }
            

            

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function specificItem($id){
        try{
            $item = ModelsItems::where('id', $id)->get();

            return response([
                'success' =>true,
                'message' =>'specific item fetched successfully',
                'item' =>$item
            ]);

        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteItem($id){
        
        try{
            $items = ModelsItems::find($id);

        $res = $items ->delete();

        if($res){
            return response(
                [
                    'success' =>true,
                    'message' =>'item deleted successfully'
                ],200
            );
        }else {
            return response(
                [
                    'success' => false,
                    'message' => 'itemdelete failed'
                ],
                201
            );

        }
    }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }
}
