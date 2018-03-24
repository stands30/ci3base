<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends CI_Model 
{
	function __construct()
    {

        parent::__construct();
    }


    public function getUserdataForLogin($prs_username,$prs_password)
    {

     if(is_numeric ($prs_username))
     {
        $column_name='prs_mob';
    }elseif (filter_var($prs_username, FILTER_VALIDATE_EMAIL)) {
      
      $column_name = "prs_email"; 
    
    }
    else
    {
        $column_name='prs_code';
    }

  $old_encrypt = openssl_encrypt($prs_password,CIPHER,KEY);
  $new_encrypt = $this->url_encrypt->encrypt_openssl(trim($prs_password),CIPHER,KEY);
    $sql1="SELECT `prs_id`, `prs_name`, `prs_mob`, `prs_email`, prs_dpt_id FROM `person` WHERE  ". $column_name."='".$prs_username."' and prs_password='".$old_encrypt."' and  prs_status='".ACTIVE_STATUS."'  ";
    log_message('nexlog','getUserdataForLogin >> '.$sql1);
    $query1 =$this->db->query($sql1);

    return $query1->row();

}
}
