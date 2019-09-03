<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiThuCung;
use DB;
class LoaiThuCungController extends Controller
{
    public function index () {
        $ds_loaithucung = LoaiThuCung::all();
       return response()->json($ds_loaithucung);
    }
    public function store(Request $request){
        $loaithucung = new LoaiThuCung();
        $loaithucung->ltc_ten = $request->ltc_ten;
        $loaithucung->save();
    }

    public function edit($id){
        $loaithucung  = LoaiThuCung::where('ltc_id',$id)->first();
        return response()->json($loaithucung);
    }

    public function update(Request $request,$id){
        $loaithucung  = LoaiThuCung::findOrfail($id);

        if($loaithucung)
        {
            $loaithucung->ltc_ten = $request->ltc_ten;
            $loaithucung->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $loaithucung = LoaiThuCung::findOrfail($id);
        $loaithucung->delete();
    }


}
