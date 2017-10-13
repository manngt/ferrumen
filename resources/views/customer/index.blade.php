@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Clientes</h4> </div>
                    <div class="pull-right">
                    <a class="btn btn-primary" style="background-color:#85B4D0;" href="{{ route('customer.create') }}"> Nueva</a>
                </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="white-box">
                            <h3 class="box-title">Listado</h3>
                            @include('layouts.error')
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nit</th>
                                            <th>Cliente</th>
                                            <th>Dirección</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td style="vertical-align: middle;" >{{ $customer->id }}</td>
                                            <td style="vertical-align: middle;" >{{ $customer->customerName}}</td>
                                            <td style="vertical-align: middle;" >{{ $customer->customerAddress}} </td>
                                            <td style="vertical-align: middle;" >{{ $customer->customerPhone}} </td>
                                            <td style="vertical-align: middle;" >{{ $customer->customerEmail}} </td>
                                            <td style="vertical-align: middle;" >

                                            {!! Form::open(['method' => 'GET','route' => ['customer.edit', $customer->id], 'style'=>'display:inline']) !!}
                                                
                                                <button type="submit" class="btn" style="background-color:transparent;">
                                                    <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                                </button>

                                            {!! Form::close() !!}
                                                
                                            {!! Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customer->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}
                                        
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