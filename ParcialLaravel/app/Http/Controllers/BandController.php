<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Band;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Bands::all();
        return $bands;
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
        $bands = new Bands();
        $bands -> country = $request -> country;
        $bands -> name = $request -> name;
        $bands -> genre_id = $request -> genre_id;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bands = Bands::find($id);
        return $bands;

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
        $bands = Bands::find($id);
        $bands -> country = $request -> country;
        $bands -> name = $request -> name;
        $bands -> genre_id = $request -> genre_id;
        $bands -> save();
        return $bands;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bands = Bands::find($id);
        $bands -> destroy;
        return("El elemento ha sido eliminado con exito");
        
    }

    public function generatePDF()
    {
        $bands = Band::all();

        $pdf = PDF::loadView('bands.pdf', compact('bands'));

        return $pdf->download('bands.pdf');
    }
}
