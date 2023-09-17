<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Genre::all();
        return $albums;
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
        $albums = new Albums();
        $albums -> name = $request-> name;
        $albums -> place = $request-> place;
        $albums -> sold_units = $request-> sold_units;
        $albums -> units = $request-> units;
        $albums -> band_id = $request-> band_id;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $albums = Albums::find($id);
        return $albums;

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
        $albums = Albums::find($id);
        $albums -> name = $request-> name;
        $albums -> place = $request-> place;
        $albums -> sold_units = $request-> sold_units;
        $albums -> units = $request-> units;
        $albums -> band_id = $request-> band_id;
        $albums -> save();
        return $albums;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $albums = Albums::find($id);
        $albums -> delete;
        return "El elemento ha sido eliminado";
    }
    public function generatePDF()
    {
        $albums = Album::all();

        $pdf = PDF::loadView('albums.pdf', compact('albums'));

        return $pdf->download('albums.pdf');
    }
}
