<!-- resources/views/resultados.blade.php -->

@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Resultados de la búsqueda')
@section('ruta_volver', route('informes.index'))
@section('content')
    <table border="1" width="95%" align="center">
        <tr>
            <td><b>Nombre</b></td>
            <td><b>Apellidos</b></td>
            <td><b>DNI</b></td>
            <td><b>Teléfono</b></td>
            <td><b>Fecha de nacimiento</b></td>
            <td><b>Número Seg. Social</b></td>
            <td><b>Sexo</b></td>
            <td><b>Estado Civil</b></td>
            <td><b>Tipo de beneficiario</b></td>
            <td><b>Dirección</b></td>
            <td><b>Código Postal</b></td>
            <td><b>Localidad</b></td>
            <td><b>Provincia</b></td>
            <td><b>Email</b></td>
        </tr>
        
        @foreach($beneficiarios as $beneficiario)
            <tr>
                <td>{{ $beneficiario->nombre }}</td>
                <td>{{ $beneficiario->apellidos }}</td>
                <td>{{ $beneficiario->dni }}</td>
                <td>{{ $beneficiario->telefono }}</td>
                <td>{{ $beneficiario->fecha_nacimiento }}</td>
                <td>{{ $beneficiario->num_seguridad_social }}</td>
                <td>{{ $beneficiario->sexo }}</td>
                <td>{{ $beneficiario->estado_civil }}</td>
                <td>{{ $beneficiario->tipo_beneficiario }}</td>
                <td>{{ $beneficiario->direccion }}</td>
                <td>{{ $beneficiario->codigo_postal }}</td>
                <td>{{ $beneficiario->localidad }}</td>
                <td>{{ $beneficiario->provincia }}</td>
                <td>{{ $beneficiario->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection
