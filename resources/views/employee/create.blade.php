<form action="{{ url('/employees') }}" method="post">
    @csrf
    @include('employee.form', ['modo'=>'Crear']);

</form>