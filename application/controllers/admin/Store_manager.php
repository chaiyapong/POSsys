<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_manager extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/store_manager_model');

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

		$data['tab'] = 'store_manager';
		$data['title'] = 'Manage Store Manager';
		$this->adminlayout('admin/store_manager',$data);
	}


function Add()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

$data2['store_name'] = $data['store_name'];
$data2['store_tel'] = $data['store_tel'];
$data2['store_storename'] = $data['store_storename'];
$data2['store_email'] = $data['store_email'];
$data2['store_password'] = md5($data['store_password']);
$data2['store_type'] = $data['store_type'];
$success = $this->store_manager_model->Add($data2);
if($success == true){

}else{
	echo 'dup';
}
      
}

	function Edit()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
$data2['store_id'] = $data['store_id'];
$data2['store_name'] = $data['store_name'];
$data2['store_tel'] = $data['store_tel'];
$data2['store_storename'] = $data['store_storename'];
$data2['store_email'] = $data['store_email'];
$data2['store_password'] = md5($data['store_password']);
$data2['store_type'] = $data['store_type'];
$success = $this->store_manager_model->Edit($data2);
      
}


function Get()
    {
 	
echo $this->store_manager_model->Get();
      
}
	


	


}
