
  <div class="form-group">
    {!! Form::label('supplierNameLabel', 'Proveedor') !!}
    {!! Form::text('supplierName', null, array('placeholder' => 'Nombre del proveedor','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('supplierNitLabel', 'NIT') !!}
    {!! Form::text('supplierNit', null, array('placeholder' => 'Identificación tributaria','class' => 'form-control')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>