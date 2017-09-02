@extends('layouts.master')     
        @section('content')
         <!-- Page Content -->
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Crear Producto</h4> </div>
                        <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('product.index') }}"> Regresar</a>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="white-box">
                            <h3 class="box-title">Nuevo Ingreso</h3>

                            @include('layouts.error')

                            {!! Form::open(array('route' => 'product.store','method'=>'POST','files'=>'true','class' => 'white-box')) !!}

                                @include('product.form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <!-- /#page-wrapper -->        
        @endsection
        
