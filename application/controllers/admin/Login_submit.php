<?php
class Login_submit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/admin_model');

    }

    function index()
    {
        // set form validation rules
      
if(!isset($_POST['admin_user']))
{
    header( "location: ".$this->base_url."/admin/login" );

}else if($_POST['admin_user']=='' || $_POST['admin_password']==''){
header( "location: ".$this->base_url."/admin/login?user=not" );
}
else{


            $data = array(
                'admin_user' => $this->input->post('admin_user'),
                'admin_password' => $this->input->post('admin_password')
            );

            if ($this->admin_model->get_user($data) === true)
            {
               
               header( "location: ".$this->base_url."/admin/store_manager" );
            }
            else
            {
               header( "location: ".$this->base_url."/admin/login?login=cannot" );
            }

        }
        
    }
}