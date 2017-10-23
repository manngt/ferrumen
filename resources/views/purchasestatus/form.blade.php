  <div class="form-group">
    {!! Form::label('purchasestatusNameLabel', 'Estado') !!}
    {!! Form::text('purchaseStatusName', null, array('placeholder' => 'El estado de la compra','class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('purchaseStatusSequenceLabel', 'Secuencia') !!}
    {!! Form::text('purchaseStatusSequence', null, array('placeholder' => 'Orden del estado','class' => 'form-control')) !!}
  </div>

   <div class="form-group">
    {!! Form::label('purchaseStatusDescriptionLabel', 'Descripción') !!}
    {!! Form::textarea('purchaseStatusDescription', null, array('placeholder' => '¿Qué sucede con el estado?','class' => 'form-control purchasestatus')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>