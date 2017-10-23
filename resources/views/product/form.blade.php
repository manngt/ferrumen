<div class="form-group col-sm-6">

    {!! Form::label('productPictureLabel', 'Imagen') !!}

    {!! Form::file('productPicture',null, array('placeholder' => 'Imagen','class' => 'form-control')) !!}

</div>
  
<div class="form-group col-sm-6">

	{!! Form::label('productNameLabel', 'Producto') !!}

    {!! Form::text('productName', null, array('placeholder' => 'Nombre del Producto','class' => 
    'form-control')) !!}

</div>

<div class="form-group col-sm-12">

    {!! Form::label('productDescriptionLabel', 'Descripción') !!}

    {!! Form::textarea('productDescription', null, array('placeholder' => 'Describa al producto','class' => 
    'form-control')) !!}

</div>

<div class="form-group col-sm-3">

	{!! Form::label('productCostLabel','Costo') !!}

	{!! Form::number('productCost', null, array('placeholder' => 'Costo total','class' => 'form-control','step'=>'any')) !!}
	
</div>

<div class="form-group col-sm-3">

	{!! Form::label('productPriceLabel','Precio') !!}

	{!! Form::number('productPrice', null, array('placeholder' => 'Precio de venta','class' => 'form-control','step'=>'any')) !!}
	
</div>

<div class="form-group col-sm-3">

    {!! Form::label('productDiscountLabel','Descuento') !!}

    {!! Form::number('productDiscount',null, array('placeholder' => 'Descuento de venta','class' => 'form-control','step'=>'any')) !!}

</div>

<div class="form-group col-sm-3">
	
	{!! Form::label('productQuantityLabel','Existencias') !!}

	{!! Form::number('productQuantity',null, array('placeholder' => 'Cuanto hay de producto', 'class' => 'form-control')) !!}

</div>

<div class="form-group col-sm-6">

	{!! Form::label('categoryLabel', 'Categoría') !!}

    {!! Form::select('category_id', $categories,null, array('class' => 'form-control')) !!}

</div>

<div class="form-group col-sm-6">

	{!! Form::label('brandLabel', 'Marca') !!}

    {!! Form::select('brand_id', $brands,null, array('class' => 'form-control')) !!}

</div>

<div class="form-group col-sm-6">

	{!! Form::label('colorLabel', 'Color') !!}

    {!! Form::select('color_id', $colors,null, array('class' => 'form-control')) !!}

</div>

<div class="form-group col-sm-6">

	{!! Form::label('supplierLabel', 'Proveedor') !!}

    {!! Form::select('supplier_id', $suppliers,null, array('class' => 'form-control')) !!}

</div>

<div class="form-group text-center">

  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

</div>