<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thailand extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('thailand_model');

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



    function Province()
    {

 $list = $this->thailand_model->Province();
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}


    function Amphur()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $list = $this->thailand_model->Amphur($data);
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}



    function District()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $list = $this->thailand_model->District($data);
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}






	}

