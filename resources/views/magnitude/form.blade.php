
  <div class="form-group">
    {!! Form::label('magnitudeNameLabel', 'Magnitud') !!}
    {!! Form::text('magnitudeName', null, array('placeholder' => 'Nombre de la magnitud','class' => 'form-control')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>