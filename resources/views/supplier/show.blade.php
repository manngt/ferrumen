@extends('layouts.master')

@section('content')

    <div class="row white-box">

        <div class="row bg-title col-sm-8">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detalle</h4> </div>
            <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('supplier.index') }}"> Regresar</a>
            <!-- /.col-lg-12 -->
        </div>

        <div class="col-sm-8">

            {!! Form::label('supplierNameLabel', 'Nombre:') !!}

            {!! Form::text('supplierName', $supplier->supplierName, array('disabled' => 'disabled','class' =>
    'form-control')) !!}

            {!! Form::label('supplierNameLabel', 'Nit:') !!}

            {!! Form::text('supplierName', $supplier->supplierNit, array('disabled' => 'disabled','class' =>
    'form-control')) !!}

            {!! Form::label('supplierPhoneLabel', 'Telefono:') !!}

            {!! Form::text('supplierPhone', $supplier->supplierPhone, array('disabled' => 'disabled','class' =>
    'form-control')) !!}

            {!! Form::label('supplierEmailLabel', 'Email:') !!}

            {!! Form::text('supplierEmail', $supplier->supplierEmail, array('disabled' => 'disabled','class' =>
    'form-control')) !!}

            {!! Form::label('supplierAddressLabel', 'Dirección:') !!}

            {!! Form::textarea('supplierAddress', $supplier->supplierAddress, array('disabled' => 'disabled','class' =>
    'form-control')) !!}

        </div>



    </div>

@endsection