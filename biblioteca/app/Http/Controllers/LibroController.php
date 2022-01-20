<?php

namespace App\Http\Controllers;

use App\Models\Libro;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $libros = Libro::with('autor')
        // // $libros = Libro::orderBy('precio', 'DESC')->get();
        // return view('libros.index', compact('libros'));
        $libros = Libro::with('autor')->paginate(2);
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        $libro->titulo = "El juego de Ender";
        $libro->editorial = "Ediciones B";
        $libro->precio = 8.95;
        $libro->save();
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libroAModificar = Libro::findOrFail($id);
        $libroAModificar->titulo = "Plin y Plon vueleven a la carga";
        $libroAModificar->save();
        return view('libros.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::findOrFail($id)->delete();
        $libros = Libro::get();
        return view('libros.destroy');
    }
}
