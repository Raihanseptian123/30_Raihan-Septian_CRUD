<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class testkoneksiController extends Controller
{
public function index(){
    try {
        
        DB::select('SELECT 1');
        $result = "berhasil";
    } catch (\Exception $e) {
        $result = "gagal";
    }
    return view('koneksi', ['result' => $result]);
}
}
