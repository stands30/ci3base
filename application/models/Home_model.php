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

class Home_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
	
	function getCombo($sql,$value=false)
	{

		$query=$this->db->query($sql);
		$str='<option value="0">Please Select </option>';
		foreach($query->result() as $row)
		{
			$selected="";
			if($value)
			{
				if($value==$row->f1)
				{
					$selected=" selected='selected'";
				}
			}
			$str.="<option value= ".$row->f1." ".$selected.">".$row->f2."</option>";
		}

		return $str;
	}
	public function getCombonew($sql,$value=false)
	{
		$query=$this->db->query($sql);
		$str='';
		foreach($query->result() as $row)
		{
			$selected="";
			if($value)
			{
				$sql="SELECT `sbm_id`, `sbm_mnu_id`, `sbm_name`, `sbm_pagelink`, `sbm_parent_id`, `sbm_order`, `sbm_group`, `sbm_status`
          			FROM `sub_menu_master` where sbm_id=".$row->f1."";
			    $result=$this->db->query($sql);
			    $row1 =$query->row();
    				if ($row1->sbm_pagelink == "") {
    					$type == 'submenu';
    				}else{
    					$type == 'menu';
    				}
				if($value==$row->f1 && $type==$row->f3  )
				{
					$selected=" selected='selected'";
				}
			}
			$str.="<option value= ".$row->f1." ".$selected.">".$row->f2."</option>";
		}

		return $str;
	}
function ajaxCombo($res){
		$str =""; //<option value=''>-- Please Select --</option>
		foreach($res as $row){
			$str.="<option value='".$row->f1."'>".$row->f2."</option>";
		}
		print $str;
	}
	

	function update($field, $id, $array, $table){
	//echo $id;
		$this->db->where($field, $id);
		$this->db->update($table, $array);
	}
	function insert($table, $array){
		$this->db->insert($table, $array);
		$id = $this->db->insert_id();
		return $id;
	}

	
	public function get_dropdown($gpm_group,$value=false)
	{

		$select =" gnp_value as f1,gnp_name as f2";
		$this->db->select($select);
		$this->db->where('gnp_group',$gpm_group);
		$this->db->where('gnp_status',ACTIVE_STATUS);
		$this->db->order_by('gnp_order','ASC');
		$query = $this->db->get('gen_prm');

		$str='';
		foreach ($query->result() as $row) {
	                   //print_r($row);
			$selected='';
			if($value)
			{
				if($value==$row->f1)
				{
					$selected='selected="selected"';
				}
			}

			$str .='<option value="'.$row->f1.'"'.$selected.'>'.$row->f2.'</option>';
		}
		return $str;

	}
	

	

	public function validateLocation($location)
	{
		if ($location !="" ) {
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location).'&sensor=false');
		$geo = json_decode($geo, true);
		if ($geo['status'] == 'OK')
		{
			$origLat = $geo['results'][0]['geometry']['location']['lat'];
			$origLon = $geo['results'][0]['geometry']['location']['lng'];

			$loc_id= $this->location($location,$origLat,$origLon);

			return $loc_id;
		}
		else
		{
			return INVALID_LOCATION;

		}
		}else{
			return 'false';
		}
		

	}

	public function location($location,$origLat,$origLon)
	{
		$sql="select  loc_id from location where  loc_lat='".$origLat."' and loc_long='".$origLon."' ";
		$query =$this->db->query($sql);
		$row =$query->row();

		if(!empty($row))
		{
			return $row->loc_id;
		}
		else
		{
			$data1 = array(
				'loc_name' => $location,
				'loc_long' => $origLon,
				'loc_lat' =>$origLat,
				'loc_crtd_dt' =>date('Y-m-d H:i:s'),

				);
			$this->db->insert('location', $data1);
			return $this->db->insert_id();
		}
	}
	
	 function dateinmysql($datefromuser='')
	{
		if (empty($datefromuser)) {
			return '0000-00-00';
		}
		else{
			$date = str_replace('/', '-', $datefromuser);
			return date('Y-m-d', strtotime($date));
		}
		
	} 

	 public function datefordisplay($datefromuser)
  {
    if ($datefromuser == "0000-00-00") {
      return $datevalue = "";
    }elseif($datefromuser == ""){
      return $datevalue = "";
    }else{

       $date = str_replace('-', '/', $datefromuser);
    $datevalue = date('d-M-y', strtotime($date));

      return $datevalue ;
    }
  }

  public function datetimefordisplay($datefromuser)
  {
    if ($datefromuser == "0000-00-00 00:00:00")
     {
      return $datevalue = "";
    }elseif($datefromuser == ""){
      return $datevalue = "";
    }else{
     
      $date = str_replace('-', '/', $datefromuser);
    $datevalue = date('d-M-Y h:i:A', strtotime($date));

      return $datevalue ;

    }
  }

   public function timefordisplay($datefromuser)
  {
    if ($datefromuser == "0000-00-00 00:00:00") {
      return $datevalue = "";
    }elseif($datefromuser == ""){
      return $datevalue = "";
    }elseif($datefromuser == "00:00:00"){
      return $datevalue = "";
    }else{
     
      $date = str_replace('-', '/', $datefromuser);
    $datevalue = date('h:i:A', strtotime($date));

      return $datevalue ;

    }
  }
	
	function generateRandomString($length) {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$randomNo = '';
		for ($i = 0; $i < $length; $i++) {
			$randomNo .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomNo;
	}


 function logo($type)
    {
        $logo = $this->db->get_where('ui_settings', array(
            'uis_type' => $type
        ))->row()->uis_value;
        return base_url() . 'public/logo_image/' . $logo . '.png';
    }
     function logoico($type)
    {
        $logo = $this->db->get_where('ui_settings', array(
            'uis_type' => $type
        ))->row()->uis_value;
        return base_url() . 'public/logo_image/' . $logo . '.ico';
    }

    public function createbyfordisplay($prs_crtd_by='')
    {
    	if ($prs_crtd_by == "0") {
      return $datevalue = "Unknown";
    }elseif($prs_crtd_by == ""){
      return $datevalue = "Unknown";
    }else{
     
	     $sql="select  prs_name  from person where  prs_id='".$prs_crtd_by."' ";
			$query =$this->db->query($sql);
			$row =$query->row();
	    	$datevalue =$row->prs_name ;

      return $datevalue ;

    }
    }



















	public function getCheckboxEdit($name,$gpm_group,$prp_id)
	{
		$sql='select gen_prm.gnp_name,gnp_value from gen_prm where gnp_value in (select pce_equipment_id from photographer_camera_equipments where  prt_property_id='.$prp_id.') and gen_prm.gpm_group="'.$gpm_group.'"';
		$query = $this->db->query($sql);

		$elements = array();
		foreach($query->result() as $key){
	                                                   // $string .= $key->LOC_id.',';
			$elements[] =$key->gnp_value;
		}
		$stringcat = implode(',', $elements);

		$group_array = explode(',',$stringcat);


		$select ="gnp_value as f1,gpm_id as id,gnp_name as f2";
		$this->db->select($select);
		$this->db->where('gpm_group',$gpm_group);
		$this->db->where('gpm_status',1);
		$this->db->order_by('gpp_order','ASC');
		$query = $this->db->get('gen_prm');
		$str='';
		foreach ($query->result() as $row) 
		{
			if(in_array($row->f1,$group_array)){


				$checked = 'checked';
			}else{
				$checked = '';
			}

			$str .='<div style="margin: 4px 0" class="col-md-3 col-xs-6">
			<label>
				<input type="checkbox"  '.$checked .' name="'.$name.'[]" value='.$row->f1.' id="'.$row->id.'"><span class="fa fa-check"></span>'.$row->f2.'      
			</label>
		</div>';


	}
	return $str;
}
function generateRandomOtp($length) 
{
	$characters = '123456789';
	$randomNo = '';
	for ($i = 0; $i < $length; $i++) {
		$randomNo .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomNo;
}
public function getFileName($name)
{

	$splitTimeStamp = explode(".",$name);
	$name = $splitTimeStamp[0];
	$ext = '.'.$splitTimeStamp[1];
	return  $name.'-'.$this->Home_model->generateRandomStringNum(4).$ext;

}
function generateRandomStringNum($length) {
	$characters = '0123456789';
	$randomNo = '';
	for ($i = 0; $i < $length; $i++) {
		$randomNo .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomNo;
}


public function getCheckbox($name,$gpm_group,$checked_values=false)
{
	$checked_data=explode(',', $checked_values);

	$select ="cat_id as f1,cat_name as f2";
	$this->db->select($select);
	$this->db->where('cat_status',ACTIVE);
	$this->db->order_by('cat_order','ASC');
	$query = $this->db->get('category');
	$str='';
	foreach ($query->result() as $row) 
	{  
		$checked = '';

		if($checked_values)
		{

			if(in_array($row->f1,$checked_data))
			{


				$checked = 'checked';
			}
			else{
				$checked = '';
			}
		}
		$str .='<div style="margin: 4px 0" class="col-md-6 col-xs-12"> <label class="mt-checkbox">
		<input type="checkbox"  '.$checked .' name="'.$name.'[]" value='.$row->f1.' id="'.$row->f1.'"><span></span>'.$row->f2.'      
	</label></div>
	';


}
return $str;

}
public function getEquipmentsCheckbox($name,$equipment_array)
{
	if(!empty($equipment_array))
	{
		$elements = array();
		foreach($equipment_array as $key)
		{
			$elements[] =$key->pge_equipment_id;
		}
		$stringcat = implode(',', $elements);
		$equipment_array_data = explode(',',$stringcat);
	}
	$select ="cme_id as f1,cme_name as f2";
	$this->db->select($select);
	$this->db->where('cme_status',ACTIVE);
	$this->db->order_by('cme_order','ASC');
	$query = $this->db->get('camera_equipments');
	$str='';
	foreach ($query->result() as $row) 
	{ 
		$checked = '';

		if(!empty($equipment_array))
		{

			if(in_array($row->f1,$equipment_array_data))
			{


				$checked = 'checked';
			}
			else{
				$checked = '';
			}
		} 

		$str .='<div style="margin: 4px 0" class="col-md-6 col-xs-12">  <label class="mt-checkbox">
		<input type="checkbox" onchange="return checkOther('.$row->f1.')"  '.$checked .' name="'.$name.'[]" value='.$row->f1.' id="inlineCheckbox'.$row->f1.'">
		'.$row->f2.'
		<span></span>      
	</label></div>
	';


}
return $str;

}
public function getBsnData($bpm_name)
{
	 $sql="SELECT 	* from  ui_settings where  uis_type='".$bpm_name."'";
		$query = $this->db->query($sql);
		$row=$query->row();
		if ($row->uis_field == 1) {
			return UI_IMAGE_PATH.$row->uis_value;
		}else{
			return $row->uis_value;
		}
		

}

public function getBsnData_old($bpm_name)
{
	 $sql="SELECT 	bpm_value from  bsn_prm where  bpm_name='".$bpm_name."'";
		$query = $this->db->query($sql);
		$row=$query->row();
		return $row->bpm_value;

}

    function moneyFormatIndia($num)
  {
    $explrestunits = "" ;
    if(strlen($num)>3){
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
  
}

?>