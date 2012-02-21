<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * comment_view
 * 
 * the blog entry comments
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		comment_view.php
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

<p><?=$item->content?></p>
<p>by <?=$item->author?></p>
<hr />

<?php 
	endforeach; 
endif; ?>

<p><?=anchor('blog', '&laquo; Back to Blog')?></p>

		
<?php $hidden = array('article_id' => $this->uri->segment(3)); ?>
<?=form_open('blog/comment_insert', '', $hidden)?>

<p><?=form_textarea('content')?></p>

<p><?=form_input('author')?></p>

<button type="submit">Submit</button>

</form>

	</body>
</html>
<?php
/* End of file comment_view.php */
/* Location: ./ci_tutorial/application/views/comment_view.php */