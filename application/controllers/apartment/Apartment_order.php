<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment_order extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apartment/apartment_order_model');

     if(!isset($_SESSION['apartment_brand_id'])){
            header( "location: ".$this->base_url );
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
		

$data['tab'] = 'apartment_order';
$data['title'] = 'จอง / เช็คอิน / เช็คเอ้า';
		$this->deshboardlayout('apartment/apartment_order',$data);
}




    function Get_room()
    {


 $list = $this->apartment_order_model->Get_room();
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}



function Get_order()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo $this->apartment_order_model->Get_order($data);
      
}







function Blanktable()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->apartment_order_model->Blanktable($data);
      
}


function Booking()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->apartment_order_model->Booking($data);
      
}



function Checkin()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->apartment_order_model->Checkin($data);
      
}



function Checkout()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->apartment_order_model->Checkout($data);
      
}









	}

