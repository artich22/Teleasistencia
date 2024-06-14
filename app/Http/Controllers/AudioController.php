<?php

namespace App\Http\Controllers;

use App\Models\Entrante;
use App\Models\Saliente;
use App\Models\User;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index()
    {
        $entrantes = Entrante::whereNotNull('archivo')->get()->map(function($item) {
            $user = User::where('email', $item->email)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Entrante';
            return $item;
        });

        $salientes = Saliente::whereNotNull('archivo')->get()->map(function($item) {
            $user = User::where('email', $item->email_users)->first();
            $item->email = $item->email_users;
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Saliente';
            return $item;
        });

        $llamadas = $entrantes->merge($salientes);
        $llamadas = $llamadas->sortBy('archivo');

        return view('audios.index', compact('llamadas'));
    }
}
