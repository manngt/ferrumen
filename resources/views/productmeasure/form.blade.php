
<div class="form-group">
    {!! Form::label('productidlable', 'Producto: '.$productmeasure->product_id) !!}
    {{ Form::hidden('product_id', $productmeasure->product_id) }}
</div>

<div class="form-group">
    {!! Form::label('magnitudeLabel', 'Magnitud') !!}
    {!! Form::select('magnitude_id', $magnitudes,null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('metricLabel', 'Metrica') !!}
    {!! Form::select('mectric_id', $metrics,null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('productMeasureValueLabel', 'Medición:') !!}
    {!! Form::number('productMeasureValue', null, array('placeholder' => '¿Cuanto mide?','class' => 'form-control','step'=>'any')) !!}
</div>

<div class="text-center">
    {!!Form::submit('Guardar',array('class'=>'btn btn-success'))!!}
</div>