<?php

class Store_brand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }



 public function Add($data)
        {

$data['add_time'] = time();
$data['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("apartment_brand", $data)){
        return true;
    }


  }


   public function Edit($data)
        {

$this->db->where('apartment_brand_id',$data['apartment_brand_id']);
$this->db->where('store_id',$_SESSION['store_id']);
if ($this->db->update("apartment_brand", $data)){
        return true;
    }


  }




   public function Get()
        {
      
$this->db->select('*')
        ->from('apartment_brand')
        ->where('store_id', $_SESSION['store_id'])
        ->order_by('add_time','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }



     

}