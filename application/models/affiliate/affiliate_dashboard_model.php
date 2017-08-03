<?php

class Affiliate_dashboard_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function get_num_owner_all()
        {
        $this->db->select('*')
       ->from('owner')
       ->where('aff_id', $_SESSION['aff_id']);
   return $this->db->count_all_results();
        }

        public function get_num_owner_status_yes()
        {
      $this->db->select('*')
        ->from('owner')
        ->where('aff_id', $_SESSION['aff_id'])
        ->where('status_pay', '1');
   return $this->db->count_all_results();
              
        }

        public function get_num_aff_income_all()
        {
      
      $this->db->select('aff_income_all')
      ->from('affiliate_user')
      ->where('aff_id', $_SESSION['aff_id']);
      $query = $this->db->get();
   return $query->row()->aff_income_all;
              
        }


        public function get_num_aff_income_withdrawal()
        {
      $this->db->select('aff_income_withdrawal')
        ->from('affiliate_user')
        ->where('aff_id', $_SESSION['aff_id']);
        $query = $this->db->get();
   return $query->row()->aff_income_withdrawal;
              
        }


        public function get_list_owner()
        {
      
        $this->db->select('owner_id,status_pay,aff_income,aff_tag,from_unixtime(add_time,"%H:%i  , %d-%m-%Y") as time')
        ->from('owner')
        ->where('aff_id', $_SESSION['aff_id'])
        ->order_by('add_time','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }






     

}