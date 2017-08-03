<?php

class Apartment_room_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {




$data['apartment_brand_id'] = $_SESSION['apartment_brand_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("apartment_room", $data)){
		return true;
	}

  }


           public function Update($data)
        {



$where = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id']
);

$this->db->where($where);
if ($this->db->update("apartment_room", $data)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM apartment_room WHERE apartment_brand_id="'.$_SESSION['apartment_brand_id'].'" ORDER BY apartment_room_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM apartment_room  WHERE apartment_room_id="'.$data['apartment_room_id'].'" and  apartment_brand_id="'.$_SESSION['apartment_brand_id'].'"');
return true;

        }




    }