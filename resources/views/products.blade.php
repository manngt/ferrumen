@extends('layouts.master')
        <!-- Page Content -->
        @section('content')
        
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Productos</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Listado</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Categoría</th>
                                            <th>Existencias</th>
                                            <th>Costo</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="../plugins/images/product1.jpg"></td>
                                            <td>LLave inglesa</td>
                                            <td>Herramienta</td>
                                            <td>10</td>
                                            <td>Q. 45.00</td>
                                            <td>Q. 60.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><img src="../plugins/images/product2.jpg"></td>
                                            <td>Corta Alambre</td>
                                            <td>Herramienta</td>
                                            <td>78</td>
                                            <td>Q. 38.50</td>
                                            <td>Q. 55.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><img src="../plugins/images/product3.jpg"></td>
                                            <td>Cubeta</td>
                                            <td>Recipientes</td>
                                            <td>90</td>
                                            <td>Q. 24.90</td>
                                            <td>Q. 34.10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
                    
        @endsection
        <!-- /#page-wrapper -->
