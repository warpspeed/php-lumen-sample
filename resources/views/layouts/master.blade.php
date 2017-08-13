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

		@yeild('content')

		<footer>
			<div class="container">
				<p class="text-muted">Deployed with <a href="https://warpspeed.io">WarpSpeed.io</a> by <a href="https://turnerlogic.com">Turner Logic</a></p>
			</div>
		</footer>
	</body>
</html>