<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\kecamatan;
use App\Models\lapangan;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
public function index(){
    $lapangan = lapangan::all();
    $kecamatan = kecamatan::all();
    $image = image::all();
    return view('home.index',compact('lapangan','kecamatan','image'));
}

}
