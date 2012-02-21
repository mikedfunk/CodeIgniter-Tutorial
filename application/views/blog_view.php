<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * blog_view
 * 
 * the list of blog entries
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		blog_view.php
 * @version		1.0
 * @date		02/20/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------
?>
<html>
	<head>
		<title><?=$title?></title>
	</head>
	<body>
		<h1><?=$heading?></h1>
		
<?php
// todo items
if ($query->num_rows() > 0):
	$result = $query->result();
	foreach ($result as $item):
?>

<h3><?=$item->title?></h3>
<p><?=$item->content?></p>
<hr />

<p><?=anchor('blog/comments/'.$item->id, 'Comments')?></p>

<?php 
	endforeach; 
endif; ?>

	</body>
</html>
<?php
/* End of file blog_view.php */
/* Location: ./ci_tutorial/application/views/blog_view.php */