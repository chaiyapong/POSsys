<?php

class Store_manager_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }





public function Add($data)
        {

$this->db->where('store_email', $data['store_email']);
$query = $this->db->get('store_manager');
$count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

$this->db->insert("store_manager", $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }




  }


   public function Edit($data)
        {

$this->db->where('store_id',$data['store_id']);
if ($this->db->update("store_manager", $data)){
        return true;
    }


  }




   public function Get()
        {
      
$this->db->select('store_id,store_name,store_tel,store_email,store_storename,store_type')
        ->from('store_manager')
        ->order_by('store_id','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }



     

}