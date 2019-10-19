<?php

namespace App\Http\Controllers;

use App\Quyen;
use Illuminate\Http\Request;

class QuyenController extends Controller
{
    public function index () {
        $ds_quyen = Quyen::all();
        return response()->json($ds_quyen);
    }
    public function store(Request $request){
        $quyen = new Quyen();
        $quyen->q_ten = $request->q_ten;
        $quyen->save();
    }

    public function edit($id){
        $quyen  = Quyen::where('q_id',$id)->first();
        return response()->json($quyen);
    }

    public function update(Request $request,$id){
        $quyen  = Quyen::findOrfail($id);

        if($quyen)
        {
            $quyen->q_ten = $request->q_ten;
            $quyen->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $quyen = Quyen::findOrfail($id);
        $quyen->delete();
    }
}
