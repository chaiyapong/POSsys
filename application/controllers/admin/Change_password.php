<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/change_password_model');

     if(!isset($_SESSION['admin_user'])){
            header( "location: ".$this->base_url."/admin/login" );
        }
        
    }


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$data['tab'] = 'change_password';
		$data['title'] = 'เปลี่ยนรหัสผ่าน';
		$this->adminlayout('admin/change_password',$data);
	}




	function Edit()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$success = $this->change_password_model->Edit($data);
      
}



	


	


}
