
  <div class="form-group">
    {!! Form::label('metricNameLabel', 'Medida') !!}
    {!! Form::text('metricName', null, array('placeholder' => 'Nombre de la medida','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('metricSymbol', 'Simbolo') !!}
    {!! Form::text('metricSymbol', null, array('placeholder' => 'Signo de la medida','class' => 'form-control')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>