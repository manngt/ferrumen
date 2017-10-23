@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Productos</h4> </div>
                    <div class="pull-right">
                    <a class="btn btn-primary" style="background-color:#85B4D0;" href="{{ route('product.create') }}"> Nuevo</a>

                </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">

                    <div class="col-sm-12 ">
                        <div class="white-box">
                            <div class="row col-sm-12">

                                <div class="col-xs-6 col-sm-6 pull-right">

                                    {!! Form::open(array('method'=>'GET','url' => '/searchproduct', 'class'=>'form navbar-form navbar-right searchform')) !!}

                                    <div class="input-group">

                                        {!! Form::text('search', null,
                                                           array('required',
                                                                'class'=>'form-control',
                                                                'placeholder'=>'Buscar')) !!}

                                        <div class="input-group-btn">

                                            {!! Form::submit('Buscar', array('class'=>'btn btn-default')) !!}

                                            <a class="btn btn-default" href="{{ route('product.index') }}">
                                                <li class="fa fa-trash-o"></li>
                                            </a>


                                        </div>

                                    </div>


                                    {!! Form::close() !!}

                                </div>


                            </div>

                            <h3 class="box-title">Listado</h3>

                            @include('layouts.error')
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Costo</th>
                                            <th>Precio</th>
                                            <th>Existencias</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td style="vertical-align: middle;" >{{ $product->id}}</td>
                                            <td style="vertical-align: middle;" ><img height="100" width="100" class="img-circle" src="/images/{{ $product->productPicture}}"> </td>
                                            <td style="vertical-align: middle;" >{{ $product->productName}} </td>
                                            <td style="vertical-align: middle;" >{{ $product->productCost}} </td>
                                            <td style="vertical-align: middle;" >{{ $product->productPrice}} </td>
                                            <td style="vertical-align: middle;" >{{ $product->productQuantity}} </td>
                                            <td style="vertical-align: middle;" >

                                                {!! Form::open(['method' => 'GET','route' => ['product.show', $product->id], 'style'=>'display:inline']) !!}

                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-eye" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                                {!! Form::close() !!}

                                            {!! Form::open(['method' => 'GET','route' => ['product.edit', $product->id], 'style'=>'display:inline']) !!}
                                                
                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                            {!! Form::close() !!}
                                                
                                            {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}
                                        
                                                    <button type="submit" class="btn" style="background-color:transparent; ">
                                                        <li class="btn fa fa-trash-o" style="color:red;font-size: 20px;"></li>
                                                        
                                                    </button>

                                                {!! Form::close() !!}

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.row -->

</div>

@endsection