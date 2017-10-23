
@extends('layouts.master')

@section('content')

    <div class="white-box">

        <div class="row">

            <div class="col-sm-4">

                <p>

                    <img src="{{ '/images'.'/'.$product->productPicture }} " width="300" height="300">

                </p>

                <strong>Codigo: </strong>

                {{ $product->id }}

            </div>

            <div class="col-sm-8">

                <div class="row">
                    <p>
                        <strong>Producto: </strong>

                        {{ $product->productName }}

                        <strong>Descripción: </strong>

                        {{ $product->productDescription }}

                        <strong>Existencias: </strong>

                        {{ $product->productQuantity }}
                    </p>

                </div>

                <div class="row">

                    <p>

                        <strong>Costo: </strong>

                        {{ 'Q. '.$product->productCost }}

                        <strong>Precio: </strong>

                        {{ 'Q. '.$product->productPrice }}

                        <strong>Descuento: </strong>

                        {{ 'Q. '.$product->productDiscount }}

                    </p>

                </div>

                <div class="row">

                    <p>
                        <strong>Color: </strong>

                        {{ $product->colors->colorName }}

                        <strong>Categoría: </strong>

                        {{ $product->categories->categoryName }}

                        <strong>Marca: </strong>

                        {{ $product->brands->brandName }}

                        <strong>Proveedor: </strong>

                        {{ $product->suppliers->supplierName }}

                    </p>

                </div>

                <div class="row">

                    <p>
                        {!! Form::open(array('route' => 'productmeasure.store','method'=>'POST','files'=>'true')) !!}
                        <div class="col-md-6" style="background-color:white;">

                            <div class="form-group">
                                {{ Form::text('product_id', $product->id, array('hidden' => 'hidden')) }}
                                {!! Form::label('magnitudeLabel', 'Medida: ', array('class'=>'col-sm-2')) !!}
                                <div class="col-sm-8">
                                    {!! Form::select('magnitude_id', $magnitudes,null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="background-color:white;">

                            <div class="form-group">
                                {!! Form::label('metricLabel', 'Metrica: ', array('class'=>'col-sm-2')) !!}
                                <div class="col-sm-8">
                                    {!! Form::select('metric_id', $metrics,null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>


                        <div class="col-md-6" style="background-color:white;">

                            <div class="form-group">

                                {!! Form::label('productMeasureValueLabel', 'Medición: ', array('class'=>'col-sm-4')) !!}
                                <div class="col-sm-6">
                                    {!! Form::number('productMeasureValue', null, array('placeholder' => '¿Cuanto mide?','class' => 'form-control','step'=>'any')) !!}

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="background-color:white;">

                            <div class="form-group">

                                <div class="col-sm-2 pull-center">

                                    <button type="submit" class="btn btn-success text-center">
                                        <i class="fa fa-plus-circle text-center" aria-hidden="true"> Agregar</i>
                                    </button>


                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </p>


                </div>

                <div clas="row">

                    <p>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Medida</th>
                                <th>Metrica</th>
                                <th>Medición</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->productMeasures as $productmeasure)
                                <tr>
                                    <td style="vertical-align: middle;" >{{ $productmeasure->magnitudes->magnitudeName}}</td>
                                    <td style="vertical-align: middle;" >{{ $productmeasure->metric->metricName}} </td>
                                    <td style="vertical-align: middle;" >{{ $productmeasure->productMeasureValue}} </td>

                                    <td style="vertical-align: middle;" >


                                        {!! Form::close() !!}

                                        {!! Form::open(['method' => 'GET','route' => ['productmeasure.edit', $productmeasure->id], 'style'=>'display:inline']) !!}

                                        <button type="submit" class="btn" style="background-color:transparent;">
                                            <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                        </button>

                                        {!! Form::close() !!}

                                        {!! Form::open(['method' => 'DELETE','route' => ['productmeasure.destroy', $productmeasure->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}

                                        <button type="submit" class="btn" style="background-color:transparent; ">
                                            <li class="btn fa fa-trash-o" style="color:red;font-size: 20px;"></li>

                                        </button>

                                        {!! Form::close() !!}

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </p>



                    </div>

            </div>

        </div>



    </div>


@endsection