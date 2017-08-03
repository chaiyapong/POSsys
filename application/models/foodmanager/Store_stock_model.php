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


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT 
    wl.food_id as food_id,
    wl.food_name as food_name,
    wl.food_price as food_price,
    wl.food_status as food_status,
    wc.food_category_id as food_category_id,
    wc.food_category_name as food_category_name
    FROM food_list  as wl 
    LEFT JOIN food_category as wc on wc.food_category_id=wl.food_category_id
    WHERE wl.store_id="'.$_SESSION['store_id'].'" AND wl.food_brand_id="'.$data['food_brand_id'].'"   AND wl.food_name LIKE "%'.$data['searchtext'].'%" 
    ORDER BY wl.food_id DESC');


$query = $this->db->query('SELECT 
    wl.food_id as food_id,
    wl.food_name as food_name,
    wl.food_price as food_price,
    wl.food_status as food_status,
    wc.food_category_id as food_category_id,
    wc.food_category_name as food_category_name,
    fb.food_brand_name as food_brand_name
    FROM food_list  as wl 
    LEFT JOIN food_category as wc on wc.food_category_id=wl.food_category_id
    LEFT JOIN food_brand as fb on fb.food_brand_id=wl.food_brand_id
    WHERE wl.store_id="'.$_SESSION['store_id'].'" AND wl.food_brand_id="'.$data['food_brand_id'].'"   AND wl.food_name LIKE "%'.$data['searchtext'].'%" 
    ORDER BY wl.food_id DESC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }






    }