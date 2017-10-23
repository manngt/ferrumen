
        @extends('layouts.master')
        @section('content')
        <!-- Navigation -->
        
        <!-- Left navbar-header end -->
        <!-- Page Content -->

            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tablero</h4> </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Total Compras</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-info">{{ $purchasequantity}}</h3> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Compras Completadas</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 @if ($purchasepercent < 100) text-danger @else text-success @endif">{{ $purchasereceived}}</h3> </div>
                                    <h4 class="counter text-left m-t-15 @if ($purchasepercent < 100) text-danger @else text-success @endif">{{$purchasepercent.'%'}} </h4>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar @if ($purchasepercent < 100) progress-bar-danger @else progress-bar-success @endif" role="progressbar" aria-valuenow="{{ $purchasereceived }}" aria-valuemin="0" aria-valuemax="{{ $purchasequantity }}" style="width: {{ $purchasepercent.'%' }}"> <span class="sr-only">{{ $purchasepercent.' %' }} (success)</span> </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Total productos</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-info">{{ $productquantity}}</h3> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Productos con existencia baja</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 @if ($productpercent<100) text-danger @else text-success @endif">{{ $productlowquantity}}</h3> </div>
                                <h4 class="counter text-left m-t-15 text-danger">{{$productpercent.'%'}} </h4>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar @if ($productpercent < 100) progress-bar-danger @else progress-bar-success @endif" role="progressbar" aria-valuenow="{{ $productlowquantity }}" aria-valuemin="0" aria-valuemax="{{ $productquantity }}" style="width: {{ $productpercent.'%' }}"> <span class="sr-only">{{ $productpercent.' %' }} (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->  
                <!--row -->
                <div class="row white-box">
                    <h2>Ventas recientes</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mostrecentsales as $sale)
                                <tr>
                                    <td style="vertical-align: middle;" >{{ $sale->customer->customerName}} </td>
                                    <td style="vertical-align: middle;" >{{ $sale->issueDate}} </td>
                                    <td class="">{{ 'Q. '.number_format($sale->getTotalAmount(),2) }}</td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.toast({
                    heading: 'Bienvenido',
                    text: 'Aquí podras administrar el inventario',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    stack: 6
                })
            });
        </script>
           
        
        <!-- /#page-wrapper -->
    @endsection
