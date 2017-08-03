<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renew extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('renew_model');

     if(!isset($_SESSION['owner_id'])){
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
		
$data['title'] = 'ชำระค่าบริการ C2M';
		$this->deshboardlayout('webbody/renew',$data);

}




 function Add()
    {
 
 if(isset($_POST['total_amount'])){

 	$data['owner_id'] = $_SESSION['owner_id'];
		$data['time_transfer'] = $_POST['time_transfer'];
		$data['remark'] = $_POST['remark'];
		$data['total_amount'] = $_POST['total_amount'];
		$data['image'] = md5(time().$_FILES["image"]["name"]).'.png';

		
		if($this->renew_model->Add($data)){

move_uploaded_file($_FILES["image"]["tmp_name"],"file/slip/".md5(time().$_FILES["image"]["name"]).'.png');

header( "location:".$this->base_url."/renew?success=ok" );

		}

	}else{
		header( "location: ".$this->base_url );
	}

		
      
}







	}

