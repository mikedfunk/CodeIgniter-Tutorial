<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * blog
 * 
 * the blog controller, where all the magic happens.
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		blog.php
 * @version		1.0
 * @date		03/01/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------

/**
 * blog class.
 *
 * This class must have the same name as the file name. It is called via the
 * first URL parameter after the root of this project such as
 * http://localhost/ci_tutorial/blog/whatever. It must extend CI_Controller.
 * 
 * @extends CI_Controller
 */
class blog extends CI_Controller
{
	// --------------------------------------------------------------------------
	
	/**
	 * __construct function.
	 *
	 * You could leave this out, but this is here just to remind you that if you
	 * need to declare a construct, you must call parent::__construct() or you
	 * will get PHP errors.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * index function.
	 *
	 * If you navigate to blog/ with no other url params it will call this method
	 *  by default. You can also call it via blog/index. The default route
	 * structure is controller/method/extra_param_1/extra_2 etc. This method
	 * grabs all articles from the database and sends the object to the blog view.
	 * 
	 * @access public
	 * @return void
	 */
	public function index()
	{
		// gets the codeigniter articles object
		$data['articles'] = $this->db->get('articles');
		
		// loads the view in application/views/blog_view.php. Passes the $data
		// array to this view.
		$this->load->view('blog_view', $data);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * comments function.
	 *
	 * This shows the comments related to a specific article and the comment form.
	 * It demonstrates the form helper and URL helper. It shows us how we can
	 * write less code with helpers along with attaching the base URL so you can
	 * drop this app into any folder at any depth and it will still work.
	 * 
	 * @access public
	 * @param int $article_id the id of the related article. Since this param has
	 * no default, it is required. If no article_id is passed it will throw a 
	 * php error.
	 * @return void
	 */
	public function comments($article_id)
	{
		// load the helper into the codeigniter superobject so you can call
		// functions from the form helper in your view
		$this->load->helper('form');
		
		// sets the WHERE portion of the SQL statement
		$this->db->where('article_id', $article_id);
		
		// adds the result object to the $data array, limited by the WHERE above.
		$data['comments'] = $this->db->get('comments');
		
		// loads the application/views/comments_view.php. Passes the data array
		// to it.
		$this->load->view('comments_view', $data);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * add_comment function.
	 *
	 * Adds everything from the post array into the database. Matches the array
	 * keys to the database columns. After that, uses a function from the URL
	 * helper (autoloaded in config/autoload.php) to redirect back to the 
	 * comments for this article.
	 * 
	 * @access public
	 * @return void
	 */
	public function add_comment()
	{
		$this->db->insert('comments', $this->input->post());
		redirect('blog/comments/' . $this->input->post('article_id'));
	}
	
	// --------------------------------------------------------------------------
}
/* End of file blog.php */
/* Location: ./ci_tutorial/application/controllers/blog.php */