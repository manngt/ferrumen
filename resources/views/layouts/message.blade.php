@if ($message = Session::get('Correcto'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('Incorrecto'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif