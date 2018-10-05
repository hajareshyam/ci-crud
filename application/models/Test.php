<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Model{
    public function getBlogs(){
            $query = $this->db->get('blog');
            return $query->row();
    }
}
