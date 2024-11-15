<!DOCTYPE html>
<html lang="en">

		<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Jobs</title>
		</head>

		<body>
				<h1>Availabe Jobs</h1>
				<form action="/jobs" method="POST">
						@csrf
						<input name="title" type="text" placeholder="title">
						<input name="description" type="text" placeholder="description">
						<button type="submit">Submit</button>
				</form>
		</body>

</html>
