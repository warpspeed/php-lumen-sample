@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Task List</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<form action="http://todolist.dev/task/create" method="POST">
				<div class="input-group">
					<input type="text" name="name" class="form-control" placeholder="What's next on the list?">
					<span class="input-group-btn">
						<input type="submit" value="Add Task" class="btn btn-success">
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-3">
			<div class="center-block">
				<form action="http://todolist.dev/task/clear" method="POST">
					<input type="submit" class="btn btn-danger btn-block" value="Clear Completed">
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" >
			<ul>
			@foreach($tasks as $task)
				@if( ! $task->isComplete )
					<li>
						<form class="form-complete" action="/task/complete/{{$task->id}}" method="POST">
							<button class="btn btn-success">
									<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</form>
						<span>{{{ $task->name }}}</span>
					</li>
				@else
					<li>
						<span class="glyphicon glyphicon-ok"></span>
						<span><s>{{{ $task->name }}}</s></span>
					</li>
				@endif
			@endforeach
			</ul>
		</div>
	</div>
</div>

@stop
