
  <div class="form-group">
    {!! Form::label('paymentMethodNameLabel', 'Metodo de pago') !!}
    {!! Form::text('paymentMethodName', null, array('placeholder' => '¿Como es el pago?','class' => 'form-control')) !!}
  </div>


  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>