<?php
class Afflogin_submit extends MY_Controller
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
    header( "location: ".$this->base_url."/affiliate/afflogin" );

}else if($_POST['email']=='' || $_POST['password']==''){
header( "location: ".$this->base_url."/affiliate/afflogin?email=not" );
}
else{

            //insert user details into db
            $data = array(
                'aff_email' => $this->input->post('email'),
                'aff_pass' => md5($this->input->post('password'))
            );

            if ($this->affiliate_user_model->get_user($data) === true)
            {
               
               header( "location: ".$this->base_url."/affiliate/dashboard" );
            }
            else
            {
               header( "location: ".$this->base_url."/affiliate/afflogin?login=cannot" );
            }

        }
        
    }
}