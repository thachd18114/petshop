<?php

namespace App\Http\Controllers;

use App\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index () {
        $ds_donhang = DonHang::all();
        return response()->json($ds_donhang);
    }
    public function store(Request $request){
        $ds_donhang = new DonHang();
        $ds_donhang->dh_ten = $request->dh_ten;
        $ds_donhang->save();
    }

    public function edit($id){
        $ds_donhang  = DonHang::where('dh_id',$id)->first();
        return response()->json($ds_donhang);
    }

    public function update(Request $request,$id){
        $donhang  = DonHang::findOrfail($id);

        if($donhang)
        {
            $donhang->dh_ten = $request->dh_ten;
            $donhang->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $donhang = DonHang::findOrfail($id);
        $donhang->delete();
    }
}
