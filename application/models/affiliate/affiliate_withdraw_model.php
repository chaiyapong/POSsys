<?php

class Affiliate_withdraw_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        

        public function get_list_withdraw()
        {
      
        $this->db->select('*')
        ->from('affiliate_withdraw')
        ->where('aff_id', $_SESSION['aff_id'])
        ->order_by('w_id','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }


        public function update($datax)
        {
    $data['aff_id'] = $_SESSION['aff_id'];
    $data['w_amount'] = $datax['amount'];
    $data['w_status'] = '0';
    $data['w_bankaccount'] = $datax['bankaccount'];
    $query = $this->db->insert("affiliate_withdraw", $data);

if($query){
  echo 'ok';
}else{
  echo "oh no";
}

    $data2['aff_income_withdrawal'] = '0';
    $query2 = $this->db->where('aff_id',$_SESSION['aff_id'])
    ->update("affiliate_user", $data2);
         
         if($query2){
  echo 'ok2';
}else{
  echo "oh no2";
}      
        }






     

}