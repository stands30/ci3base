<?php

class Form_access extends CI_Controller { 

	public function __construct()
    {
         parent::__construct();
         
		$this->load->model('Form_access_model');
    }
	
	function index()
	{
		$this->load->view('form_access');
	}
	
	function det($USR)
	{
		//$this->Home_model->add_usage('','','','');
		//$res=$this->Form_access_model->display_class_access($USR);
		
			$res=$this->Form_access_model->display_access($USR);
		echo $res;
		
		
	}
	
	function update()
	{
		//$this->Home_model->add_usage('','','','');
		$res=$this->Form_access_model->change_access();
		$res=$this->Form_access_model->display_access($_REQUEST['USR_id']);
		echo $res."@".$_REQUEST['mod'];;
	}
}
?>