
<div class="form-group col-sm-6">

	{!! Form::label('supplierNameLabel', 'Proveedor') !!}

    {!! Form::select('supplier_id', $suppliers ,null, array('class' => 'form-control')) !!}
</div>

<div class="form-group col-sm-6">

    {!! Form::label('purchaseReceptionDateLabel', 'Fecha de recepción') !!}

    {!! Form::text('purchaseReceptionDate', null, array('placeholder' => 'Nombre del purchaseo','class' =>
'form-control')) !!}

</div>


<div class="form-group text-center">

  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

</div>