<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * blog
 * 
 * Example blog controller
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		blog.php
 * @version		1.0
 * @date		02/17/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------

/**
 * blog class.
 * 
 * @extends CI_Controller
 */
class blog extends CI_Controller
{
	// --------------------------------------------------------------------------
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * index function.
	 *
	 * shows each blog article with a link to comments
	 * 
	 * @access public
	 * @return void
	 */
	public function index()
	{
		// $this->load->database();
		$data = array(
			'title' => 'My Blog Title',
			'heading' => 'My Blog Heading',
			'query' => $this->db->get('articles')
		);
		
		$this->load->view('blog_view', $data);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * comments function.
	 *
	 * the comments for a specific blog article with a new comment form
	 * 
	 * @access public
	 * @param string $article_id
	 * @return void
	 */
	public function comments($article_id)
	{
		$data = array(
			'title' => 'My Comment Title',
			'heading' => 'My Comment Heading'
		);
		$this->db->where('article_id', $article_id);
		$data['query'] = $this->db->get('comments');
		
		$this->load->view('comment_view', $data);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * comment_insert function.
	 *
	 * inserts a comment, redirects back to comments
	 * 
	 * @access public
	 * @return void
	 */
	public function comment_insert()
	{
		$this->db->insert('comments', $_POST);
		redirect('blog/comments/'.$_POST['article_id']);
	}
	
	// --------------------------------------------------------------------------
}
/* End of file blog.php */
/* Location: ./ci_tutorial/application/controllers/blog.php */