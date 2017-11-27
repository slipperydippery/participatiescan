<!-- geef je groep een naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'geef je groep een naam:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn form-control']) !!}
</div>