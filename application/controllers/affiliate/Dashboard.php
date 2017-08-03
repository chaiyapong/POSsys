<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('affiliate/affiliate_dashboard_model');

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

		$data['tab'] = 'dashboard';
		$data['title'] = 'Affiliate Dashboard';


$data['get_num_owner_status_yes'] = $this->affiliate_dashboard_model->get_num_owner_status_yes();
$data['get_num_aff_income_withdrawal'] = $this->affiliate_dashboard_model->get_num_aff_income_withdrawal();
$data['get_num_aff_income_all'] = $this->affiliate_dashboard_model->get_num_aff_income_all();
$data['get_num_owner_all'] = $this->affiliate_dashboard_model->get_num_owner_all();

		$this->affiliatelayout('affiliate/dashboard',$data);
	}


	public function get_list_owner()
	{
echo $this->affiliate_dashboard_model->get_list_owner();

	}





}
