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

$data['owner_pass'] = md5(time());
$data['owner_email'] = md5(time());
$data['add_time'] = time();
$data['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("owner", $data)){
        return true;
    }


  }


   public function Edit($data)
        {

$this->db->where('owner_id',$data['owner_id']);
$this->db->where('store_id',$_SESSION['store_id']);
if ($this->db->update("owner", $data)){
        return true;
    }


  }




   public function Get()
        {
      
$this->db->select('owner_id,owner_name,owner.owner_tax_number,owner_address,owner.tel')
        ->from('owner')
        ->where('store_id', $_SESSION['store_id'])
        ->order_by('add_time','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }



     

}