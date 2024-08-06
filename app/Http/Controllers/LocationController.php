<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\kecamatan;
use App\Models\lapangan;
use GuzzleHttp\Psr7\Response;
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
        return view('home.Listkecamatan', compact('data','kecamatan','id'));
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

public function findkecamatan(Request $request) {
    
    $lapangan = lapangan::where('id_kecamatan', $request->input('id_kecamatan'))->get();
    $lat_users = $request->input('latitude'); 
    $lon_users = $request->input('longitude'); 
    $distances = [];

    foreach ($lapangan as $item) {
        $lat_bengkel = $item->latitude; 
        $lon_bengkel = $item->longitude;
        $distance = $this->haversine($lat_bengkel, $lon_bengkel, $lat_users, $lon_users);

        $distances[] = [
        'name' => $item->name,
        'distance' => $distance,
        ];
    }
    $distances = collect($distances);
    return response()->json(array('data' => $distances), 200);
}


public function findlokasi(Request $request) {
    // Ambil parameter lat dan lng dari request
    $lat = $request->input('lat'); 
    $lng = $request->input('lng'); 
    
    // Ambil data lapangan dan kecamatan
    $lapang = lapangan::all();
    $kecamatan = kecamatan::all();
    $distances = [];

    // Hitung jarak dari setiap lapangan ke lokasi yang diberikan
    foreach ($lapang as $item) {
        $image = image::where('id_lapangan', $item->id)->first();
        $kecamatan1 = kecamatan::where('id', $item->id_kecamatan)->first();
        $lat_bengkel = $item->latitude; 
        $lon_bengkel = $item->longitude;
        $distance = $this->haversine($lat_bengkel, $lon_bengkel, $lat, $lng);
    
        if ($image) {
            $distances[] = [
                'id' => $item->id,
                'name' => $item->name,
                'desc' => $item->desc,
                'distance' => $distance,
                'kecamatan'=> $kecamatan1->name,
                'image' => $image->image,
                'harga' => $item->harga,
            ];
        } else {
            $distances[] = [
                'id' => $item->id,
                'name' => $item->name,
                'desc' => $item->desc,
                'distance' => $distance,
                'kecamatan'=> $kecamatan1->name,
                'image' => "Default.jpg",
                'harga' => $item->harga,
            ];
        }
    }

    // Urutkan hasil berdasarkan jarak
    $distances = collect($distances)->sortBy('distance')->values()->all();
    
    // Kirim data ke view
    return view('home.listlokasi', compact('distances', 'kecamatan'));
    // $distance = $this->haversine(-8.644123, 116.21123122, $lat, $lng);
    // return $distance;
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



    public function showhaversine(Request $request)
    {
        // Ambil data dari request
        $lat_bengkel = $request->input('destinationLat'); // Latitude tujuan
        $lon_bengkel = $request->input('destinationLng'); // Longitude tujuan
        $lat_users = $request->input('currentLat'); // Latitude pengguna
        $lon_users = $request->input('currentLng'); // Longitude pengguna
    
        // Jari-jari bumi dalam kilometer
        $R = 6371;
    
        // Konversi derajat ke radian
        $lat1 = deg2rad($lat_bengkel);
        $lon1 = deg2rad($lon_bengkel);
        $lat2 = deg2rad($lat_users);
        $lon2 = deg2rad($lon_users);
    
        // Hitung selisih
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;
    
        // Rumus Haversine
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos($lat1) * cos($lat2) *
             sin($dLon / 2) * sin($dLon / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        // Hitung jarak
        $distance = round($R * $c, 2);
    
        // Formulas
        $formula1 = "Delta Latitude: " . round(deg2rad($lat_users), 6) . " - " . round(deg2rad($lat_bengkel), 6) . " = " . round($dLat, 6);
        $formula2 = "Delta Longitude: " . round(deg2rad($lon_users), 6) . " - " . round(deg2rad($lon_bengkel), 6) . " = " . round($dLon, 6);
        $formula3 = "a = sin($dLat / 2)^2 + cos($lat1) * cos($lat2) * sin($dLon / 2)^2 = " . round($a, 6);
        $formula4 = "c = 2 * atan2(sqrt($a), sqrt(1 - $a)) = " . round($c, 6);
        $formula5 = "distance = $R * $c = " . $distance;
    
        // Kembalikan jarak dalam format JSON
        return response()->json([
            'distance' => $distance,
            'formula1' => $formula1,
            'formula2' => $formula2,
            'formula3' => $formula3,
            'formula4' => $formula4,
            'formula5' => $formula5
        ]);
    }
}
