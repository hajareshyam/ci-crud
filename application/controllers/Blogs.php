<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('blog');
	}

	public function index($offset=0){
		$this->load->library('pagination');

		$config['base_url'] = base_url('blogs/index');
		$config['total_rows'] = $this->blog->blogCount();
		$config['per_page'] = 2;

		$this->pagination->initialize($config);	
		$data = array();
		// $data['blogs'] = $this->blog->getBlogs();
		$data['blogs'] = $this->blog->getAllBlogs($config['per_page'],$offset);

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
				if($insert){
                    redirect('/blogs');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
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

	public function delete($id = ''){
		if ($id){
			//delete post
            $delete = $this->blog->delete($id);
            if ($delete) {
            	
            }else{

            }
		}	
		redirect('/blogs');
	}

	public function view($id = ''){
		$data = array();
		$postData = array();
		if ($id){
			$data['blog'] = $this->blog->getBlog($id);
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('blog/view', $data);
            $this->load->view('templates/footer');
		}else{
			redirect('/blogs');
		}	
	}

	public function edit($id = ''){
		$data = array();
        
        //get post data
        $postData = $this->blog->getBlog($id);
       	
       	//if update request is submitted
        if($this->input->post('blogSubmit')){
			
			//form field validation rules
        	$this->form_validation->set_rules('title', 'Blog title', 'required');
            $this->form_validation->set_rules('content', 'Blog Description', 'required');
            
            $postData = array(
                'blog_title' => $this->input->post('title'),
                'blog_description' => $this->input->post('content')
            );

            if($this->form_validation->run() == true){
            	//update post data
            	$update = $this->blog->update($postData, $id);
            	if ($update) {
            		redirect('/blogs');
            	}else{

            	}
            }

        }

        $data['blog'] = $postData;
        $data['title'] = 'Update Blog';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('blog/edit', $data);
        $this->load->view('templates/footer');
	}

}



