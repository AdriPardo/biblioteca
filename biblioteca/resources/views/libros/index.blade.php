@extends('plantilla')

@section('titulo', 'Listado de libros')

@section('contenido')
    <h1>Listado de libros</h1>
    <ul>
    @forelse ($libros as $libro)
        <li><a href="{{route('libros.show',$libro)}}"><b>{{ $libro->id }}</b></a> {{ $libro->titulo }}</li>
    @empty
        <li>No se encontraron libros</li>
    @endforelse
    </ul>
    {{$libros->links()}}
@endsection
