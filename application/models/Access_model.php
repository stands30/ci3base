<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Eye View Design CMS module Ajax Model
 *
 * PHP version 5
 *
 * @category  CodeIgniter
 * @package   EVD CMS
 * @author    Frederico Carvalho
 * @copyright 2008 Mentes 100Limites
 * @version   0.1
*/

class Access_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



   


        public function getMenu()
    {
        
        $sql ="select distinct menu_master.mnu_name,mnu_icon,menu_master.mnu_id,menu_master.mnu_link from menu_master left join  menu_transaction on menu_master.mnu_id=menu_transaction.mtr_mnu_id  where menu_transaction.mtr_dpt_id ='".$this->session->userdata('trgn_prs_dpt_id')."' and menu_master.mnu_status='Y' and menu_transaction.mtr_Status='Y'  order by menu_master.mnu_order";

        
    
        $result=$this->db->query($sql);
        return $result;
    }


    public function getsubmenu($mnu_id)
    {
       
         $sql = "select * from sub_menu_master where sbm_Status='Y' and sbm_group='submenu' and sbm_mnu_id=".$mnu_id." and sbm_parent_id=".$mnu_id." and sbm_id in (select fma_sbm_id from form_access where fma_Status='Y' and fma_access='1'  and fma_prs_id='".$this->session->userdata('trgn_prs_id')."' and fma_mnu_id='".$mnu_id."') order by sbm_order";

        $result=$this->db->query($sql);
        return $result;
    }


    function getpages($pageid,$moduleid)
    {
         $sql="select sbm_mnu_id,sbm_pagelink as form_name,sbm_name as form_title,SUBSTRING_INDEX(sbm_name,'(',-1) as pgname from sub_menu_master where sbm_Status='Y' and sbm_group='submenu' and sbm_mnu_id='".$moduleid."' and sbm_id in (select fma_sbm_id from form_access where fma_Status='Y' and fma_access='1' and fma_prs_id='".$this->session->userdata('trgn_prs_id')."' and sbm_parent_id='".$pageid."' and fma_mnu_id='".$moduleid."') order by SUBSTRING_INDEX(sbm_name,'(',-1)";
        $result=$this->db->query($sql);
        return $result;
    }

    public function recentlocationList($value='')
    {
         global $active_status; 
        $sql="SELECT `loc_id`, `loc_name`, `loc_lat`, `loc_long`, `loc_crtd_by`, `loc_crtd_dt`, `loc_updt_by`, `loc_updt_dt`, `loc_last_ip` FROM `location` where loc_id in (select prs_location from person where prs_cus_id = ".$this->session->userdata('prs_cus_id')." ) order by loc_id  limit 4 ";
        $query =$this->db->query($sql);
        $result =$query->result();
        return $result;
    }

    public function recentlocationcount($prs_location='')
    {
         global $active_status; 
        $sql="select count(1) as count FROM person
            where prs_location =".$prs_location."  ";
        $query =$this->db->query($sql);
        $row =$query->row();
        return $row->count;
    }

     public function recenttagList($value='')
    {
         global $active_status; 
        $sql="SELECT `tag_id`, `tag_name`, `tag_cus_id`, `tag_status`, `tag_crdt_by`, `tag_crdt_date`, `tag_updt_by`, `tag_updt_dt` FROM `tag_master`,favorite where favorite.fav_tag_id = tag_master.tag_id and tag_cus_id = ".$this->session->userdata('prs_cus_id')." order by tag_id  limit 4 ";
        $query =$this->db->query($sql);
        $result =$query->result();
        return $result;
    }

    public function recenttagcount($prs_location='')
    {
         global $active_status; 
        $sql="select count(1) as count FROM person
            where prs_location =".$prs_location."  ";
        $query =$this->db->query($sql);
        $row =$query->row();
        return $row->count;
    }



 public function departmenubyid($mtr_dpt_id='')
    {
    $sql ="select * from  menu_transaction left join department on department.DPT_id=menu_transaction.mtr_dpt_id left join menu_master on menu_master.mnu_id=menu_transaction.mtr_mnu_id where MTR_Status='Y' and mtr_dpt_id =".$mtr_dpt_id." order by DPT_name ";
    $query = $this->db->query($sql);
    $result =$query->result();
   return $result;
    }

    public function getDPTMenu($mtr_dpt_id)
  {
    
    $sql = "select mnu_id as f1,mnu_name as f2 from menu_master where mnu_status='Y'
    and mnu_id Not In (select menu_transaction.mtr_mnu_id FROM menu_transaction where menu_transaction.mtr_dpt_id =".$mtr_dpt_id.")
    order by f2";
    $res = $this->db->query($sql);
    return $res->result();
  }

  public function getParentMenu($mnu_id='')
  {
      $sql = "select mnu_id as f1,CONCAT_WS(' - ','Menu',mnu_name)  as f2 from menu_master where mnu_status='Y' and mnu_id =".$mnu_id."
                                                      union
                                                      select sbm_id as f1,CONCAT_WS(' - ','Submenu',sbm_name)  as f2 from sub_menu_master where sbm_status='Y' and sbm_mnu_id = ".$mnu_id."
                                                     order by f2
                                                     ";
    $res = $this->db->query($sql);
    return $res->result();
  }




	}
?>