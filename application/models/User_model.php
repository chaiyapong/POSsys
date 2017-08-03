<?php

class User_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function insert_user($data)
        {

                $this->db->where('owner_email', $data['owner_email']);

    $query = $this->db->get('owner');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

         $this->db->insert('owner', $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }


              
              
        }



           public function get_user($data)
        {

        $query =  $this->db->get_where('user_owner' , array('user_email' => $data['user_email'] , 'user_password' => $data['user_password']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      


foreach ($query->result() as $row) {
 
        # code...
        $owner_id = $row->owner_id;
        $food_brand_id = $row->food_brand_id;
        $apartment_brand_id = $row->apartment_brand_id;
        $user_id = $row->user_id;
        $store_id = $row->store_id;
        $store_type = $row->store_type;
         //$owner_name = $row->owner_name;
         $name = $row->name;
         //$owner_tax_number = $row->owner_tax_number;
        //$owner_email = $row->owner_email;
         $owner_email = $row->user_email;
        //$owner_add_time = $row->add_time;
        //$owner_end_time = $row->end_time;
}


if($store_type == '0'){
 $query_owner =  $this->db->get_where('owner' , array('owner_id' => $owner_id));


 foreach ($query_owner->result() as $row) {
 
         $owner_name = $row->owner_name;
         $owner_address = $row->owner_address;
         $owner_tel = $row->tel;
         $owner_email = $row->owner_email;
         $owner_tax_number = $row->owner_tax_number;
}

      $newdata = array(
        'owner_id' => $owner_id,
        'user_id' => $user_id,
        'name' => $name,
        'store_id' => $store_id,
        'store_type' => $store_type,
        'owner_email'     => $owner_email,
        'owner_name' => $owner_name,
        'owner_address' => $owner_address,
        'owner_tel' => $owner_tel,
        'owner_tax_number' => $owner_tax_number,
       // 'owner_add_time' => $owner_add_time,
       // 'owner_end_time' => $owner_end_time,
        'logged_in' => TRUE
);



}else if($store_type == '1'){

$query_owner =  $this->db->get_where('food_brand' , array('food_brand_id' => $food_brand_id));


foreach ($query_owner->result() as $row) {
 
         $food_brand_name = $row->food_brand_name;
         $food_brand_address = $row->food_brand_address;
         $food_brand_tel = $row->food_brand_tel;
         //$food_brand_email = $row->food_brand_email;
         $food_brand_tax_number = $row->food_brand_tax_number;
}

      $newdata = array(
        //'owner_id' => $owner_id,
        'food_brand_id' => $food_brand_id,
        'user_id' => $user_id,
        'name' => $name,
        'store_id' => $store_id,
        'store_type' => $store_type,
        //'food_brand_email'     => $food_brand_email,
        'food_brand_name' => $food_brand_name,
        'owner_name' => $food_brand_name,
        'food_brand_address' => $food_brand_address,
        'food_brand_tel' => $food_brand_tel,
        'food_brand_tax_number' => $food_brand_tax_number,
       // 'owner_add_time' => $owner_add_time,
       // 'owner_end_time' => $owner_end_time,
        'logged_in' => TRUE
);


}else if($store_type == '2'){

$query_owner =  $this->db->get_where('apartment_brand' , array('apartment_brand_id' => $apartment_brand_id));


foreach ($query_owner->result() as $row) {
 
         $apartment_brand_name = $row->apartment_brand_name;
         $apartment_brand_address = $row->apartment_brand_address;
         $apartment_brand_tel = $row->apartment_brand_tel;
         //$food_brand_email = $row->food_brand_email;
         $apartment_brand_tax_number = $row->apartment_brand_tax_number;
}

      $newdata = array(
        //'owner_id' => $owner_id,
        'apartment_brand_id' => $apartment_brand_id,
        'user_id' => $user_id,
        'name' => $name,
        'store_id' => $store_id,
        'store_type' => $store_type,
        //'food_brand_email'     => $food_brand_email,
        'apartment_brand_name' => $apartment_brand_name,
        'owner_name' => $apartment_brand_name,
        'apartment_brand_address' => $apartment_brand_address,
        'apartment_brand_tel' => $apartment_brand_tel,
        'apartment_brand_tax_number' => $apartment_brand_tax_number,
       // 'owner_add_time' => $owner_add_time,
       // 'owner_end_time' => $owner_end_time,
        'logged_in' => TRUE
);


}else{

}


$this->session->set_userdata($newdata);
return TRUE;

     } else {

       
        return FALSE; 
     }


              
              
        }


     

}