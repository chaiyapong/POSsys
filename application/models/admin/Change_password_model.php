<?php

class Change_password_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }






   public function Edit($data)
        {

$this->db->where('admin_user','admin');
if ($this->db->update("admin", $data)){
        return true;
    }


  }






     

}