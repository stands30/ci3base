<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	controller name always in small latter,

*/

class Submenu_master extends CI_Controller {
	/*
	for load any model we use __construct function

	*/

		public function __construct()
    {
         parent::__construct();
        // $this->load->model('department_access_model');
    }

    /*  index function call bydefault when we write maincontroller */
	public function index()
	{
		
		$sql ="SELECT `sbm_id`, `sbm_mnu_id`, `sbm_name`, `sbm_pagelink`, `sbm_parent_id`, `sbm_order`, `sbm_group`, `sbm_status`,
				(SELECT `mnu_name` FROM `menu_master` WHERE mnu_id=sbm_parent_id  ) as menu_name,
				(SELECT `sbm_name` FROM `sub_menu_master` as sbmenu WHERE sbmenu.sbm_id=sub_menu_master.sbm_parent_id  ) as submenu_name FROM `sub_menu_master` 
				WHERE  sub_menu_master.sbm_status='Y' order by sbm_order";
		$query = $this->db->query($sql);
		$result =$query->result();
		$data['sub_menu_master'] = $result;

		$this->load->view('sub_menu_master',$data);
	
	}
	public function editsubmenu_master($value='')
	{
		$sql="SELECT `sbm_id`, `sbm_mnu_id`, `sbm_name`, `sbm_pagelink`, `sbm_parent_id`, `sbm_order`, `sbm_group`, `sbm_status`
          FROM `sub_menu_master` where sbm_id=".$this->input->post('sbm_id')."";
    $result=$this->db->query($sql);

    foreach ($result->result() as $row)
    {
      foreach($row as $kk => $vv)
      {
        echo $vv."##";
      }
    }
	}

	public function submenuinserts()
	{
		
			

			if ($this->input->post('sbm_id') == "") {
				$data1 = array(
			        'sbm_name'=>$this->input->post('sbm_name'),
			        'sbm_mnu_id'=>$this->input->post('sbm_mnu_id'),
			         'sbm_parent_id'=>$this->input->post('sbm_parent_id'),
			        'sbm_order'=>$this->input->post('sbm_order'),
			        'sbm_pagelink'=>$this->input->post('sbm_pagelink'),
			        'sbm_crtd_by '=>$this->session->userdata('trgn_prs_id'),
			        'sbm_group'=>$this->input->post('sbm_group'),
			        'sbm_crtd_date'=>date('Y-m-d')
			         );
				$BLP_BLO_ID =  $this->Home_model->insert('sub_menu_master', $data1);
				echo json_encode(array("success"=>true,"message"=>"Save Successfully"));
			}else{
				$data1 = array(
				        'sbm_name'=>$this->input->post('sbm_name'),
				        'sbm_mnu_id'=>$this->input->post('sbm_mnu_id'),
				        'sbm_parent_id'=>$this->input->post('sbm_parent_id'),
				        'sbm_order'=>$this->input->post('sbm_order'),
				        'sbm_pagelink'=>$this->input->post('sbm_pagelink'),
				        'sbm_updt_by '=>$this->session->userdata('trgn_prs_id'),
				        
				         );
				$this->Home_model->update('sbm_id',$this->input->post('sbm_id'), $data1, 'sub_menu_master');
				echo json_encode(array("success"=>true,"message"=>"Update Successfully"));
			}
	   
			 	
       
  
}

public function ajax_call_parent_menu()
	{
		//echo "string";
		$res = $this->Access_model->getParentMenu($_POST['mnu_id']);
		print $this->Home_model->ajaxCombo($res);
	}

	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */