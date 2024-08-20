<?php

namespace App\Http\Controllers;

use App\Models\lapangan;
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
        $lapangan = lapangan::all();
        $data = [];
        foreach ($review as $rev) {
            $data[] = [
                'id' => $rev->id,
                'name' => $rev->name,
                'lapangan'=> lapangan::where('id', $rev->id_lapangan)->first()->name,
                'rate' => $rev->rate,
                'email'=> $rev->email,
                'desc'=> $rev->desc,
            ];
        }
        return view('admin.Review',compact('data'));
    }

   
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
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
    public function review_store(Request $request)
    {
        $data = new review();
        $data->name = $request->input('name');
        $data->rate = $request->input('rate');
        $data->desc = $request->input('desc');
        $data->id_lapangan = $request->input('id_lap');
        $data->save();

        $review_avg = review::where('id_lapangan',$request->input('id_lap'))->avg('rate');


        lapangan::where('id',$request->input('id_lap'))->update([
            'rated' => $review_avg,
        ]);
        return redirect()->back()->with('success', 'Review success di buat');
    }
}
