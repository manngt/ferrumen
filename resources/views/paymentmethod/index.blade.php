@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Metodos de Pago</h4> </div>
                    <div class="pull-right">
                    <a class="btn btn-primary" style="background-color:#85B4D0;" href="{{ route('paymentmethod.create') }}"> Nuevo</a>
                </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->

    <div>
        {!! $paymentmethods->appends(Request::only('search'))->links(); !!}
    </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="white-box">

                            <div class="row col-sm-12">

                                <div class="col-xs-6 col-sm-6 pull-right">

                                    {!! Form::open(array('method'=>'GET','url' => '/searchpaymentmethod', 'class'=>'form navbar-form navbar-right searchform')) !!}

                                    <div class="input-group">

                                        {!! Form::text('search', null,
                                                           array('required',
                                                                'class'=>'form-control',
                                                                'placeholder'=>'Buscar')) !!}

                                        <div class="input-group-btn">

                                            {!! Form::submit('Buscar', array('class'=>'btn btn-default')) !!}

                                            <a class="btn btn-default" href="{{ route('paymentmethod.index') }}">
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
                                            <th>Metodo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymentmethods as $paymentmethod)
                                        <tr>
                                            <td style="vertical-align: middle;" >{{ $paymentmethod->id}}</td>
                                            <td style="vertical-align: middle;" >{{ $paymentmethod->paymentMethodName}} </td>
                                            <td style="vertical-align: middle;" >

                                            {!! Form::open(['method' => 'GET','route' => ['paymentmethod.edit', $paymentmethod->id], 'style'=>'display:inline']) !!}
                                                
                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                            {!! Form::close() !!}
                                                
                                            {!! Form::open(['method' => 'DELETE','route' => ['paymentmethod.destroy', $paymentmethod->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}
                                        
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
        {!! $paymentmethods->appends(Request::only('search'))->links(); !!}
    </div>

</div>

@endsection