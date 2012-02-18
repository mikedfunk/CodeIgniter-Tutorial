<html>
	<head>
		<title><?=$title?></title>
	</head>
	<body>
		<h1><?=$heading?></h1>
		
<?php
// todo items
if (count($query) > 0):
	$result = $query->result();
	foreach ($result as $item):
?>

<h3><?=$item->title?></h3>
<p><?=$item->content?></p>
<hr />

<?php 
	endforeach; 
endif; ?>

	</body>
</html>
