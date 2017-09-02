@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                        <h4 class="page-title">Producto</h4> </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Detalle</h3>
                            <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><img src="./plugins/images/default.svg"></td>
                                            <td>
                                                <p>Nombre</p>
                                                <p>categoria</p>
                                                <p>Existencia</p>
                                                <p>Costo</p>
                                                <p>Precio</p>
                                            </td>
                                            <td>
                                                <p>Compra promedio</p>
                                                <p>Venta Promedio</p>
                                                <p>Máximo</p>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                    </div>
                </div>
                <!-- /.row -->
</div>
@endsection