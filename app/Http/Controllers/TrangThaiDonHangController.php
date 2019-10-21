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
}
