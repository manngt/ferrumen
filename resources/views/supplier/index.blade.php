@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Proveedores</h4> </div>
                    <div class="pull-right">
                    <a class="btn btn-primary" style="background-color:#85B4D0;" href="{{ route('supplier.create') }}"> Nueva</a>
                </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->

    <div>
        {!! $suppliers->appends(Request::only('search'))->links(); !!}
    </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="white-box">

                            <div class="row col-sm-12">

                                <div class="col-xs-6 col-sm-6 pull-right">

                                    {!! Form::open(array('method'=>'GET','url' => '/searchsupplier', 'class'=>'form navbar-form navbar-right searchform')) !!}

                                    <div class="input-group">

                                        {!! Form::text('search', null,
                                                           array('required',
                                                                'class'=>'form-control',
                                                                'placeholder'=>'Buscar')) !!}

                                        <div class="input-group-btn">

                                            {!! Form::submit('Buscar', array('class'=>'btn btn-default')) !!}

                                            <a class="btn btn-default" href="{{ route('supplier.index') }}">
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
                                            <th>NIT</th>
                                            <th>Proveedor</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td style="vertical-align: middle;" >{{ $supplier->id}}</td>
                                            <td style="vertical-align: middle;" >{{ $supplier->supplierNit}}</td>
                                            <td style="vertical-align: middle;" >{{ $supplier->supplierName}} </td>
                                            <td style="vertical-align: middle;" >

                                                {!! Form::open(['method' => 'GET','route' => ['supplier.show', $supplier->id], 'style'=>'display:inline']) !!}

                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-eye" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                                {!! Form::close() !!}

                                            {!! Form::open(['method' => 'GET','route' => ['supplier.edit', $supplier->id], 'style'=>'display:inline']) !!}
                                                
                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                            {!! Form::close() !!}
                                                
                                            {!! Form::open(['method' => 'DELETE','route' => ['supplier.destroy', $supplier->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}
                                        
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
    <div>
        {!! $suppliers->appends(Request::only('search'))->links(); !!}
    </div>

</div>

@endsection