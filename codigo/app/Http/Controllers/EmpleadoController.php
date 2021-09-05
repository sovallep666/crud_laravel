<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Queue\Connectors\RedisConnector;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $puestos = Puesto::all();
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index',$datos, compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $puestos = Puesto::all();
        return view('empleado.create', compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();

        $empleado -> id = $request -> id;
        $empleado -> codigo = $request -> codigo;
        $empleado -> nombres = $request -> nombres;
        $empleado -> apellidos = $request -> apellidos;
        $empleado -> direccion = $request -> direccion;
        $empleado -> telefono = $request -> telefono;
        $empleado -> fecha_nacimiento = $request -> fecha_nacimiento;
        $empleado -> id_puesto = $request -> id_puesto;

        $empleado -> save();

        return redirect('/empleado/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $puestos = Puesto::all();
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'), compact('puestos'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosEmpleado = request()->except(['_token','_method']);
        Empleado::where('id','=',$id)->update($datosEmpleado);

        return redirect('/empleado/index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
     public function destroy($id_empleado)
    {
        //
        $empleado=Empleado::findOrFail($id_empleado);
        $empleado->delete();
        return redirect('/empleado/index');
    }
}
