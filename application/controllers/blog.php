<?php

class blog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['articles'] = $this->db->get('articles');
		$this->load->view('blog_view', $data);
	}
	
	public function comments($article_id)
	{
		$this->load->helper('form');
		
		$this->db->where('article_id', $article_id);
		$data['comments'] = $this->db->get('comments');
		
		$this->load->view('comments_view', $data);
	}
	
	public function add_comment()
	{
		$this->db->insert('comments', $_POST);
		redirect('blog/comments/' . $_POST['article_id']);
	}
}