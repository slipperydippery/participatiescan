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

<!-- Welk instantie vertegenwoordig jij zelf tijdens deze scan? Form Input -->
<div class="form-group">
    {!! Form::label('instantiemodel_id', 'Welk instantie vertegenwoordig jij zelf tijdens deze scan?:') !!}
    {!! Form::select('instantiemodel_id', $instantiemodels, null, ['class' => 'form-control']) !!}
</div>

<!-- Hidden scanmodel_id Type Form Input -->
{!! Form::hidden('scanmodel_id', 1, null) !!}

<!-- Hidden user_id Type Form Input -->
{!! Form::hidden('user_id', Auth::user()->id, null) !!}

    

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn btn-primary form-control']) !!}
</div>