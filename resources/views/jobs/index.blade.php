<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Create a job</title>
</head>

<body>
		<h1>{{ $title }}</h1>
		<ul>

				<?php foreach($jobs as $job) : ?>
				<li><?php echo $job; ?></li>
				<?php endforeach; ?>
		</ul>
</body>

</html>
