
<form action="{{ url('/employees/'.$employee->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}

    @include('employee.form', ['modo'=>'Editar']);
</form>

