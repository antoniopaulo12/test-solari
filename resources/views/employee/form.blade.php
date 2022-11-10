
    @extends('layouts.app')

    @section('content')
    <div class="container">
    <h1>{{ $modo }} empleado</h1>

    @if(count($errors)>0)

      <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li>
           {{ $error }}
           </li>
        @endforeach
        </ul>
      </div>

    @endif

    <div class="form-group">
        <label for="employee_name">Nombre</label>
        <input type="text" class="form-control" name="employee_name" value="{{ isset($employee->employee_name)?$employee->employee_name:old('employee_name') }}" id="employee_name">
    </div>
    <div class="form-group">
        <label for="employee_first_name">Apellido</label>
        <input type="text" class="form-control" name="employee_first_name" value="{{ isset($employee->employee_first_name)?$employee->employee_first_name:old('employee_first_name') }}" id="employee_first_name">
    <div/>
    <div class="form-group">
        <label for="employee_phone">Telefono</label>
        <input type="text" class="form-control" name="employee_phone" value="{{ isset($employee->employee_phone)?$employee->employee_phone:old('employee_phone') }}" id="employee_phone">
    <div/>
    <div class="form-group">
        <label for="employee_address">Direccion</label>
        <input type="text" class="form-control" name="employee_address" value="{{ isset($employee->employee_address)?$employee->employee_address:old('employee_address') }}" id="employee_address">
    <br/>
    <div/>

    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

    <a href="{{ url('employees/') }} "class="btn btn-warning">Regresar</a>

    <br>
    </div>
    @endsection