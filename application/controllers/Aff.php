<?php
class Aff extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        // set form validation rules
if(isset($_GET['i'])){ 

if(isset($_GET['t'])){
$tag = $_GET['t'];
}else{
 $tag = '';  
}

$newdata = array(
        'aff_i' => $_GET['i'],
        'aff_tag' => $tag
);

$this->session->set_userdata($newdata);
header( "location: ".$this->base_url."/" );
}else{
header( "location: ".$this->base_url."/" );
}

        
    }
}