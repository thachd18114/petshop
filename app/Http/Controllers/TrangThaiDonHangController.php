<?php

namespace App\Http\Controllers;

use App\TrangThaiDonHang;
use Illuminate\Http\Request;

class TrangThaiDonHangController extends Controller
{
    public function index () {
        $ds_ttdh = TrangThaiDonHang::all();
        return response()->json($ds_ttdh);
    }

    public function store(Request $request){
        $ttdonhang = new TrangThaiDonHang();
        $ttdonhang->ttdh_ten = $request->ttdh_ten;
        $ttdonhang->save();
    }

    public function edit($id){
        $ttdonhang  = TrangThaiDonHang::where('ttdh_id',$id)->first();
        return response()->json($ttdonhang);
    }

    public function update(Request $request,$id){
        $ttdonhang  = TrangThaiDonHang::findOrfail($id);

        if($ttdonhang)
        {
            $ttdonhang->ttdh_ten = $request->ttdh_ten;
            $ttdonhang->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id)
    {
        if (\Session::get('quyen') ==1) {
            $ttdonhang = TrangThaiDonHang::findOrfail($id);
            $ttdonhang->delete();
        }
        else {
            return response(["error" => 'Bạn không có quyền xóa']);
        }
    }
}
