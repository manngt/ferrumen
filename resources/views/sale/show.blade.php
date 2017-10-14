@extends('layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Venta</h4> </div>
            <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('sale.index') }}"> Regresar</a>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">

                <div class="white-box">
                    <h3 class="box-title">Detalle</h3>

                    @include('layouts.error')

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <h3 class="panel-title">Cabecera</h3> -->
                            <hr>
                            <div class="row">
                                <div class="col-md-5" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('customerIdLabel', 'Nit',array('class'=>'col-sm-3')) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('customer_id', $sale->customer->id, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('customerNameLabel', 'Cliente',array('class'=>'col-sm-3')) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('customer_id', $sale->customer->customerName, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('invoiceSerial', 'Nro. Serie',array('class'=>'col-sm-3')) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('invoiceSerial', $sale->invoiceSerial, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('invoiceNumber', 'Nro. Factura',array('class'=>'col-sm-3')) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('invoiceNumber', $sale->invoiceNumber, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="background-color:white;">

                                    <div class="form-group">

                                        {!! Form::label('issueDate', 'Fecha',array('class'=>'col-sm-4')) !!}
                                        <div class="col-sm-5">
                                            {!! Form::text('issueDate', $sale->issueDate, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 target" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('idLabel', 'ID',array('class'=>'col-sm-2')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::text('id', $sale->id, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- row -->

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong class="">FERRUMEN, S.A.</strong><br class="">
                                        5ta. Avenida 30-77 Zona 3 <br class="">
                                        Zona 3<br class="">
                                        Guatemala<br class="">
                                    </address>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- panel heading -->
                        <div   class="roW panel-heading">
                            {!! Form::open(array('route' => 'saledetail.store','method'=>'POST','files'=>'true')) !!}
                            <div class="col-md-12" style="background-color:white;">

                                <div class="form-group">
                                    {{ Form::text('sale_id', $sale->id, array('hidden' => 'hidden')) }}
                                    {!! Form::label('productLabel', 'Producto: ', array('class'=>'col-sm-2')) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('product_id', $products,null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <br>


                            <div class="col-md-4" style="background-color:white;">

                                <div class="form-group">

                                    {!! Form::label('productSaleQuantityLabel', 'Cantidad: ', array('class'=>'col-sm-4')) !!}
                                    <div class="col-sm-8">
                                        {!! Form::number('productSaleQuantity', null, array('placeholder' => 'Unidades','class' => 'form-control','step'=>'any')) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="background-color:white;">

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
                            {!! Form::close() !!}
                        </div>

                        <div class="panel-body">
                            <h3 class="panel-title col-sm-12">Detalle</h3>

                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="">Cantidad</th>
                                    <th class="col-sm-3">Producto</th>
                                    <th class="col-sm-3">Descripción</th>
                                    <th class="">Precio</th>
                                    <th class="">Importe</th>
                                    <th class="">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sale->saledetail as $saledetail)

                                <tr>
                                    <td class="">{{ $saledetail->productSaleQuantity }}</td>
                                    <td class="">{{ $saledetail->product->productName }}  </td>
                                    <td class="">{{ $saledetail->product->productDescription }}</td>
                                    <td class="">{{ 'Q. '.number_format($saledetail->productSalePrice,2) }}</td>
                                    <td class="">{{ 'Q. '.number_format($saledetail->getTotalprice(),2) }}</td>
                                    <td style="vertical-align: middle;" >

                                        {!! Form::open(['method' => 'GET','route' => ['saledetail.edit',$saledetail->id], 'style'=>'display:inline']) !!}


                                        <button type="submit" class="btn" style="background-color:transparent;">
                                            <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                        </button>

                                        {!! Form::close() !!}

                                        {!! Form::open(['method' => 'DELETE','route' => ['saledetail.destroy', $saledetail->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}

                                        <button type="submit" class="btn" style="background-color:transparent; ">
                                            <li class="btn fa fa-trash-o" style="color:red;font-size: 20px;"></li>

                                        </button>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- panel body -->
                        <div class="panel-footer pull-right"><strong>Total:</strong>
                            {!! ' Q. '.number_format($sale->getTotalAmount(),2) !!}
                        </div>
                        <div class="panel-footer pull-right col-sm-12"><strong>Pagos:</strong>
                            {!! Form::open(array('route' => 'payment.store','method'=>'POST','files'=>'true')) !!}

                                {{ Form::text('sale_id', $sale->id, array('hidden' => 'hidden')) }}

                                {!! Form::label('paymentMethodLabel', 'Metodo de pago') !!}

                                {!! Form::select('paymentMethod_id', $paymentmethods,null, array('class' => 'form-control')) !!}

                                {!! Form::label('paymentAmountLabel', 'Monto') !!}

                                {!! Form::number('paymentAmount', null, array('placeholder' => 'Monto Q.','class' => 'form-control','step'=>'any')) !!}
                                   <br>
                                {!!Form::submit('Aplicar',array('class'=>'btn btn-success text-center'))!!}

                            {!! Form::close() !!}
                            <br>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="">Metodo de pago</th>
                                    <th class="col-sm-3">Monto</th>
                                    <th class="">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sale->payment as $payment)

                                    <tr>
                                        <td class="">{{ $payment->paymentMethod->paymentMethodName }}</td>
                                        <td class="">{{ 'Q. '.number_format($payment->paymentAmount,2) }}</td>
                                        <td style="vertical-align: middle;" >

                                            {!! Form::open(['method' => 'GET','route' => ['payment.edit',$payment->id], 'style'=>'display:inline']) !!}


                                            <button type="submit" class="btn" style="background-color:transparent;">
                                                <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                            </button>

                                            {!! Form::close() !!}

                                            {!! Form::open(['method' => 'DELETE','route' => ['payment.destroy', $payment->id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}

                                            <button type="submit" class="btn" style="background-color:transparent; ">
                                                <li class="btn fa fa-trash-o" style="color:red;font-size: 20px;"></li>

                                            </button>

                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="panel-footer pull-right"><strong>Monto Pagado:</strong>
                                {!! ' Q. '.number_format($sale->getTotalPaymentAmount(),2) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
@endsection