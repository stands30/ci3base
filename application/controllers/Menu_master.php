<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	controller name always in small latter,

*/

class Menu_master extends CI_Controller {
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
		
		$sql ="SELECT `mnu_id`, `mnu_name`, `mnu_order`, `mnu_status`, `mnu_link`, `mnu_icon`, `mnu_crtd_by`, `mnu_crtd_date`, `mnu_updt_by`, `mnu_updt_date` FROM `menu_master` WHERE   menu_master.mnu_status='Y' order by mnu_order";
		$query = $this->db->query($sql);
		$result =$query->result();
		$data['menu_master'] = $result;

		$this->load->view('menu_master',$data);
	
	}
	public function editmenu_master($value='')
	{
		$sql="SELECT `mnu_id`, `mnu_name`, `mnu_order`, `mnu_link`, `mnu_icon`, `mnu_status`
          FROM `menu_master` where mnu_id=".$this->input->post('mnu_id')."";
    $result=$this->db->query($sql);

    foreach ($result->result() as $row)
    {
      foreach($row as $kk => $vv)
      {
        echo $vv."##";
      }
    }
	}

	public function menuinserts()
	{
		
			

			if ($this->input->post('mnu_id') == "") {
				$data1 = array(
			        'mnu_name'=>$this->input->post('mnu_name'),
			        'mnu_order'=>$this->input->post('mnu_order'),
			        'mnu_link'=>$this->input->post('mnu_link'),
			        'mnu_icon'=>$this->input->post('mnu_icon'),
			        'mnu_crtd_by '=>$this->session->userdata('trgn_prs_id'),
			        'mnu_crtd_date'=>date('Y-m-d')
			         );
				$BLP_BLO_ID =  $this->Home_model->insert('menu_master', $data1);
				echo json_encode(array("success"=>true,"message"=>"Save Successfully"));
			}else{
				$data1 = array(
				        'mnu_name'=>$this->input->post('mnu_name'),
				        'mnu_order'=>$this->input->post('mnu_order'),
				        'mnu_link'=>$this->input->post('mnu_link'),
				        'mnu_icon'=>$this->input->post('mnu_icon'),
				        'mnu_updt_by '=>$this->session->userdata('trgn_prs_id'),
				        
				         );
				$this->Home_model->update('mnu_id',$this->input->post('mnu_id'), $data1, 'menu_master');
				echo json_encode(array("success"=>true,"message"=>"Update Successfully"));
			}
	   
			 	
       
  
}

	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */