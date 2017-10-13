
  <div class="form-group">
    {!! Form::label('customeridLabel', 'Nit') !!}
    {!! Form::text('id', null, array('placeholder' => 'Identificación tributaria','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('customerNameLabel', 'Cliente') !!}
    {!! Form::text('customerName', null, array('placeholder' => 'Nombre del cliente','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('customerAddressLavel', 'Dirección') !!}
    {!! Form::textarea('customerAddress', null, array('placeholder' => 'Dirreción donde se ubica','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('customerPhoneLabel', 'Telefono') !!}
    {!! Form::text('customerPhone', null, array('placeholder' => 'Número telefonico','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('customerEmailLavel', 'Email') !!}
    {!! Form::text('customerEmail', null, array('placeholder' => 'Correo Electronico','class' => 'form-control')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>