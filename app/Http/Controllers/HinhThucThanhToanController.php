<?php

namespace App\Http\Controllers;

use App\HinhThucThanhToan;
use Illuminate\Http\Request;

class HinhThucThanhToanController extends Controller
{
    public function index () {
        $ds_httt = HinhThucThanhToan::all();
        return response()->json($ds_httt);
    }
    public function store(Request $request){
        $ds_httt = new HinhThucThanhToan();
        $ds_httt->httt_ten = $request->httt_ten;
        $ds_httt->save();
    }

    public function edit($id){
        $ds_httt  = HinhThucThanhToan::where('httt_id',$id)->first();
        return response()->json($ds_httt);
    }

    public function update(Request $request,$id){
        $ds_httt  = HinhThucThanhToan::findOrfail($id);

        if($ds_httt)
        {
            $ds_httt->httt_ten = $request->httt_ten;
            $ds_httt->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $ds_httt = HinhThucThanhToan::findOrfail($id);
        $ds_httt->delete();
    }
}
