<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates['employees'] = Employee::paginate(6);
        return view('employee.index',$dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus=[
            'employee_name'=>'required|string|max:100',
            'employee_first_name'=>'required|string|max:100',
            'employee_phone'=>'required|string|max:20',
            'employee_address'=>'required|string|max:100'
        ];
        $message=[
            'required'=>'Todos los campos son requeridos'
        ];

        $this->validate($request, $campus, $message);

        //$employee = request()->all();
        $employee = request()->except('_token');
        Employee::insert($employee);
        // return response()->json($employee);
        return redirect('employees')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $campus=[
            'employee_name'=>'required|string|max:100',
            'employee_first_name'=>'required|string|max:100',
            'employee_phone'=>'required|string|max:20',
            'employee_address'=>'required|string|max:100'
        ];
        $message=[
            'required'=>'Todos los campos son requeridos'
        ];

        $this->validate($request, $campus, $message);

        $employee = request()->except(['_token','_method']);
        Employee::where('id','=',$id)->update($employee);

         $employee = Employee::findOrFail($id);
        // return  view('employee.edit', compact('employee'));
        return redirect('employees')->with('mensaje', 'Empleado modificado con exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employees')->with('mensaje','Empleado borrado');
    }
}
