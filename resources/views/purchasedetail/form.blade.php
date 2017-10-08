
<div class="form-group col-sm-3">

	{!! Form::label('purchase_idLabel', 'ID Compra: '.$purchasedetail->purchase_id) !!}

    {{ Form::hidden('purchase_id', $purchasedetail->purchase_id) }}
</div>

<div class="form-group col-sm-3">

    {!! Form::label('product_idLabel', 'Producto: '.$purchasedetail->product->productName) !!}
    {{ Form::hidden('product_id', $purchasedetail->purchase_id) }}

</div>

<div class="form-group col-sm-1">

    {!! Form::label('productQuantity', 'Cantidad: ') !!}

    {!! Form::number('productQuantity', $purchasedetail->productQuantity, array('placeholder' => 'Unidades','class' => 'form-control text-center','step'=>'any')) !!}

</div>


<div class="form-group text-center">

  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

</div>