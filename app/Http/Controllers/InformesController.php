<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function index()
    {
        return view('informes.index');
    }
    public function beneficiarios()
    {
        return view('informes.listado_beneficiario');
    }
    public function buscarBeneficiario(Request $request)
    {
        $opcion = $request->opcion;

        switch ($opcion) {
            case 'dni':
                $beneficiarios = Gestion::orderBy('dni')->get();
                break;
            case 'sexo':
                $beneficiarios = Gestion::orderBy('sexo')->get();
                break;
            case 'tipo':
                $beneficiarios = Gestion::orderBy('tipo_beneficiario')->get();
                break;
            case 'provincia':
                $beneficiarios = Gestion::orderBy('provincia')->get();
                break;
            case 'estado_civil':
                $beneficiarios = Gestion::orderBy('estado_civil')->get();
                break;
            default:
                $beneficiarios = Gestion::all();
                break;
        }

        return view('informes.beneficiario_resultados', compact('beneficiarios'));
    }
}
