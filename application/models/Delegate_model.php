<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Delegate_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
	
	
   public function delegate_insert($prs_id,$dgt_data)
   {
    	$dgt_data = array();
    	$dgt_data['dgt_clb_id']   = $dgt_data->dgt_clb_id;
     	$dgt_data['dgt_bdg_name'] = $dgt_data->dgt_bdg_name;
    	$dgt_data['dgt_cat_id']   = $dgt_data->dgt_cat_id;
    	$dgt_data['dgt_prs_id']   = $prs_id;
    	$dgt_data['dgt_dgt_id']   = $dgt_data->dgt_prs_id;
    	$dgt_data['dgt_status']   = ACTIVE_STATUS;
    	$dgt_data['dgt_crtd_dt']  = date('Y-m-d H:i:s');
    	$dgt_data['dgt_crtd_by']  = $this->session->userdata('trgn_prs_id');

    	$dgt_id = $this->Home_model->insert('delegate', $dgt_data);

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
            $code =$clb_prefix.$cat_name.$prs_id.$this->Home_model->generateRandomStringNum(4);
         //******** CODE GENERATOR ***********//
            $prs_data_update = array();
            $prs_data_update['prs_code']   = $code;
            $dgt_prs_id = $this->Home_model->update('prs_id',$prs_id ,$prs_data_update,'person' );
         //******** CODE GENERATOR ***********//
         //******** QR CODE GENERATOR ***********//
            $qr_code=$this->generateQrCode($code);
            $dgt_data_update = array();
            $dgt_data_update['dgt_qr_code']   = $qr_code;
            $dgt_data_id = $this->Home_model->update('dgt_id',$dgt_id ,$dgt_data_update,'delegate' );
         //******** QR CODE GENERATOR ***********//
            return $dgt_id;

   }
   public function getDelegate()
   {
    $sql = "SELECT *,(SELECT gnp_name from gen_prm where gnp_status='".ACTIVE_STATUS."' and gnp_group='".DELEGATE_GEN_PRM."' and gnp_value=dgt_cat_id) cat_name,
              (SELECT clb_name from club_master where clb_status='".ACTIVE_STATUS."' and clb_id=dgt_clb_id ) clb_name
            from delegate LEFT JOIN person on prs_id=dgt_prs_id where dgt_status='".ACTIVE_STATUS."'  ";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
   }
      public function getDelegateByCol($col,$value)
   {
    $sql = "SELECT *,(SELECT gnp_name from gen_prm where gnp_status='".ACTIVE_STATUS."' and gnp_group='".DELEGATE_GEN_PRM."' and gnp_value=dgt_cat_id) cat_name,
              (SELECT clb_name from club_master where clb_status='".ACTIVE_STATUS."' and clb_id=dgt_clb_id ) clb_name,
            from delegate LEFT JOIN person on prs_id=dgt_prs_id where dgt_status='".ACTIVE_STATUS."' and ".$col."='".$value."' ";
    $query = $this->db->query($sql);
    $row = $query->row();
    return $row;
   }
.      public function generateQrCode($code)
    {
        $img_url="";
        log_message('nexlog','generateQrCode >> FCPATH :'.FCPATH.' code : '.$code);
        if($code != "")
        {
            $this->load->library('ciqrcode');
            $qr_image=$code.'.png';
            $params['data'] = $code;
            $params['level'] = 'H';
            $params['size'] = 8;
            $params['savename'] =FCPATH.DELEGATE_QR_CODE_PATH.$qr_image;
            if($this->ciqrcode->generate($params))
            {
                $img_url=$qr_image; 
            }
        }
        return $img_url;
    }
          public function getDelegateByQrCode($dgt_code)
   {
    $sql = "SELECT *,(SELECT gnp_name from gen_prm where gnp_status='".ACTIVE_STATUS."' and gnp_group='".DELEGATE_GEN_PRM."' and gnp_value=dgt_cat_id) cat_name,
              (SELECT clb_name from club_master where clb_status='".ACTIVE_STATUS."' and clb_id=dgt_clb_id ) clb_name,
              (SELECT prs_name from person where prs_id=(SELECT dgt_prs_id from person where dgt_id=dgt_prs_id)) dgt_dgt_name
            from delegate LEFT JOIN person on prs_id=dgt_prs_id where dgt_status='".ACTIVE_STATUS."' and prs_code='".$dgt_code."' ";
    $query = $this->db->query($sql);
    $row = $query->row();
    return $row;
   }
}

?>