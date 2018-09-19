<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Model{


	public function getBlogs($id = ''){
		if(!empty($id)){
            $query = $this->db->get_where('posts', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('blog');
            return $query->result_array();
        }
	}

	public function insert($data = array()){
		$insert = $this->db->insert('blog', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}

}
