<?php

namespace App\Http\Controllers;

use App\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    public function index () {
        $ds_nhacungcap = NhaCungCap::all();
        return response()->json($ds_nhacungcap);
    }
    public function store(Request $request){
        $nhacungcap = new NhaCungCap();
        $nhacungcap->ncc_ten = $request->ncc_ten;
        $nhacungcap->save();
    }

    public function edit($id){
        $nhacungcap  = NhaCungCap::where('ncc_id',$id)->first();
        return response()->json($nhacungcap);
    }

    public function update(Request $request,$id){
        $nhacungcap  = NhaCungCap::findOrfail($id);

        if($nhacungcap)
        {
            $nhacungcap->ncc_ten = $request->ncc_ten;
            $nhacungcap->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id)
    {
        if (\Session::get('quyen') == 1) {
            $nhacungcap = NhaCungCap::findOrfail($id);
            $nhacungcap->delete();
        }
        else {
            return response(["error" => 'Bạn không có quyền xóa']);
        }
    }
}
