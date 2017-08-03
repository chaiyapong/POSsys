<?php

class Store_reportbrand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;
$apartment_brand_id = $data['apartment_brand_id'];


$query = $this->db->query('SELECT 
    fl.apartment_room_name as apartment_room_name,

    (SELECT count(sd.apartment_order_num) FROM apartment_order as sd WHERE sd.apartment_room_id=fl.apartment_room_id AND sd.store_id="'.$_SESSION['store_id'].'"  AND sd.apartment_brand_id="'.$apartment_brand_id .'" AND sd.apartment_order_status="1" AND sd.create_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as apartment_numsaleall,
    
    


    (SELECT sum(sd.apartment_order_price) FROM apartment_order as sd WHERE sd.apartment_room_id=fl.apartment_room_id AND sd.store_id="'.$_SESSION['store_id'].'" AND sd.apartment_brand_id="'.$apartment_brand_id .'" AND sd.apartment_order_status="1" AND sd.create_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as apartment_pricesaleall
    
    


    FROM apartment_room as fl WHERE fl.apartment_brand_id="'.$apartment_brand_id .'" AND fl.store_id="'.$_SESSION['store_id'].'" ORDER BY apartment_pricesaleall DESC');





$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


    



    }