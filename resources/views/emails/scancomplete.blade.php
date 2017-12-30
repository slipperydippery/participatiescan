<p>Je hebt succesvol meegedaan aan de participatiescan met groep {{ $scan->title }}:</p>
<p>Dit zijn de verbeteracties die jullie hebben besproken (per thema):</p>
@foreach($scan->measures as $measure)
	@if($measure->active)
		<h3>{{ $measure->question->theme->title }}: {{ $measure->question->title }}</h3>
		<p>{{ $measure->measure }}</p>
	@endif
@endforeach

<p>Je kunt de scan natuurlijk ook bekijken via jouw account.</p>