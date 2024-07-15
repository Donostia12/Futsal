<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\kecamatan;
use App\Models\lapangan;
use App\Models\Operation;
use App\Models\review;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangan = lapangan::all();
        $kecamatan = kecamatan::all();
        $data = [];
        foreach ($lapangan as $lap) {
            $data[] = [
                'id' => $lap->id,
                'name' => $lap->name,
                'kecamatan'=> kecamatan::where('id', $lap->id_kecamatan)->first()->name,
                'harga' => $lap->harga,
                'jumlah'=> $lap->jml_lapangan,
                'telp'=> $lap->telp,
                'desc'=> $lap->desc,
            ];
        }
    return view('admin.lapangan', compact('data'));
    }

    public function list(){
        $lapangan = lapangan::all();
        $kecamatan = kecamatan::all();
        
        $data = [];
        foreach ($lapangan as $lap) {
            $image = image::where('id_lapangan', $lap->id)->first();
            if ($image == null) {
                $data[] = [             
                    'id' => $lap->id,
                    'name' => $lap->name,
                    'kecamatan'=> kecamatan::where('id', $lap->id_kecamatan)->first()->name,
                    'harga' => $lap->harga,
                    'jumlah'=> $lap->jml_lapangan,
                    'image' => 'Default.jpg',
                    'telp'=> $lap->telp,
                    'desc'=> $lap->desc,
                ];
            }else{
                $data[] = [
                    'id' => $lap->id,
                    'name' => $lap->name,
                    'kecamatan'=> kecamatan::where('id', $lap->id_kecamatan)->first()->name,
                    'harga' => $lap->harga,
                    'jumlah'=> $lap->jml_lapangan,
                    'image' => $image->image,
                    'telp'=> $lap->telp,
                    'desc'=> $lap->desc,
                ];
            }
            
        }
        return view('home.listlapangan',compact('data','kecamatan'));
    }

    public function detail($id){
        $lapangan = lapangan::where('id', $id)->first();
        $kecamatan = kecamatan::all();
        $profile = image::where('id_lapangan', $id)->first();
        $kec = kecamatan::where('id', $lapangan->id_kecamatan)->first();
        $image = image::where('id_lapangan', $id)->get();
        $jadwal = Operation::where('id_lapangan', $id)->first();
        $review = review::where('id_lapangan', $id)->get();
        return view('home.detail',compact('lapangan','kecamatan','image','kec','profile','jadwal','id' ,'review'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = kecamatan::all();
        return view('admin.lapangan-create',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lapangan = new lapangan();
        $lapangan->name = $request->input('name');
        $lapangan->id_kecamatan = $request->input('kecamatan');
        $lapangan->latitude = $request->input('latitude');
        $lapangan->longitude = $request->input('longitude');
        $lapangan->harga = $request->input('harga');
        $lapangan->desc = $request->input('desc');
        $lapangan->alamat = $request->input('alamat');
        $lapangan->telp = $request->input('telp');
        $lapangan->jml_lapangan = $request->input('jml');
        $lapangan->save();
        return redirect()->route('lapangan.index')->with('success', 'Lapangan success di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = lapangan::where('id', $id)->first();
        $kecamatan = kecamatan::all();
        $kecamatanold = kecamatan::where('id', $data->id_kecamatan)->first();
        return view('admin.lapangan-show',compact('data','kecamatan','kecamatanold'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $lapangan->name = $request->input('name');
        $lapangan->id_kecamatan = $request->input('kecamatan');
        $lapangan->latitude = $request->input('latitude');
        $lapangan->longitude = $request->input('longitude');
        $lapangan->harga = $request->input('harga');
        $lapangan->desc = $request->input('desc');
        $lapangan->alamat = $request->input('alamat');
        $lapangan->telp = $request->input('telp');
        $lapangan->jml_lapangan = $request->input('jml');
        $lapangan->save();
        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil diupdate');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = image::where('id_lapangan', $id)->first();
        if ($image) {
            return redirect()->route('lapangan.index')->with('error', 'Pastikan seluruh gambar sudah di hapus dari lapangan');
        }
        $lapangan = lapangan::findOrFail($id);
        $lapangan->delete();
        return redirect()->route('lapangan.index')->with('success', 'Lapangan successfully deleted');
    }
}
