<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Person_model');		
	}


	public function index()
	{


		if(isset($_SERVER['HTTP_REFERER']))
		{
			$data['ref']= $_SERVER['HTTP_REFERER'];	
		}
		else
		{
			$data['ref']= base_url().'dashboard';
		}
		if(isset($_COOKIE['trgn_prs_username']) && isset($_COOKIE['trgn_prs_password']))
		{
			
			$pos = strrpos($data['ref'], '/');
			$last = $pos === false ? $data['ref'] : substr($data['ref'], $pos + 1);
			if($last==base_url() || $last=='logout')
			{
				$data['ref']=base_url().'dashboard';

			}

			$person_data = $this->Person_model->getUserdataForLogin($_COOKIE['trgn_prs_username'],$_COOKIE['trgn_prs_password']);
			if(!empty($person_data))
			{
				$newdata = array(

					'trgn_prs_id' => $person_data->prs_id,
					'trgn_prs_name'  => $person_data->prs_name,
					'trgn_prs_email'  => $person_data->prs_email,
					'trgn_prs_mob'  => $person_data->prs_mob,
					'trgn_prs_dpt_id' => $person_data->prs_dpt_id,
					'is_logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);

				redirect($data['ref']);
			}
			else
			{
				$this->load->view('login',$data);
			}
		}
		else
		{
			$this->load->view('login',$data);
		}


		
	}
	public function loginUser()
	{


		$ref=$this->input->post('ref');
		$pos = strrpos($ref, '/');
		$last = $pos === false ? $ref : substr($ref, $pos + 1);
		if($last==base_url() || $last=='logout')
		{
			$ref=base_url().'dashboard';

		}

		$person_data = $this->Person_model->getUserdataForLogin($this->input->post('prs_username'),$this->input->post('prs_password'));

		if(!empty($person_data))
		{
			$newdata = array(

				    'trgn_prs_id' => $person_data->prs_id,
					'trgn_prs_name'  => $person_data->prs_name,
					'trgn_prs_email'  => $person_data->prs_email,
					'trgn_prs_mob'  => $person_data->prs_mob,
					'trgn_prs_dpt_id' => $person_data->prs_dpt_id,
					'is_logged_in' => TRUE
			);

			$this->session->set_userdata($newdata);
			
			if($this->input->post('rememberme')==1)
			{
			setcookie('trgn_prs_username', $this->input->post('prs_username'), time() + (3600*24*30*12*10), '/'); //  3600 days
			setcookie('trgn_prs_password', $this->input->post('prs_password'), time() + (3600*24*30*12*10), '/'); //  3600 days
		}
		
		echo json_encode(array("success"=>true,'linkn'=>$ref));
	}
	else
	{
		echo json_encode(array("success"=>false));
	}


}

public function logout()
{
	
$newdata = array(
		'trgn_prs_id'=>'',
		'trgn_prs_name'=> '',
		'trgn_prs_email'=> '',
		'trgn_prs_mob'=> '',
		'trgn_prs_dpt_id'=>'',
		'is_logged_in' => False
	);

	$this->session->unset_userdata($newdata);
	$this->session->sess_destroy();
	if(isset($_COOKIE['trgn_prs_username']) && isset($_COOKIE['trgn_prs_password']))
	{
		delete_cookie('trgn_prs_username');
			delete_cookie('trgn_prs_password');  
		}


	 redirect('', 'refresh');
}

}
