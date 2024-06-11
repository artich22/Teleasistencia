@extends('layout')

@section('seccion', 'Entrantes')
@section('title', 'Error al crear beneficiario')
@section('ruta_volver', route('entrantes.index'))
@section('content')
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
    <div>
        <a href="{{ route('entrantes.index') }}" class="btn btn-primary">Volver al formulario</a>
    </div>
@endsection
