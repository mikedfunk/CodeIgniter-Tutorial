<html>
	<head>
		<title><?=$title?></title>
	</head>
	<body>
		<h1><?=$heading?></h1>
		
<?php
// todo items
if (count($todo) > 0):
?>

<ol>

<?php
	foreach ($todo as $item):
?>

<li><?=$item?></li>

<?php endforeach; ?>

</ol>

<?php endif; ?>

	</body>
</html>
