<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	controller name always in small latter,

*/

class Department extends CI_Controller {
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
		
		$sql ="SELECT `dpt_id`, `dpt_name`, `dpt_head_id`, `dpt_parent_id`, `dpt_status`, `dpt_crtd_by`, `dpt_crtd_date`, `dpt_updt_by`, `dpt_updt_date` FROM `department` WHERE  department.dpt_status='Y' order by dpt_name";
		$query = $this->db->query($sql);
		$result =$query->result();
		$data['department'] = $result;

		$this->load->view('department_master',$data);
	
	}
	public function editdepartment($value='')
	{
		$sql="SELECT dpt_id,dpt_name, `dpt_head_id`, `dpt_parent_id`, `dpt_status`
          FROM `department` where dpt_id=".$this->input->post('dpt_id')."";
    $result=$this->db->query($sql);

    foreach ($result->result() as $row)
    {
      foreach($row as $kk => $vv)
      {
        echo $vv."##";
      }
    }
	}

	public function modelinserts()
	{
		
			

			if ($this->input->post('dpt_id') == "") {
				$data1 = array(
			        'dpt_name'=>$this->input->post('dpt_name'),
			        'dpt_crtd_by '=>$this->session->userdata('trgn_prs_id'),
			        'dpt_crtd_date'=>date('Y-m-d')
			         );
				$BLP_BLO_ID =  $this->Home_model->insert('department', $data1);
				echo json_encode(array("success"=>true,"message"=>"Save Successfully"));
			}else{
				$data1 = array(
				        'dpt_name'=>$this->input->post('dpt_name'),
				        'dpt_updt_by '=>$this->session->userdata('trgn_prs_id'),
				        
				         );
				$this->Home_model->update('dpt_id',$this->input->post('dpt_id'), $data1, 'department');
				echo json_encode(array("success"=>true,"message"=>"Update Successfully"));
			}
	   
			 	
       
  
}

	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */