<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * comments_view
 * 
 * Shows all comments for this article, shows the add comment form.
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		comments_view.php
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


<h1>Comments</h1>

<?php 
// if there is at least one result
if ($comments->num_rows() > 0):
	
	// begin looping through each comment as an object
	foreach($comments->result() as $item): ?>
	
<?php
// echo the content and the author
?>
<p><?=$item->content?></p>
<p>by <?=$item->author?></p>
<hr />

<?php 
	// php alternate syntax to end foreach and if statements
	endforeach;
endif;
?>

<?php
// use the anchor function from the URL helper to generate a link back to our
// blog with the base URL in front.
?>
<p><?=anchor('blog', 'back to blog >>')?></p>

<?php
// use the form helper to open a form, add a textarea, add a label, and add 
// an input. Adds a hidden field to the form with the third param of 
// form_open().
?>
<?=form_open('blog/add_comment', '', array('article_id' => $this->uri->segment(3)))?>
<p><?=form_textarea('content')?></p>
<p><?=form_label('Author:', 'author')?></p>
<p><?=form_input('author')?></p>
<p><button type="submit">submit</button></p>
</form>


</body>
</html>
<?php
/* End of file comments_view.php */
/* Location: ./ci_tutorial/application/views/comments_view.php */