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
    {!! Form::label('instantiemodel_id', 'Welke instantie vertegenwoordig je?:') !!}
    {!! Form::select('instantiemodel_id', $instantiemodels, null, ['class' => 'form-control']) !!}
</div>



<!-- Wil je de scan aan een group koppelen? Form Input -->
<div class="form-group">
    {!! Form::label('group_bool', 'Wil je de scan aan een group koppelen?:') !!} <br>
    <input checked="checked" name="group_bool" type="checkbox" v-model="pageboolean">

</div>
<div class="form-group" v-if="pageboolean">
    {!! Form::label('group_id', 'Kies hier een groep:') !!} <br>
    {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}
</div>

<!-- Hidden scanmodel_id Type Form Input -->
{!! Form::hidden('scanmodel_id', 1, null) !!}

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn btn-primary btn--fullwidth']) !!}
</div>

    

