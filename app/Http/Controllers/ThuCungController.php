<?php

namespace App\Http\Controllers;

use App\ThuCung;
use Illuminate\Http\Request;

class ThuCungController extends Controller
{
    public function index () {
        $ds_thucung = ThuCung::all();
        return response()->json($ds_thucung);
    }
}
