<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {



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
		


if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='0'){

$data['tab'] = 'deshboard';
$data['title'] = 'POS - หน้าจัดการ';
		$this->deshboardlayout('deshboard/deshboard',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='1'){

$data['tab'] = 'deshboard';
$data['title'] = 'ร้านอาหาร - หน้าจัดการ';
		$this->deshboardlayout('deshboard/food',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='2'){

$data['tab'] = 'deshboard';
$data['title'] = 'เช่าที่พัก - หน้าจัดการ';
		$this->deshboardlayout('deshboard/apartment',$data);

}else{
	header("Location: ".$this->base_url."/login");
		$data['title'] = 'C2M ระบบพัฒนาธุรกิจและการค้าขาย';
		$this->weblayout('webbody/home',$data);
	}





	}
}
