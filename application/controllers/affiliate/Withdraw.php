<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('affiliate/affiliate_dashboard_model');
        $this->load->model('affiliate/affiliate_withdraw_model');

     if(!isset($_SESSION['aff_id'])){
            header( "location: ".$this->base_url."/affiliate/afflogin" );
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

		$data['tab'] = 'withdraw';
		$data['title'] = 'Affiliate Withdraw';

$data['get_num_aff_income_withdrawal'] = $this->affiliate_dashboard_model->get_num_aff_income_withdrawal();

		$this->affiliatelayout('affiliate/withdraw',$data);
	}

	public function amount()
	{
echo $this->affiliate_dashboard_model->get_num_aff_income_withdrawal();
	}



	public function get_list_withdraw()
	{
echo $this->affiliate_withdraw_model->get_list_withdraw();

	}


public function update()
	{
		$datajson =  json_decode(file_get_contents("php://input"),true);
if(!isset($datajson)){
exit();
}

if($this->affiliate_dashboard_model->get_num_aff_income_withdrawal() >= 500)
{
$data['bankaccount'] = $datajson['bankaccount'];
$data['amount'] = $this->affiliate_dashboard_model->get_num_aff_income_withdrawal();
$this->affiliate_withdraw_model->update($data);
}else{
	echo 'cannot';
}


	}




}
