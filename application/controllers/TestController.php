<?php

class TestController extends CI_Controller
{

        function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('test');
        }
        
        public function index($offset=0){
		$data['blogs'] = $this->test->getBlogs();
                print_r($data['blogs']);
                die;
	}

}