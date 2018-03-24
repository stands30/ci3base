<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delegate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Delegate_model');	
		$this->load->model('Home_model');		
	}


	public function index()
	{ 
		$this->nextasy->push_breadcrumb('Home','dashboard');
		$this->nextasy->push_breadcrumb('Delegate List');
                $data['breadcrumb'] = $this->nextasy->get_breadcrumb();
		$data['delegate'] = $this->Delegate_model->getDelegate();
		$this->load->view('delegate_list',$data);
    }
    public function delegate_add()
    {
    	$this->nextasy->push_breadcrumb('Home','dashboard');
		$data['breadcrumb'] = $this->nextasy->get_breadcrumb();
		$this->load->view('delegate_add',$data);
    }
        public function delegate_insert()
    {
    	log_message('nexlog','delegate_insert >> ');
    	$this->db->trans_start();
    	$prs_data = array();
        // print_r($_POST);
        $dgt_data = json_decode(file_get_contents("php://input"));
        echo 'clb_id :'.$this->input->post('dgt_clb_id');
        // print_r($dgt_data);
    	 //**************** Person slug generation process starts *******************//
            $slug = $dgt_data->prs_name.'-'.$this->Home_model->generateRandomStringNum(4);
            $prs_slug = url_title($slug, 'dash', TRUE); 
            //**************** Person slug generation process ends *******************//

            //****************Delegatae Code generation process starts *******************//
            $clb_data = getClubDetails($dgt_data->dgt_clb_id);
            if(!empty($clb_data))
            {
            	$clb_prefix = $clb_data->clb_prefix;
            }
            else
            {
            	$clb_prefix ='';
            }
            
            $cat_data = getGenPrmName($dgt_data->dgt_cat_id,DELEGATE_GEN_PRM);
            if(!empty($cat_data))
            {
            	$cat_name = $cat_data;
            }
            else
            {
            	$cat_name = '';
            }
            $start_prefix =$clb_prefix.$cat_name;
            log_message('nexlog','start_prefix : '.$start_prefix);
             $dgt_code =$start_prefix.code_gen($start_prefix,$this->Home_model->generateRandomStringNum(4));
            log_message('nexlog','elegatae Code :'.$dgt_code);
            $prs_slug = url_title($slug, 'dash', TRUE); 
            //****************Delegatae Code generation process ends *******************//

            //**************** Person data start *******************//
    	$prs_data['prs_slug']     = $prs_slug;
        $prs_data['prs_name']     = trim($dgt_data->prs_name);
    	$prs_data['prs_code']     = $this->Home_model->generateRandomStringNum(4);
        $prs_data['prs_dpt_id']   = DELEGATE_DEPARTMENT;
    	$prs_data['prs_mob']      = $dgt_data->prs_mob;
    	$prs_data['prs_email']    = $dgt_data->prs_email;
    	$prs_data['prs_password'] = $this->url_encrypt->encrypt_openssl($dgt_data->prs_password);
    	$prs_data['prs_status']   = ACTIVE_STATUS;
    	$prs_data['prs_crtd_dt']  = date('Y-m-d H:i:s');
    	$prs_data['prs_crtd_by']  = $this->session->userdata('trgn_prs_id');

    	 $prs_id = $this->Home_model->insert('person', $prs_data);

            //**************** Person data start *******************//
    	$dgt_id = $this->Delegate_model->delegate_insert($prs_id,$dgt_data);
        $dgt_encrypt_id =$this->url_encrypt->encrypt_openssl($dgt_id);
        if($dgt_id != '-1')
        {
            echo json_encode(array('success'=>true,'message'=>'Delegate Added Successfully','linkn'=>base_url('delegate-detail-'.$dgt_encrypt_id)));
        }
        else
        {
            echo json_encode(array('success'=>false,'message'=>'Some error occured'));
        }
    	$this->db->trans_complete();
    	log_message('nexlog','delegate_insert << ');

    }
        public function delegate_detail($id=" ")
    {
        $dgt_id =$this->url_encrypt->decrypt_openssl($id);
        $col = 'dgt_id';
        $this->nextasy->push_breadcrumb('Delegate List');
        $this->nextasy->push_breadcrumb('Home','dashboard');
        $data['breadcrumb'] = $this->nextasy->get_breadcrumb();
        $data['delegate'] = $this->Delegate_model->getDelegateByCol($col,$dgt_id);
        $this->load->view('delegate_detail',$data);
    }
    public function id_scanner()
    {
        $this->nextasy->push_breadcrumb('Home','dashboard');
        $data['breadcrumb'] = $this->nextasy->get_breadcrumb();
        $this->load->view('delegate_id_scanner',$data);
    }
        public function getDetailsByQrCode()
    {
        $dgt_code = $this->input->post('dgt_code');
        if($dgt_code != '')
        {
            $delegate = $this->Delegate_model->getDelegateByQrCode($dgt_code);
        $msg = " <table class='table table-bordered table-responsive' > <tr> <td> Code </td> <td> ".$delegate->prs_code." </td> <td>Badge Name</td> <td> ".$delegate->dgt_bdg_name." </td> <td>Name</td> <td> ".$delegate->prs_name." </td></tr> <tr> <td>Club</td> <td> ".$delegate->clb_name." </td> <td>Category</td> <td> ".$delegate->cat_name." </td> <td>Mobile</td> <td> ".$delegate->prs_mob." </td> </tr> <tr>   <td>Email</td>  <td> ".$delegate->prs_email." </td>";
              if( $delegate->dgt_dgt_name != '') { 
        $msg.=" <td>Delegate</td> <td> ".$delegate->dgt_dgt_name." </td>";
                } 
        $msg.=" </tr> <tr>";
               if( $delegate->dgt_qr_code != '') { 
        $msg.=" <td>Qr Code</td> <td><a href='".base_url().DELEGATE_QR_CODE_PATH.$delegate->dgt_qr_code."'  download=''><img src='".base_url().DELEGATE_QR_CODE_PATH.$delegate->dgt_qr_code."' ></a></td>";
                 } 
        $msg.=" </tr> </table>";
        }
        else
        {
            $msg = " " ;
        }
        // echo '<< '.$msg.'>>';

        echo json_encode(array('success'=>true,'message'=>$msg));
    }
            public function delegate_profile()
    {
        $this->nextasy->push_breadcrumb('Home','dashboard');
        $dgt_id =$this->session->userdata('trgn_prs_id');
        $col = 'dgt_prs_id';
        $data['breadcrumb'] = $this->nextasy->get_breadcrumb();
        $data['delegate'] = $this->Delegate_model->getDelegateByCol($col,$dgt_id);
        $this->load->view('delegate_detail',$data);
    }
}
