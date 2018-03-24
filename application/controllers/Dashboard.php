<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Person_model');		
	}
	public function dashboardView($value='')
	{
               if($this->session->userdata('trgn_prs_dpt_id') == DELEGATE_DEPARTMENT)
              {
                redirect(base_url('delegate-profile'));
              }
              else 
              {
		$this->nextasy->push_breadcrumb('Home');
		$data['breadcrumb'] = $this->nextasy->get_breadcrumb();
		$this->load->view('dashboard',$data);
              }
	}
}
