<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Models\Autor;
use App\Models\Libro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('libros/create', [LibroController::class, 'create'])->name('libro.create');
Route::get('libros/edit/{id?}', [LibroController::class, 'edit'])->name('libro.edit')->where('id', "[0-9]+");
Route::get('libros/destroy/{id?}', [LibroController::class, 'destroy'])->name('libro.destroy')->where('id', "[0-9]+");
Route::get('libros/{id}', [LibroController::class, 'show'])->name('libro.show');

Route::get('relacionPrueba', function() {
    $autor = Autor::findOrFail(1);
    $libro = new Libro();
    $libro->titulo = "Libro de prueba " . rand();
    $libro->editorial = "Editorial de prueba";
    $libro->precio = 5;
    $libro->autor()->associate($autor);
    $libro->save();
    return redirect()->route('libros.index');
   });

/*VIEW(mostramos vistas) */
Route::get('/', function () {
    $nombre = "Nacho";

    return view('inicio', compact('nombre'));
})->name('inicio');

/*SIMPLES */
Route::get('fecha', function () {
    return date("d/m/y h:i:s");
})->name('fecha');
Route::get('posts', function () {
    return "Listado de posts";
});


/*POR PARÁMETRO + COMPROBACIÓN CON WHERE*/
Route::get('saludo/{nombre?}/{id?}', function ($nombre = "Invitado", $id = 0) {
    return "Hola $nombre, tu código es el $id";
})->where('nombre', "[A-Za-z]+")
    ->where('id', "[0-9]+")
    ->name('saludo');


/*ASOCIAR UN NOMBRE A UNA RUTA(pasamos de href="/contacto" a {{ route('ruta_contacto') }}s*/
Route::get('contacto', function () {
    return "Página de contacto";
})->name('ruta_contacto');

/*
Route::get('libros',LibroController::Class,'index');
Route::get('libros/{id?}',LibroController::Class,'show');
*/
Route::resource('libros', LibroController::class)->only(['index', 'show', 'create', 'edit','destroy']);
Route::get('listado', function () {
    $libros = array(
        array(
            "titulo" => "El juego de Ender",
            "autor" => "Orson Scott Card"
        ),
        array(
            "titulo" => "La tabla de Flandes",
            "autor" => "Arturo Pérez Reverte"
        ),
        array(
            "titulo" => "La historia interminable",
            "autor" => "Michael Ende"
        ),
        array(
            "titulo" => "El Señor de los Anillos",
            "autor" => "J.R.R. Tolkien"
        )
    );
    return view('libreria.listado', compact('libros'));
})->name('libreria');
