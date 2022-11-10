@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
 {{ Session::get('mensaje') }}
@endif

<a href="{{ url('employees/create') }}" class="btn btn-success">Registrar Empleado</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->employee_name }}</td>
            <td>{{ $employee->employee_first_name }}</td>
            <td>{{ $employee->employee_phone }}</td>
            <td>{{ $employee->employee_address }}</td>
            <td >
                <div class="d-flex">

                        <a href="{{ url('/employees/'.$employee->id.'/edit') }}" class="btn btn-primary me-2">Editar</a>

                        <form action="{{ url('/employees/'.$employee->id) }}" method="post">
                        @csrf
                         {{ method_field('DELETE') }}
                         <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar?')" value="borrar">
                        </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection