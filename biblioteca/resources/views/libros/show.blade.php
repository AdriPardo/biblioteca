@extends('plantilla')

@section('titulo', 'Ficha de libro')

@section('contenido')
    <h1>Ficha de libro:<br> {{ $libro->titulo}} {{ $libro->editorial }}<br> {{ $libro->autor->nombre}}</h1>
    <a href="{{ route('libro.destroy', $libro )}}">
        Borrar
        </a>

@endsection
