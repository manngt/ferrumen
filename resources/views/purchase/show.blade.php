@extends('layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Compra</h4> </div>
            <a class="btn btn-primary pull-right" style="background-color:#85B4D0;" href="{{ route('purchase.index') }}"> Regresar</a>
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
                                        {!! Form::label('supplierNameLable', 'Proveedor',array('class'=>'col-sm-3')) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('supplier_id', $purchase->supplier->supplierName, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="background-color:white;">

                                    <div class="form-group">

                                        {!! Form::label('purchaseReceptionDate', 'Recepción',array('class'=>'col-sm-4')) !!}
                                        <div class="col-sm-5">
                                            {!! Form::text('supplier_id', $purchase->purchaseReceptionDate, array('disabled'=>'disabled','class' =>
'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 target" style="background-color:white;">
                                    <div class="form-group">
                                        {!! Form::label('idLabel', 'ID',array('class'=>'col-sm-2')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::text('id', $purchase->id, array('disabled'=>'disabled','class' =>
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
                        <div   class="row panel-heading">
                            {!! Form::open(array('route' => 'purchasedetail.store','method'=>'POST','files'=>'true')) !!}
                            <div class="col-md-12" style="background-color:white;">

                                <div class="form-group">
                                    {{ Form::text('purchase_id', $purchase->id, array('hidden' => 'hidden')) }}
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

                                    {!! Form::label('productPurchaseCostLabel', 'Costo: ', array('class'=>'col-sm-4')) !!}
                                    <div class="col-sm-8">
                                        {!! Form::number('productPurchaseCost', null, array('placeholder' => 'Costo','class' => 'form-control','step'=>'any')) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="background-color:white;">

                                <div class="form-group">

                                    {!! Form::label('productQuantityLabel', 'Cantidad: ', array('class'=>'col-sm-4')) !!}
                                    <div class="col-sm-8">
                                        {!! Form::number('productQuantity', null, array('placeholder' => 'Unidades','class' => 'form-control','step'=>'any')) !!}

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

                        <div class="row panel-heading">

                            {!! Form::model($purchase, ['method' => 'PATCH','route' => ['purchase.update', $purchase->id]]) !!}

                                {{ Form::text('supplier_id', $purchase->supplier_id, array('hidden' => 'hidden')) }}

                                {{ Form::text('purchaseReceptionDate', $purchase->purchaseReceptionDate, array('hidden' => 'hidden')) }}

                                {!! Form::label('purchaseStatusLabel', 'Estado') !!}

                                {!! Form::select('purchaseStatus_id', $purchasestatus,null, array('class' => 'form-control')) !!}

                                <br>

                                {!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}

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
                                @foreach($purchase->purchasedetail as $purchasedetail)

                                <tr>
                                    <td class="">{{ $purchasedetail->productQuantity }}</td>
                                    <td class="">{{ $purchasedetail->product->productName }}  </td>
                                    <td class="">{{ $purchasedetail->product->productDescription }}</td>
                                    <td class="">{{ 'Q. '.number_format($purchasedetail->productPurchaseCost,2) }}</td>
                                    <td class="">{{ 'Q. '.number_format($purchasedetail->getTotalprice(),2) }}</td>
                                    <td style="vertical-align: middle;" >

                                        {!! Form::open(['method' => 'GET','route' => ['purchasedetail.edit',$purchase->id], 'style'=>'display:inline']) !!}

                                        {{ Form::text('purchase_id', $purchase->id, array('hidden' => 'hidden')) }}
                                        {{ Form::text('product_id', $purchasedetail->product->id, array('hidden' => 'hidden')) }}

                                        <button type="submit" class="btn" style="background-color:transparent;">
                                            <li class="fa fa-pencil-square-o" style="color:#00BFFF; font-size: 20px; "></li>
                                        </button>

                                        {!! Form::close() !!}

                                        {!! Form::open(['method' => 'DELETE','route' => ['purchasedetail.destroy', $purchasedetail->purchase_id], 'style'=>'display:inline' ,'onsubmit' => 'return confirm("¿Estás segura(o)?")']) !!}

                                        {{ Form::text('purchase_id', $purchase->id, array('hidden' => 'hidden')) }}
                                        {{ Form::text('product_id', $purchasedetail->product->id, array('hidden' => 'hidden')) }}
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
                            {!! ' Q. '.number_format($purchase->getTotalAmount(),2) !!}
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