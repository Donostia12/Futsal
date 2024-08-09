<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = review::all();
        return view('admin.Review',compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new review();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->rate = $request->input('rate');
        $data->desc = $request->input('desc');
        $data->id_lapangan = $request->input('id_lap');
        $data->save();
        return redirect()->back()->with('success', 'Review success di buat');
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
        $data = review::find($id);
        $data->delete();
        return redirect()->Route('review.index')->with('success', 'Review success di hapus');
    }
}
