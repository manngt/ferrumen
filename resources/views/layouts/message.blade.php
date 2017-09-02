@if ($message = Session::get('Correcto'))
    <div class="alert alert-success">
    	<p>{{ $message }}</p>
    </div>
@endif