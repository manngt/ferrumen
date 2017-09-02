@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Usuarios</h4> </div>
                    
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
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Usuario</th>
                                            <th>Perfil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Juan</td>
                                            <td>Perez</td>
                                            <td>@juan</td>
                                            <td>admin</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Mario</td>
                                            <td>Higueros</td>
                                            <td>@mario</td>
                                            <td>cajero</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Luis</td>
                                            <td>Salvatierra</td>
                                            <td>@luis</td>
                                            <td>supervisor</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Karina</td>
                                            <td>Mendez</td>
                                            <td>@karina</td>
                                            <td>visitante</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
</div>
@endsection