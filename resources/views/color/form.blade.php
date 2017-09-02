
  <div class="form-group">
    {!! Form::label('colorNameLabel', 'Color') !!}
    {!! Form::text('colorName', null, array('placeholder' => 'Nombre del color','class' => 'form-control')) !!}
  </div>

   <div class="form-group">
    {!! Form::label('colorHexLabel', 'Identificador') !!}
    {!! Form::text('colorHex', null, array('placeholder' => 'Identificador del color','class' => 'form-control color')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>