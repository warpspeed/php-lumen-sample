<html>
	<head>
		<title>Task List</title

		{{-- jQuery --}}
		<link rel="stylesheet" href="http://code.jquery.com/jquery-2.1.4.js">

		{{-- Bootstrap CDN --}}
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<style>
				html, body {
			font-family: sans-serif;
		}

		h1 {
			margin-top: 40px;
			margin-bottom: 20px;
			font-weight: 400;
		}

		ul {
			margin-top: 20px;
			padding-left: 0px;
			list-style: none;
		}

		li {
			font-size: 1.25em;
			padding: 20px 0;
			border-top: 1px solid #eee;
		}

		.form-complete{
			display: inline;
			margin-right: 20px;
		}

		.container {
			max-width: 680px;
		}

		</style>
	</head>
	<body>
		<div style="min-height: 90%" class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Task List</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<form action="/tasks" method="POST">
						<div class="input-group">
							<input type="text" name="name" class="form-control" placeholder="What's next on the list?">
							<span class="input-group-btn">
								<input type="submit" value="Add Task" class="btn">
							</span>
						</div>
					</form>
				</div>
				<div class="col-md-3">
					<div class="center-block">
						<form action="/tasks/clear-complete" method="POST">
							<input type="submit" class="btn btn-danger btn-block" value="Clear Completed">
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" >
					<ul>
					@foreach($tasks as $task)
							<li>
								<form class="form-complete" action="/tasks/{{$task->id}}/toggle-complete" method="POST">
										@if( $task->is_complete )
											<button class="btn btn-success">
												<span class="glyphicon glyphicon-ok-circle"></span>
										@else
											<button class="btn btn-primary">
												<span class="glyphicon glyphicon-play-circle"></span>
										@endif
									</button>
								</form>
								@if( $task->is_complete )
									<span><s>{{{ $task->name }}}</s></span>
								@else
									<span>{{{ $task->name }}}</span>
								@endif
							</li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>

		<footer>
			<div class="container">
				<p class="text-muted">Deployed with <a href="https://warpspeed.io">WarpSpeed.io</a> by <a href="https://turnerlogic.com">Turner Logic</a></p>
			</div>
		</footer>
	</body>
</html>
