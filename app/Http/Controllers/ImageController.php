<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    if ($request->hasFile('name')) {
        $image = $request->file('name');
        $imageName =time().'.'.$image->getClientOriginalExtension();
        if($image->move(public_path('images'), $imageName)){
            $imageModel = new Image();
            $imageModel->image = $imageName;
            $imageModel->id_lapangan = $request->input('id');
            $imageModel->save();
            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }
    } else {
        return redirect()->back()->with('error', 'No image selected.');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = image::where('id_lapangan', $id)->get();
        $id = $id;
        return view('admin.lapangan-image', compact('data','id'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
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
    $imageModel = Image::find($id);
    if ($imageModel) {
        // Delete image from storage
        $imagePath = public_path('images/' . $imageModel->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // Delete image from database
        $imageModel->delete();
        
        return redirect()->back()->with('success', 'Image deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Image not found.');
    }
}

}
