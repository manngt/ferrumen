@extends('layouts.master')     
        @section('content')
         <!-- Page Content -->
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Editar Pago</h4> </div>
                        <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('sale.show',$payment->sale_id) }}"> Regresar</a>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="white-box">
                            <h3 class="box-title">Actualizar cantidad y costo</h3>

                            @include('layouts.error')

                            {!! Form::model($payment, ['method' => 'PATCH','route' => ['payment.update', $payment->id]]) !!}


                            @include('payment.form')


                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                

                

            </div>
            <!-- /.container-fluid -->
            <!-- /#page-wrapper -->        
        @endsection
        
