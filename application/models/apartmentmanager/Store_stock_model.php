<?php

class Store_stock_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        




         public function Getstock($data)
        {


 


$query = $this->db->query('SELECT *
    FROM apartment_room as ar
    LEFT JOIN apartment_brand as ab  on ab.apartment_brand_id=ar.apartment_brand_id
    WHERE ar.store_id="'.$_SESSION['store_id'].'" 
    AND ar.apartment_brand_id="'.$data['apartment_brand_id'].'" 
    AND ar.apartment_room_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY ar.apartment_room_id DESC ');




$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );




$json = '{"list": '.$encode_data.'}';

return $json;

        }






    }