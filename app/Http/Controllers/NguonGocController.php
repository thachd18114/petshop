<?php

namespace App\Http\Controllers;

use App\NguonGoc;
use Illuminate\Http\Request;

class NguonGocController extends Controller
{
    public function index () {
        $ds_nguongoc = NguonGoc::all();
        return response()->json($ds_nguongoc);
    }
    public function store(Request $request){
        $nguongoc = new NguonGoc();
        $nguongoc->ng_ten = $request->ng_ten;
        $nguongoc->save();
    }

    public function edit($id){
        $nguongoc  = NguonGoc::where('ng_id',$id)->first();
        return response()->json($nguongoc);
    }

    public function update(Request $request,$id){
        $nguongoc  = NguonGoc::findOrfail($id);

        if($nguongoc)
        {
            $nguongoc->ng_ten = $request->ng_ten;
            $nguongoc->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $nguongoc = NguonGoc::findOrfail($id);
        $nguongoc->delete();
    }

}
