<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('blog');
	}

	public function index(){
		$data = array();
		$data['blogs'] = $this->blog->getBlogs();

		//load the list page view
		$this->load->view('templates/header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('templates/footer');
	}

	public function add(){
		$data = array();
		$postData = array();

		if($this->input->post('blogSubmit')){


			//form field validation rules
            $this->form_validation->set_rules('title', 'blog title', 'required');
            $this->form_validation->set_rules('content', 'blog content', 'required');
            
            //prepare post data
			$postData = array(
				'blog_title' => $this->input->post('title'),
				'blog_description' => $this->input->post('content')
			);
			
			if($this->form_validation->run() == true){
                //insert post data
				$insert = $this->blog->insert($postData);
			}
		}


		$data['post'] = $postData;
		$data['title'] = 'Create Blog';
		$data['action'] = 'Add';

        //load the add page view
		$this->load->view('templates/header', $data);
		$this->load->view('blog/add', $data);
		$this->load->view('templates/footer');
	}


}



