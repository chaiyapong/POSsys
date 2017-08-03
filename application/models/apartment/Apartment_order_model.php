<?php

class Apartment_order_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

  


      



           public function Get_room()
        {

$query = $this->db->query('SELECT *,

(SELECT apartment_order_customer_name FROM apartment_order as sd WHERE sd.apartment_room_id=ar.apartment_room_id   AND sd.apartment_brand_id="'.$_SESSION['apartment_brand_id'].'" AND sd.apartment_order_status="0") as apartment_order_customer_name

    FROM apartment_room as ar
    WHERE ar.apartment_brand_id="'.$_SESSION['apartment_brand_id'].'" ORDER BY ar.apartment_room_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



  public function Get_order($data)
        {

$query = $this->db->query('SELECT * FROM apartment_order WHERE apartment_brand_id="'.$_SESSION['apartment_brand_id'].'" AND apartment_room_id="'.$data['apartment_room_id'].'" AND apartment_order_status="0"  ORDER BY apartment_order_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }






 public function Blanktable($data)
        {

$data['apartment_room_status'] = '0';
$where = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id']
);

$this->db->where($where);
if ($this->db->update("apartment_room", $data)){

    $query = $this->db->query('DELETE FROM apartment_order  
    WHERE apartment_room_id="'.$data['apartment_room_id'].'"
    AND apartment_order_status="0"
    AND  apartment_brand_id="'.$_SESSION['apartment_brand_id'].'"');


        return true;
    }

}




 public function Booking($data)
        {


$data['apartment_brand_id'] = $_SESSION['apartment_brand_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['create_date'] = time();

if ($this->db->insert("apartment_order", $data)){



$where2 = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id']
);
$data2['apartment_room_status'] = '1';
$this->db->where($where2);
$this->db->update("apartment_room", $data2);


        return true;
    }

}



public function Checkin($data)
        {

$where = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id'],
        'apartment_order_status' => '0'
);

$this->db->where($where);
if ($this->db->update("apartment_order", $data)){



    $where2 = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id']
);
$data2['apartment_room_status'] = '2';
$this->db->where($where2);
$this->db->update("apartment_room", $data2);




        return true;
    }

}



public function Checkout($data)
        {

$data['apartment_order_status'] = '1';
$where = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id'],
        'apartment_order_status' => '0'
);

$this->db->where($where);
if ($this->db->update("apartment_order", $data)){

    $where2 = array(
        'apartment_brand_id' => $_SESSION['apartment_brand_id'],
        'apartment_room_id'  => $data['apartment_room_id']
);
$data2['apartment_room_status'] = '0';
$this->db->where($where2);
$this->db->update("apartment_room", $data2);



        return true;
    }

}












    }