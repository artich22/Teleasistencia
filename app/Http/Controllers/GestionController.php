<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function index()
    {
        return view('gestion.index');
    }

    public function create()
    {
        return view('gestion.altabeneficiario');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|string|unique:beneficiarios,dni',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'num_seguridad_social' => 'required|string|unique:beneficiarios,num_seguridad_social',
            'sexo' => 'required|string',
            'estado_civil' => 'required|string',
            'tipo_beneficiario' => 'required|string',
            'direccion' => 'required|string',
            'codigo_postal' => 'required|string',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
            'email' => 'required|string|unique:beneficiarios,email',
        ]);

        
        try {
            Gestion::create($validatedData);
            return redirect()->route('gestion.index')->with('success', 'Beneficiario creado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('gestion.error')->with('error', 'Error al crear el beneficiario ')->withInput();
        }

        return redirect()->route('gestion.index')->with('success', 'Beneficiario creado con éxito');
    }

    public function show($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        return view('gestion.consultabeneficiario', compact('beneficiario'));
    }

    public function edit($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        return view('gestion.modificarbeneficiario', compact('beneficiario'));
    }

    public function update(Request $request, $id)
    {
        $beneficiario = Gestion::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|string|unique:beneficiarios,dni,'.$beneficiario->id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'num_seguridad_social' => 'required|string|unique:beneficiarios,num_seguridad_social,'.$beneficiario->id,
            'sexo' => 'required|string',
            'estadocivil' => 'required|string',
            'tipo' => 'required|string',
            'direccion' => 'required|string',
            'codigo_postal' => 'required|string',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
            'email' => 'required|string',
        ]);

        $beneficiario->update($request->all());

        return redirect()->route('gestion.index')->with('success', 'Beneficiario actualizado con éxito');
    }

    public function destroy($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        $beneficiario->delete();

        return redirect()->route('gestion.index')->with('success', 'Beneficiario eliminado con éxito');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:255',
        ]);

        $dni = $request->input('dni');
        $beneficiario = Gestion::where('dni', $dni)->first();

        if ($beneficiario) {
            return view('gestion.resultados', ['beneficiario' => $beneficiario]);
        } else {
            return redirect()->route('gestion.buscar')->with('error', 'Beneficiario no encontrado.');
        }
    }
    public function error()
    {
        return view('gestion.error');
    }
    public function errorContacto()
    {
        return view('gestion.error_contacto');
    }
    public function contactos()
    {
        return view('gestion.asignar_contactos');
    }
    public function contactosbusqueda(Request $request)
    {
        $dni = $request->input('dni');
        $contacto = Gestion::where('dni', $dni)->first();
        if (!$contacto) {
            return redirect()->route('gestion.index')->withErrors(['dni' => 'No se encontró ningún beneficiario con ese DNI.']);
        }
        return view('gestion.crear_contacto', compact('contacto'));
    }
    public function crearContacto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'tipo' => 'required|string',
            'direccion' => 'required|string|max:255',
            'codigopostal' => 'required|string|max:10',
            'localidad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'dni_beneficiario' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        try {
            Contacto::create([
                'nombre' => $request->input('nombre'),
                'apellidos' => $request->input('apellidos'),
                'telefono' => $request->input('telefono'),
                'tipo' => $request->input('tipo'),
                'direccion' => $request->input('direccion'),
                'codigopostal' => $request->input('codigopostal'),
                'localidad' => $request->input('localidad'),
                'provincia' => $request->input('provincia'),
                'dni_beneficiario' => $request->input('dni_beneficiario'),
                'email' => $request->input('email'),
            ]);
    
            return redirect()->route('gestion.index')->with('success', 'Contacto creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('gestion.error.contacto')->with('error', 'Ha ocurrido un error al crear el contacto.');
        }
    }
}
