<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminyoyo extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('adminyoyo_model');

     
        
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
		

$data['tab'] = 'deshboard';
$data['title'] = 'ADMIN';
		$this->weblayout('webbody/adminyoyo',$data);


	}


	 function Get_renew()
    {
if(!isset($_SESSION['adminyoyo'])){
            header( "location: ".$this->base_url );
        }
 echo $this->adminyoyo_model->Get_renew();
					     
}


	 function Get_with()
    {
if(!isset($_SESSION['adminyoyo'])){
            header( "location: ".$this->base_url );
        }
 echo $this->adminyoyo_model->Get_with();
					     
}

function Update_with()
    {
    	if(!isset($_SESSION['adminyoyo'])){
            header( "location: ".$this->base_url );
        }
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
$up =  $this->adminyoyo_model->Update_with($data);
					     
}



function Delete_renew()
    {
    	if(!isset($_SESSION['adminyoyo'])){
            header( "location: ".$this->base_url );
        }
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
$delete =  $this->adminyoyo_model->Delete_renew($data);
					     
}

function Update_renew()
    {
    	if(!isset($_SESSION['adminyoyo'])){
            header( "location: ".$this->base_url );
        }
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
$up =  $this->adminyoyo_model->Update_renew($data);
					     
}




}
