
  <div class="form-group">

    {!! Form::label('userNameLabel', 'Nombre') !!}

    {!! Form::text('name', null, array('placeholder' => 'Nombre de usuario','class' => 'form-control')) !!}

  </div>

  <div class="form-group">

    {!! Form::label('emailLabel', 'Email') !!}

    {!! Form::email('email', null, array('placeholder' => 'Correo Electronico','class' => 'form-control')) !!}

  </div>

  <div class="form-group">

      {!! Form::label('passwordLabel', 'Contraseña') !!}

      {!! Form::password('password',array('class'=>'form-control')) !!}

  </div>


  <div class="text-center">
  	{!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
  </div>