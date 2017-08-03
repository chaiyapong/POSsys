<?php

class Affiliate_user_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function insert_user($data)
        {

                $this->db->where('aff_email', $data['aff_email']);

    $query = $this->db->get('affiliate_user');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

         $this->db->insert('affiliate_user', $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }


              
              
        }



           public function get_user($data)
        {

        $query =  $this->db->get_where('affiliate_user' , array('aff_email' => $data['aff_email'] , 'aff_pass' => $data['aff_pass']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      


foreach ($query->result() as $row) {

        $aff_id = $row->aff_id;
         $aff_name = $row->aff_name;
        $aff_email = $row->aff_email;
}

      $newdata = array(
        'aff_id' => $aff_id,
        'aff_email'     => $aff_email,
        'aff_name' => $aff_name,
        'aff_logged_in' => TRUE
);

$this->session->set_userdata($newdata);
return TRUE;

     } else {

       
        return FALSE; 
     }


              
              
        }


     

}