<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * blog_view
 * 
 * Displays our html for the list of blog entries with links to comments.
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		blog_view.php
 * @version		1.0
 * @date		03/01/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------
?>
<!DOCTYPE HTML>
<html>
<head>
<title>My Blog</title>
</head>
<body>


<h1>My Blog</h1>


<?php 
// if there is at least one article. This is good practice because if you try
// to run a foreach and there are zero articles, you'll get a PHP error. Always
// do this for database results.
if ($articles->num_rows() > 0):
	
	// loops through each result as an object, allowing you to reference columns
	// via $item->column_name.
	foreach($articles->result() as $item): ?>
	
<?php 
// echoes the title and content. NOTE: You will need PHP Short tags turned in in
// your php.ini for the alternate echo method to work. If you have code like this
// and can't turn on PHP short tags, you're in luck. CodeIgniter has a rule in 
// config/(environment)/config.php which allows you to rewrite these to
// <?php echo $whatever;
?>
<h3><?=$item->title?></h3>
<p><?=$item->content?></p>

<?php 
// uses the URL helper to generate a link to the comments page for this
// item. The helper adds the base URL to the front of the link.
?>
<p><?=anchor('blog/comments/' . $item->id, 'Comments')?></p>
<hr />

<?php 
	// alternate PHP syntax to end our loop and if statements. Generally
	// considered good practice inside views.
	endforeach;
endif;
?>


</body>
</html>
<?php
/* End of file blog_view.php */
/* Location: ./ci_tutorial/application/views/blog_view.php */