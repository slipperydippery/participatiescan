<!-- geef je groep een naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'geef je groep een naam:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Voor welk Arbeidsmarktregio doe je deze scan? Form Input -->
<div class="form-group">
    {!! Form::label('districtmodel_id', 'Voor welk Arbeidsmarktregio wordt deze groep aangemaakt?:') !!}
    {!! Form::select('districtmodel_id', $districtmodels, null, ['class' => 'form-control']) !!}
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn btn-primary form-control']) !!}
</div>