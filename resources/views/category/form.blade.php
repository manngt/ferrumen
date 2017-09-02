
  <div class="form-group">
    {!! Form::label('categoryNameLabel', 'Categoría') !!}
    {!! Form::text('categoryName', null, array('placeholder' => 'Nombre de la categoría','class' => 'form-control')) !!}
  </div>

   <div class="form-group">
    {!! Form::label('categoryDescriptionLabel', 'Descripción') !!}
    {!! Form::textarea('categoryDescription', null, array('placeholder' => 'Describa la categoría','class' => 'form-control category')) !!}
  </div>

  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>