<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Bsn_prm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->load->model('Person_model');		
	}
	public function index($value='')
	{
		$sql ="SELECT `bpm_id`, `bpm_name`, `bpm_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`, `bpm_updt_by`, `bpm_last_ip` FROM `bsn_prm`  ";
		$query = $this->db->query($sql);
   	$result = $query->result();


     $data['candidate_alt_mobiles']=$result;
     $data['req_skill_cnt']=count($result);
        if ($result === NULL) {
             $data['somedata'] = 'null';
             
        } else {
             // We trust our model, pass it along.
             $data['somedata'] = json_encode($result);
              
        }



		$this->load->view('bsn_prm',$data);
	}
	public function requirement_update($value='')
	{
     $theValue_skill=$this->input->post('theValue_skill');

       $bpm_id=explode(',', $this->input->post('bpm_id'));
       $bpm_name=explode(',', $this->input->post('bpm_name'));
       $bpm_value=  explode(',',  $this->input->post('bpm_value'));
    
       $skltrim =  rtrim($this->input->post('bpm_id'), ',');

    //  echo $skltrim;

       if(!empty($skltrim))       
                  {
                    //echo "string";
                    $sql="delete from bsn_prm where bpm_id NOT IN (".rtrim($this->input->post('bpm_id'), ',').") ";
                    $query=$this->db->query($sql);
                  }
                 else
                  {
                   // echo "string1234";
                    $skl_ext=0;
                    $sql="delete from bsn_prm where bpm_id NOT IN (".$skl_ext.")  ";
                    $query=$this->db->query($sql);
                  }

     
   
    

    for($j=0; $j<$theValue_skill+1; $j++)
    {

      if ($bpm_id[$j]!='')
      {
         if($bpm_name[$j]!='' && $bpm_value[$j]!='')
      {
        //echo "stringif";
       $data=array(
        'bpm_name'=>$bpm_name[$j],
        'bpm_value'=>$bpm_value[$j],
        'bpm_updt_by'=>$this->session->userdata('trgn_prs_id'));
      // print_r($data);
     
     $this->db->where('bpm_id',$bpm_id[$j]);
     $this->db->update('bsn_prm', $data);
     }
      }
      else
      {
         if($bpm_name[$j]!='' && $bpm_value[$j]!='')
      {
          //echo "stringelseif";
        $data=array(
        'bpm_name'=>$bpm_name[$j],
        'bpm_value'=>$bpm_value[$j],
        'bpm_crtd_dt'=>date('Y-m-d H:i:s'),
        
        'bpm_crtd_by'=>$this->session->userdata('trgn_prs_id'));
         //print_r($data);
        $bpm_id = $this->Home_model->insert('bsn_prm', $data); 

    
     }

      }

   }
 echo json_encode(array("success"=>true,"message"=>'Requirement has been Updated successfully'));
  }


	   

}
