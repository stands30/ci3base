<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	controller name always in small latter,

*/

class Department_access extends CI_Controller {
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
		
		$sql ="select department.*,user.*,parent_deprt.dpt_name as parent_department from  department left join user on user.USR_id=department.DPT_head_id left join department as parent_deprt on parent_deprt.DPT_parent_id=department.dpt_id  where department.dpt_status='Y' order by dpt_name";
		$query = $this->db->query($sql);
		$result =$query->result();
		$data['department'] = $result;

		$this->load->view('department_access',$data);
	
	}

	public function modelinserts()
	{
		
			$data1 = array(
        'mtr_mnu_id' => $this->input->post('mtr_mnu_id'),
        'mtr_dpt_id'=>$this->input->post('mtr_dpt_id')
         );

	   $BLP_BLO_ID =  $this->Home_model->insert('menu_transaction', $data1);
			 	
       echo json_encode(array("success"=>true,"message"=>"Save Successfully"));
  
}
public function ajax_call_MTR()
	{
		//echo "string";
		$res = $this->Access_model->getDPTMenu($_POST['mtr_dpt_id']);
		print $this->Home_model->ajaxCombo($res);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */