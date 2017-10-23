@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Editar Medida</h4> </div>
            <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('product.show',$productmeasure->product_id) }}"> Regresar</a>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="white-box">
                    <h3 class="box-title">Modificar</h3>

                    @include('layouts.error')

                    {!! Form::model($productmeasure, ['method' => 'PATCH','route' => ['productmeasure.update', $productmeasure->id],'files'=>'true']) !!}


                        @include('productmeasure.form')


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <!-- /.row -->





    </div>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->

@endsection