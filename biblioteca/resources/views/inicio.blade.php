@extends('plantilla')
@section('titulo','Inicio')
@section('contenido')
<h1>Página de inicio</h1>
<p>Bienvenido {{!!$nombre!!}} </p>
<a href="{{route('ruta_contacto')}}">Contacto</a>
@endsection
