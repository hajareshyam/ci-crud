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

    public function delete($id){
        $delete = $this->db->delete('blog',array('blog_id'=>$id));
        return $delete ? true : false;
    }

    public function getBlog($id){
        if ($id) {
            $query = $this->db->get_where('blog', array('blog_id' => $id));
            return $query->row_array(); 
        }else{

        }
    }

    public function update($data, $id){
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('blog', $data, array('blog_id'=>$id));
            return $update ? true: false;
        }else{
            return false;
        }
    }

    public function blogCount(){
        $query = $this->db->query('SELECT * FROM blog');
        return $query->num_rows();
    }

    public function blogList($limit,$offset){
            
    }
}
