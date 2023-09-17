<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return $genres;
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
        $genres= new Genres();
        $genres -> name=$request->name;
        return $genres;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genres::find($id);
        return $genres;
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
        $genres = Genres::find($id);
        $genres -> name = $request->name;
        $genres -> save();
        return $genres;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genres::find($id);
        $genres->delete;
        return "El elemento ha sido eliminado con exito";
    }

    public function generatePDF()
    {
        $genres = Genre::all();

        $pdf = PDF::loadView('genres.pdf', compact('genres'));

        return $pdf->download('genres.pdf');
    }
}
