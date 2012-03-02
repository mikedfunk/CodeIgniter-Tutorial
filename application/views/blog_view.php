<h1>My blog</h1>
<?php if ($articles->num_rows() > 0):
	foreach($articles->result() as $item): ?>
<h3><?=$item->title?></h3>
<p><?=$item->content?></p>
<p><?=anchor('blog/comments/' . $item->id, 'Comments')?></p>
<hr />
<?php 
	endforeach;
endif;
?>