<?php

class Admin_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

       



           public function get_user($data)
        {

        $query =  $this->db->get_where('admin' , array('admin_user' => $data['admin_user'] , 'admin_password' => $data['admin_password']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      


foreach ($query->result() as $row) {

        $admin_user = $row->admin_user;
         $admin_password = $row->admin_password;
}

      $newdata = array(
        'admin_user' => $admin_user,
        'admin_password' => $admin_password,
        'admin_logged_in' => TRUE
);

$this->session->set_userdata($newdata);
return TRUE;

     } else {

       
        return FALSE; 
     }


              
              
        }


     

}