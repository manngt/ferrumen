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
                            <h3 class="box-title">Nuevo</h3>
                            <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Producto</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre del producto">
  </div>
  
  <div class="form-group">
    <label for="exampleSelect1">Categoría</label>
    <select class="form-control" id="exampleSelect1">
      <option>Herramienta</option>
      <option>Recipiente</option>
      <option>Material de construcción</option>
    </select>
  </div>
 
  <div class="form-group">
    <label for="exampleInputFile">Imagen</label>
    <input type="file" class="form-control-file" id="exampleInputFile" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Existencias</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cantidad">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Costo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Costo del producto">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Precio de venta">
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>
                            </div>


                    </div>
                </div>
                <!-- /.row -->
</div>
@endsection