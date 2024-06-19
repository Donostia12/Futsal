<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\lapangan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $kecamatan = kecamatan::all();
    return view('admin.kecamatan', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kecamatan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kecamatan = new kecamatan();
        $kecamatan->name = $request->input('name');
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan success di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lapangan =lapangan::where('id_kecamatan', $id)->first();
        if ($lapangan) {
            return redirect()->route('kecamatan.index')->with('error', 'Pastikan Tidak Ada Lapangan futsal di Kecamatan ini');
        }

        $kecamatan = kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan successfully deleted');
    }
}
