
<div class="form-group">

	{!! Form::label('customerIdLabel', 'Cliente') !!}

    {!! Form::select('customer_id',$customers ,null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">

    {!! Form::label('invoiceSerialLabel', 'Nro. Serie de Factura') !!}

    {!! Form::text('invoiceSerial', null, array('placeholder' => 'Serie de la factura','class' =>
'form-control')) !!}

</div>

<div class="form-group">

    {!! Form::label('invoiceNumberLabel', 'Correlativo de Factura') !!}

    {!! Form::number('invoiceNumber',null, array('placeholder' => 'Número de factura', 'class' => 'form-control')) !!}

</div>


<div class="form-group text-center">

  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

</div>