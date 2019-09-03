<?php

namespace App\Http\Controllers;

use App\Giong;
use Illuminate\Http\Request;

class GiongController extends Controller
{
    public function index () {
        $ds_giong = Giong::join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->select('giong.g_id', 'giong.g_ten', 'loaithucung.ltc_ten')->get();
        return response()->json($ds_giong);
    }
    public function store(Request $request){
        $giong = new Giong();
        $giong->g_ten = $request->g_ten;
        $giong->ltc_id = $request->ltc_id;
        $giong->save();
    }

    public function edit($id){
        $giong  = Giong::where('g_id',$id)->first();
        return response()->json($giong);
    }

    public function update(Request $request,$id){
        $giong  = Giong::findOrfail($id);

        if($giong)
        {
            $giong->g_ten = $request->g_ten;
            $giong->ltc_id = $request->ltc_id;
            $giong->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $giong = Giong::findOrfail($id);
        $giong->delete();
    }
}
