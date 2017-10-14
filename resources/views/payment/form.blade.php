
<div class="form-group">

	{!! Form::label('sale_idLabel', 'ID Venta: '.$payment->sale_id) !!}

    {{ Form::hidden('sale_id', $payment->sale_id) }}
</div>

<div class="form-group">

    {!! Form::label('paymentMethodLabel', 'Metodo de pago: ') !!}
    {!! Form::select('paymentMethod_id', $paymentmethods,null, array('class' => 'form-control')) !!}

</div>

<div class="form-group">

    {!! Form::label('paymentAmountLable', 'Monto: ') !!}

    {!! Form::number('paymentAmount', null, array('placeholder' => 'Costo total','class' => 'form-control','step'=>'any')) !!}

</div>


<div class="form-group text-center">

  	{!!Form::submit('Aplicar',array('class'=>'btn btn-success'))!!}

</div>