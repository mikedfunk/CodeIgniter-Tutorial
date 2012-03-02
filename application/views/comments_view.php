<h1>Comments</h1>

<?php if ($comments->num_rows() > 0):
	foreach($comments->result() as $item): ?>
<p><?=$item->content?></p>
<p>by <?=$item->author?></p>
<hr />
<?php 
	endforeach;
endif;
?>
<p><?=anchor('blog', 'back to blog >>')?></p>

<?=form_open('blog/add_comment', '', array('article_id' => $this->uri->segment(3)))?>
<p><?=form_textarea('content')?></p>
<p><?=form_label('Author:', 'author')?></p>
<p><?=form_input('author')?></p>
<p><button type="submit">submit</button></p>
</form>