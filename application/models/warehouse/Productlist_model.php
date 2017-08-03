<?php

class Productlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data2['product_image'] = $data['product_image'];
$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_price'] = $data['product_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['supplier_id'] = $data['supplier_id'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['product_score'] = $data['product_score'];
$data2['product_location'] = $data['product_location'];

if ($this->db->insert("wh_product_list", $data2)){
		return true;
	}

  }


           public function Update($data)
        {

$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_image'] = $data['product_image'];
$data2['product_price'] = $data['product_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['supplier_id'] = $data['supplier_id'];
$data2['product_score'] = $data['product_score'];
$data2['product_location'] = $data['product_location'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_id'  => $data['product_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_list", $data2)){
        return true;
    }

}



      



           public function Get($data)
        {

            $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }


            $start = ($page - 1) * $perpage;

$querynum = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_location as product_location,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    sp.supplier_id as supplier_id,
    sp.supplier_name as supplier_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'"  AND wl.product_code LIKE "%'.$data['searchtext'].'%" OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC');


$query = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_location as product_location,
    wl.product_score as product_score,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    sp.supplier_id as supplier_id,
    sp.supplier_name as supplier_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_code LIKE "%'.$data['searchtext'].'%" OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }




        





    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_list  WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }