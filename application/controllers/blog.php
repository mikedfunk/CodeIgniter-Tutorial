<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * blog
 * 
 * Example blog controller
 * 
 * @license		Copyright Xulon Press, Inc. All Rights Reserved.
 * @author		Xulon Press
 * @link		http://xulonpress.com
 * @email		info@xulonpress.com
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
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index()
	{
		$this->load->database();
		
		$data = array(
			'title' => 'My Blog Title',
			'heading' => 'My Blog Heading',
			'todo' => array(
				'clean house',
				'eat lunch',
				'call mom'
			)
		);
		$this->load->view('blog_view', $data);
	}
	
	// --------------------------------------------------------------------------
}
/* End of file blog.php */
/* Location: ./ci_tutorial/application/controllers/blog.php */