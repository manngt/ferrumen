
  <div class="form-group">
    {!! Form::label('brandNameLabel', 'Marca') !!}
    {!! Form::text('brandName', null, array('placeholder' => 'Nombre de la marca','class' => 'form-control')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>