
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
		<h1>Events</h1>
		<table id="table"></table>
		
		<a href="{{ route('candidates.create') }}" class="btn btn-default">Add Candidate</a>
		<div>
			@forelse($events as $event)
				<h2>
					<a href="{{ url('/events', $event->id) }}">
						{{ $event->name }}
					</a>
				</h2>
				<a href="{{ route('events.edit', $event->id) }}">
					Edit event
				</a>
				<div class='body'>
					<pre>{{ $event }}</pre>
				</div>
				
			@empty
				<p>There are no events to display!</p>
			@endforelse
		</div>
	</div>
</div>
@stop