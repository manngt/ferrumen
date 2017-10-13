
  <div class="form-group">
    {!! Form::label('saleStatusNameLabel', 'Estado') !!}
    {!! Form::text('saleStatusName', null, array('placeholder' => 'El estado de la venta','class' => 'form-control')) !!}
  </div>

   <div class="form-group">
    {!! Form::label('saleStatusDescriptionLabel', 'Descripción') !!}
    {!! Form::textarea('saleStatusDescription', null, array('placeholder' => '¿Qué sucede con el estado?','class' => 'form-control salestatus')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>