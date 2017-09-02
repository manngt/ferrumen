
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
                                    <h5 class="text-muted vb">CLIENTES NUEVOS</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger">23</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
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
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">FACTURAS</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary">157</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->  
                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">VENTAS RECIENTES
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>Marzo 2017</option>
                                        <option>Abril 2017</option>
                                        <option>Mayo 2017</option>
                                        <option>Junio 2017</option>
                                        <option>Julio 2017</option>
                                    </select>
                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">Cliente 1</td>
                                            <td>Vendido</td>
                                            <td class="txt-oflo">18 de abril</td>
                                            <td><span class="text-success">Q. 24.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Cliente 2</td>
                                            <td>Credito</td>
                                            <td class="txt-oflo">19 de abril</td>
                                            <td><span class="text-info">Q. 1,250.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Cliente 3</td>
                                            <td>Pendiente</td>
                                            <td class="txt-oflo">20 de abril</td>
                                            <td><span class="text-danger">-Q. 24.00</span></td>
                                        </tr>
                                    </tbody>
                                </table> <a href="#">Ver todos las ventas</a> </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
           
        
        <!-- /#page-wrapper -->
    @endsection
