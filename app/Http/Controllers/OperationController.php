<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $operation = new Operation(); 
        $operation->id_lapangan = $request->input('id_lapangan');
                $operation->senin_buka = $request->input('senin_buka');
                $operation->senin_tutup = $request->input('senin_tutup');
                $operation->selasa_buka = $request->input('selasa_buka');
                $operation->selasa_tutup = $request->input('selasa_tutup');
                $operation->rabu_buka = $request->input('rabu_buka');
                $operation->rabu_tutup = $request->input('rabu_tutup');
                $operation->kamis_buka = $request->input('kamis_buka');
                $operation->kamis_tutup = $request->input('kamis_tutup');
                $operation->jumat_buka = $request->input('jumat_buka');
                $operation->jumat_tutup = $request->input('jumat_tutup');
                $operation->sabtu_buka = $request->input('sabtu_buka');
                $operation->sabtu_tutup = $request->input('sabtu_tutup');
                $operation->minggu_buka = $request->input('minggu_buka');
                $operation->minggu_tutup = $request->input('minggu_tutup');
                $operation->save();

        return redirect()->route('lapangan.index')->with('success', 'Operational success di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Operation::where('id_lapangan', $id)->first();
        if (!$data) {
            $id = $id;
            return view('admin.operation-create',compact('id'));
        }
        $id = $id;
        return view('admin.operation', compact('data','id'));
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
        $operation = new Operation(); 
        $operation = Operation::where('id_lapangan', $id)->first();
        $operation->senin_buka = $request->input('senin_buka');
        $operation->senin_tutup = $request->input('senin_tutup');
        $operation->selasa_buka = $request->input('selasa_buka');
        $operation->selasa_tutup = $request->input('selasa_tutup');
        $operation->rabu_buka = $request->input('rabu_buka');
        $operation->rabu_tutup = $request->input('rabu_tutup');
        $operation->kamis_buka = $request->input('kamis_buka');
        $operation->kamis_tutup = $request->input('kamis_tutup');
        $operation->jumat_buka = $request->input('jumat_buka');
        $operation->jumat_tutup = $request->input('jumat_tutup');
        $operation->sabtu_buka = $request->input('sabtu_buka');
        $operation->sabtu_tutup = $request->input('sabtu_tutup');
        $operation->minggu_buka = $request->input('minggu_buka');
        $operation->minggu_tutup = $request->input('minggu_tutup');
        $operation->update();

        return redirect()->route('lapangan.index')->with('success', 'Operational success di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
