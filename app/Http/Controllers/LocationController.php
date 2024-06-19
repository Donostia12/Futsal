<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\kecamatan;
use App\Models\lapangan;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $kecamatan = kecamatan::all();
        return view('home.findlocation',compact('kecamatan'));
    }
   public function kecamatan($id)
    {
        $kecamatan1 = kecamatan::where('id', $id)->first();
        $kecamatan = kecamatan::all();
        $lapangan = lapangan::where('id_kecamatan', $id)->get();
        $data[] = [];
        foreach ($lapangan as $lap) {
            $image = image::where('id_lapangan', $lap->id)->first();
            if ($image) {
                $data[] = [
                    'id' => $lap->id,
                    'kecamatan' => $kecamatan1->name, 
                    'name' => $lap->name,
                    'desc' => $lap->desc,
                    'image' => $image->image,
                    'harga' => $lap->harga,
                ];
            } else {
                $data[] = [
                    'id' => $lap->id,
                    'kecamatan' => $kecamatan1->name,
                    'name' => $lap->name,
                    'desc' => $lap->desc,
                    'image' => "Default.jpg",
                    'harga' => $lap->harga,
                ];
            }
        }
        return view('home.Listkecamatan', compact('data','kecamatan'));
    }

    
public function findlapangan(Request $request) {
    $lapang = lapangan::all();
    $lat_users = $request->input('latitude'); 
    $lon_users = $request->input('longitude'); 
    $distances = [];

    foreach ($lapang as $item) {
        $image = image::where('id_lapangan', $item->id)->first();
        $kecamatan = kecamatan::where('id', $item->id_kecamatan)->first();
        $lat_bengkel = $item->latitude; 
        $lon_bengkel = $item->longitude;
        $distance = $this->haversine($lat_bengkel, $lon_bengkel, $lat_users, $lon_users);
    
        if ($image) {
            $distances[] = [
                'id' => $item->id,
                'name' => $item->name,
                'desc' => $item->desc,
                'distance' => $distance,
                'kecamatan'=> $kecamatan->name,
                'image' => $image->image,
                'harga' => $item->harga,
            ];
        } else {
            $distances[] = [
                'id' => $item->id,
                'name' => $item->name,
                'desc' => $item->desc,
                'distance' => $distance,
                'kecamatan'=> $kecamatan->name,
                'image' => "Default.jpg",
                'harga' => $item->harga,
            ];
        }
    }

    $distances = collect($distances)->sortBy('distance')->values()->all();
    return response()->json(array('data' => $distances), 200);
}


public function haversine($lat_bengkel, $lon_bengkel, $lat_users, $lon_users)
   
{
        $R = 6371;
        $lat1 = deg2rad($lat_bengkel);
        $lon1 = deg2rad($lon_bengkel);
        $lat2 = deg2rad($lat_users);
        $lon2 = deg2rad($lon_users);
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = round($R * $c,2);
        return $distance;
    }
}
