<?php
class Affsignup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('affiliate/affiliate_user_model');

    }

    function index()
    {
        // set form validation rules
      
if(!isset($_POST['email']))
{
    header( "location: ".$this->base_url."/affiliate/affregister" );
}else{

            //insert user details into db
            $data = array(
                'aff_name' => $this->input->post('name'),
                'aff_tel' => $this->input->post('tel'),
                'aff_email' => $this->input->post('email'),
                'aff_pass' => md5($this->input->post('password')),
                'create_time' => time()
            );

            if ($this->affiliate_user_model->insert_user($data) === true)
            {
               
               header( "location: ".$this->base_url."/affiliate/afflogin?regis=ok" );
            }
            else
            {
               header( "location: ".$this->base_url."/affiliate/affregister?regis=cannot" );
            }

        }
        
    }
}