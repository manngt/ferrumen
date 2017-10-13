
<div class="form-group col-sm-6">

	{!! Form::label('sale_idLabel', 'ID Venta: '.$saledetail->sale_id) !!}

    {{ Form::hidden('sale_id', $saledetail->sale_id) }}
</div>

<div class="form-group col-sm-6">

    {!! Form::label('product_idLabel', 'Producto: '.$saledetail->product->productName) !!}
    {{ Form::hidden('product_id', $saledetail->product_id) }}

</div>

<div class="form-group col-sm-6">

    {!! Form::label('productSalePriceLabel', 'Precio: Q.'.$saledetail->productSalePrice) !!}

    {{ Form::hidden('productSalePrice', $saledetail->productSalePrice) }}


</div>

<div class="form-group col-sm-6">

    {!! Form::label('productSaleQuantity', 'Cantidad: ') !!}

    {!! Form::number('productSaleQuantity', $saledetail->productSaleQuantity, array('placeholder' => 'Unidades','class' => 'form-control text-center','step'=>'any')) !!}

</div>


<div class="form-group text-center">

  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

</div>