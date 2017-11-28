<!-- Titel Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>	

<!-- Omschrijving Form Input -->
<div class="form-group">
	{!! Form::label('description', 'Omschrijving:') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Welke instantie vertegenwoordigt u? Form Input -->
<div class="form-group">
    {!! Form::label('instantiemodel_id', 'Welke instantie vertegenwoordigt u?:') !!}
    {!! Form::select('instantiemodel_id', $instantiemodels, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	dropdown group
</div>

<!-- Hidden scanmodel_id Type Form Input -->
{!! Form::hidden('scanmodel_id', 1, null) !!}

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn btn-primary form-control']) !!}
</div>

    

