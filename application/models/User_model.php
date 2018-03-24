<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
   
     public function insert_user($slug,$loc_id)
    {
        
        $pwd=openssl_encrypt($this->input->post('prs_password'),CIPHER,KEY);

        
         $data = array(
         'prs_slug'=>$slug,
         'prs_dpt_id'=>$this->input->post('prs_department'),
         'prs_username'=>$this->input->post('prs_user_name'),
         'prs_name'=>$this->input->post('prs_name'),
         'prs_email'=>$this->input->post('prs_email'),
         'prs_mob'=>$this->input->post('prs_mob'),
         'prs_password'=>$pwd,
         'prs_status'=>USER_ACTIVE_STATUS,
         'prs_crtd_dt'=>date('Y-m-d H:i:s'),
         'prs_crtd_by'=>$this->session->userdata('trgn_prs_id'),
         'prs_address'=>$this->input->post('prs_address'),
         'prs_location'=>$loc_id
         );
            $prs_id=$this->Home_model->insert('person', $data);


             /*extra mobile no*/
                 $theValue_mobile=$this->input->post('theValue_mobile');
                    $prs_mobile_extra=  $this->input->post('prs_mobile_extra');
                 
                 for($j=0; $j<$theValue_mobile+1; $j++)
                {
                   
                  
                  if($prs_mobile_extra[$j]!='')
                  {
                   $datamobile=array(
                    
                    'psm_prs_id'=>$prs_id,
                    'psm_mobile'=>$prs_mobile_extra[$j],
                    'psm_crtd_dt'=>date('Y-m-d'),
                    'psm_crtd_by'=>$this->session->userdata('trgn_prs_id'));
                 //  print_r($data);
                 $this->Home_model->insert('person_mobile', $datamobile); 
                 }
               }
             /*end extra mobile no*/


             /*extra email no*/
                 $theValue_email=$this->input->post('theValue_email');
                    $prs_email_extra=  $this->input->post('prs_email_extra');
                 
                 for($k=0; $k<$theValue_email+1; $k++)
                {
                   
                  if($prs_email_extra[$k]!='')
                  {
                   $dataemail=array(
                    
                    'pse_prs_id'=>$prs_id,
                    'pse_email'=>$prs_email_extra[$k],
                    'pse_crtd_dt'=>date('Y-m-d'),
                    'pse_crtd_by'=>$this->session->userdata('trgn_prs_id'));
                 //  print_r($data);
                 $this->Home_model->insert('person_email', $dataemail); 
                 }
               }
             /*end extra email no*/

           // print_r($data);
           return   $prs_id;
    }
     public function insertUserData($usr_prs_id,$usr_designation)
    {
       
     
        $data = array(
         'usr_prs_id'=>$usr_prs_id,
         'usr_designation'=>$usr_designation,
         'usr_status'=>USER_ACTIVE_STATUS
         );
      
          $usr_id =  $this->Home_model->insert('user', $data);
          return $usr_id;
    }
     public function changepassword($prs_id,$data)
     {
        
        
        log_message('debug','reached in model');
        $this->db->where('prs_id',$prs_id);
        $this->db->update('person',$data);
        log_message('debug','exiting model');

     }
     public function ImageValidation($image_path,$image_name,$file_id)
    {
                log_message('error','>> Validate image model');

                    
                       
                    $validextensions = array("jpeg", "jpg", "png","JPG","PNG");
                    $temporary = explode(".", $_FILES[$file_id]["name"]);
                    $file_extension = end($temporary);
                    $pic_name =$this->Home_model->generateRandomString(10);
                                $ext = $file_extension;
                                $_FILES[$file_id]["name"] =  $pic_name.'.'.$ext;
                    if ((($_FILES[$file_id]["type"] == "image/png") || ($_FILES[$file_id]["type"] == "image/jpg") || ($_FILES[$file_id]["type"] == "image/PNG") || ($_FILES[$file_id]["type"] == "image/jpeg")
                    ) && ($_FILES[$file_id]["size"] < 5120000)//Approx. 5MB files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                    if ($_FILES[$file_id]["error"] > 0)
                    {

                     
                     return "size";
                    }
                    else
                    {
                    if (file_exists($image_path.$_FILES[$file_id]["name"])) {
                    return 'error';
                    }
                    else
                    {
                    $sourcePath = $_FILES[$file_id]['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = $image_path.$_FILES[$file_id]['name']; // Target path where file is to be stored


                    $sourcePath1 = $_FILES[$file_id]['tmp_name']; 
                      $targetPath1 = $image_path.$_FILES[$file_id]['name'];

                        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                        
                                   
                      
                      $prs_img =$_FILES[$file_id]["name"];
                          
                     return $prs_img;


                    }
                    }
                    }
                    else
                    {
                     return "size";

                     
                    }

                        
                        
                    
}
 public function check_validation($type,$value)
    {
        $sql = "SELECT COUNT(*) as count FROM person where prs_status='".USER_ACTIVE_STATUS."' and ".$type."='".$value."' ";
        $query=$this->db->query($sql);
        $result=$query->row();
        log_message('error', 'validation query = '.$sql);
        return $result->count;
      
    }

     public function check_edit_validation($type,$value,$prs_id)
    {
        $sql = "SELECT COUNT(*) as count FROM person where prs_status='".USER_ACTIVE_STATUS."' and ".$type."='".$value."' and prs_id !='".$prs_id."'   ";
        $query=$this->db->query($sql);
        $result=$query->row();
        log_message('error', 'validation query = '.$sql);
        return $result->count;
      
    }

    public function getUserList()
    {
        $sql = "SELECT *,(SELECT dpt_name FROM `department` WHERE dpt_id = prs_dpt_id) as prs_designation from person,user where prs_id = usr_prs_id and prs_status='".USER_ACTIVE_STATUS."' ";
        $query=$this->db->query($sql);
        $result=$query->result();
        log_message('error', 'list  query = '.$sql);
        return $result;
    }
    public function getUserbyslug($slug='')
    {
       $sql = "SELECT *,(SELECT dpt_name FROM `department` WHERE dpt_id = prs_dpt_id) as prs_designation,(SELECT loc_name FROM `location` WHERE loc_id = prs_location ) as prs_location_name  from person,user where prs_id = usr_prs_id and prs_slug = '".$slug."'  and prs_status='".USER_ACTIVE_STATUS."' ";
        $query=$this->db->query($sql);
        $row=$query->row();
        log_message('error', 'list  query = '.$sql);
        return $row;
    }
     public function getUserbyid($prs_id='')
    {
       $sql = "SELECT *,(SELECT dpt_name FROM `department` WHERE dpt_id = prs_dpt_id) as prs_designation ,(SELECT loc_name FROM `location` WHERE loc_id = prs_location ) as prs_location_name from person,user where prs_id = usr_prs_id and prs_id = '".$prs_id."'  and prs_status='".USER_ACTIVE_STATUS."' ";
        $query=$this->db->query($sql);
        $row=$query->row();
        log_message('error', 'list  query = '.$sql);
        return $row;
    }

     public function secure()
     {
            //log_message('debug','in model');
            $data=$this->input->post('data_en');
            $secure=$this->input->post('secure');
            
            if($secure=='encrypt')
            {
                $response_value=openssl_encrypt($data,CIPHER,KEY);
                // log_message('debug','encrypt'.$encrypt);
            }
            else
            {

                 $response_value=openssl_decrypt($data,CIPHER,KEY);
                // log_message('debug','encrypt'.$decrypt);
            }
            return $response_value;
     }


    public function checkServerSideValidation($prs_email,$prs_mob,$prs_user_name)
   {
    $message='';
    if($prs_email != '')
    {
       log_message('error','>>email not empty');
        $email_check = $this->User_model->check_validation('prs_email',$prs_email);
        log_message('error','>> email_check validation count = '.$email_check);
        if($email_check != '0')
       {
        $message= 'Email already exists ';
       }
    }
     if($prs_mob != '')
    {
      log_message('error','>>mobile no not empty');
        $mob_check = $this->User_model->check_validation('prs_mob',$prs_mob);
        log_message('error','>> mob_check validation count = '.$mob_check);
        if($mob_check != '0')
       {
         $message= 'Mobile No. already exists ';
       }
    }
     if($prs_user_name != '')
    {
      log_message('error','>>username not empty');
       $username_check = $this->User_model->check_validation('prs_username',$prs_user_name);
       log_message('error','>> username_check validation count = '.$username_check);
        if($username_check != '0')
       {
         $message= 'Username already exists ';
       }
    }
     return $message;  
   }

   public function checkServerSideeditValidation($prs_email,$prs_mob,$prs_user_name,$prs_id)
   {
       $message='';
    if($prs_email != '')
    {
       log_message('error','>>email not empty');
        $email_check = $this->User_model->check_edit_validation('prs_email',$prs_email,$prs_id);
        log_message('error','>> email_check validation count = '.$email_check);
        if($email_check != '0')
       {
        $message= 'Email already exists ';
       }
    }
     if($prs_mob != '')
    {
      log_message('error','>>mobile no not empty');
        $mob_check = $this->User_model->check_edit_validation('prs_mob',$prs_mob,$prs_id);
        log_message('error','>> mob_check validation count = '.$mob_check);
        if($mob_check != '0')
       {
         $message= 'Mobile No. already exists ';
       }
    }
     if($prs_user_name != '')
    {
      log_message('error','>>username not empty');
       $username_check = $this->User_model->check_edit_validation('prs_username',$prs_user_name,$prs_id);
       log_message('error','>> username_check validation count = '.$username_check);
        if($username_check != '0')
       {
         $message= 'Username already exists ';
       }
    }
     return $message; 
   }



    public function updateProfilePic()
    {

    
             $person_path = PERSON_IMAGE_PATH;


if(isset($_FILES["file"]["type"]))
{
   
$validextensions = array("jpeg", "jpg", "png","JPG","PNG");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
$pic_name =$this->Home_model->generateRandomString(10);
            $ext = $file_extension;
            $_FILES["file"]["name"] =  $pic_name.'.'.$ext;
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/PNG") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 5120000)//Approx. 5MB files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{

 
 return "size";
}
else
{
if (file_exists($person_path . $_FILES["file"]["name"])) {
return 'error';
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = $person_path.$_FILES['file']['name']; // Target path where file is to be stored


$sourcePath1 = $_FILES['file']['tmp_name']; 
  $targetPath1 = person_path1.$_FILES['file']['name'];

    move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
    $prs_img=$this->input->post('prs_img');
                        if($prs_img!='')
                    {
                         unlink($person_path.$prs_img);
                        
                    }
    
    copy($person_path.$_FILES['file']['name'], person_path1.$_FILES['file']['name']);

   
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = person_path1.$_FILES['file']['name']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = prs_width;
                    $config['height'] = prs_height;
                   $this->image_lib->initialize($config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                   




   
         
 return "true";


}
}
}
else
{
 return "size";

 
}

    
    
}
else{
    



 return "true";


}




    }


 public function updateprofile($loc_id)
    {
       log_message('debug','in model');

       $prs_id= $this->input->post('prs_id');
        $data = array(
         
         'prs_dpt_id'=>$this->input->post('prs_department'),
         'prs_username'=>$this->input->post('prs_user_name'),
         'prs_name'=>$this->input->post('prs_name'),
         'prs_email'=>$this->input->post('prs_email'),
         'prs_mob'=>$this->input->post('prs_mob'),
         
         
         'prs_address'=>$this->input->post('prs_address'),
         'prs_location'=>$loc_id
         );

       $this->db->where('prs_id',$prs_id);
       $result=$this->db->update('person',$data);


        $theValue_mob=$this->input->post('theValue_mob');

                  $psm_id=explode(',', $this->input->post('psm_id'));
                  
                  $psm_mobile=  explode(',',  $this->input->post('psm_mobile'));

                 //echo $this->input->post('theValue_email');
                  $theValue_email=$this->input->post('theValue_email');
                  $pse_id=explode(',', $this->input->post('pse_id'));
                  $pse_email=  explode(',',  $this->input->post('pse_email'));



                      $mobtrim =  rtrim($this->input->post('psm_id'), ',');
                      
                  $memailtrim =  rtrim($this->input->post('pse_id'), ',');
                  if(!empty($mobtrim))
                  {
                    $sql="delete from person_mobile where psm_id NOT IN (".rtrim($this->input->post('psm_id'), ',').")  and psm_prs_id='".$prs_id."'";
                    $query=$this->db->query($sql);
                  }
                 else
                  {
                    $mbl_ext=0;
                    $sql="delete from person_mobile where psm_id NOT IN (".$mbl_ext.")  and psm_prs_id='".$prs_id."'";
                    $query=$this->db->query($sql);
                  }



                   for($j=0; $j<=$theValue_mob; $j++)
                {
                    if($psm_id[$j]!='')
                    {
                         
                        if($psm_mobile[$j]!='')
                          {
                            $data=array('psm_prs_id'=>$prs_id,'psm_mobile'=>$psm_mobile[$j],'psm_uptd_by'=>$this->session->userdata('trgn_prs_id'));
                             $this->db->where('psm_id',$psm_id[$j]);
                             $this->db->update('person_mobile', $data);
                         }
                          

                    }
                    else
                    {
                         

                        if($psm_mobile[$j]!='')
                          {
                            $data=array('psm_prs_id'=>$prs_id,'psm_mobile'=>$psm_mobile[$j],'psm_crtd_dt'=>date('Y-m-d'),'psm_crtd_by'=>$this->session->userdata('trgn_prs_id'));
                           //print_r($data);
                            $psm_id = $this->Home_model->insert('person_mobile', $data); 
                          }
                         


                    }
                  
               }



                  if(!empty($memailtrim))
                  {
                    $sql1="delete from person_email where pse_id NOT IN (".rtrim($this->input->post('pse_id'), ',').")  and pse_prs_id='".$prs_id."'";
                    $query1=$this->db->query($sql1);
                  }
                  else
                  {
                    $eml_ext=0;
                    $sql1="delete from person_email where pse_id NOT IN (".$eml_ext.")  and pse_prs_id='".$prs_id."'";
                    $query1=$this->db->query($sql1);
                  }





            

                 for($k=0; $k<=$theValue_email; $k++)
                {

                    if($pse_id[$k]!='')
                    {
                        
                        if($pse_email[$k]!='')
                          {
                            $data1=array('pse_prs_id'=>$prs_id,'pse_email'=>$pse_email[$k],'pse_crtd_by'=>$this->session->userdata('trgn_prs_id'));
                          
                             $this->db->where('pse_id',$pse_id[$k]);
                             $this->db->update('person_email', $data1);
                          }
                    }
                    else
                    {
                        
                        if($pse_email[$k]!='')
                          {
                           $data1=array('pse_prs_id'=>$prs_id,'pse_email'=>$pse_email[$k],'pse_crtd_dt'=>date('Y-m-d'),'pse_crtd_by'=>$this->session->userdata('trgn_prs_id'));
                          
                            $email_id = $this->Home_model->insert('person_email', $data1); 
                          }
                    }
                  
               }
       return $result;

    }
    public function updateuserdata($prs_id='',$usr_designation)
    {
         log_message('debug','in model');
        $data = array(
         'usr_designation'=>$usr_designation,
         );

       $this->db->where('usr_prs_id',$prs_id);
       $result=$this->db->update('user',$data);

       return $result;
    }


     public function getUserMobiles($prs_id)
        {
            $sql="select * from person_mobile where  psm_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $result=$query->result();
            return $result;
        }

        public function getUserMobilesCount($prs_id)
        {
       $sql="select COUNT(1) as mob_count from person_mobile where  psm_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $row=$query->row();
            return $row->mob_count;
        }

               public function getUserEmails($prs_id)
        {
            $sql="select * from person_email where  pse_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $result=$query->result();
            return $result;
        }

        public function getUserEmailssCount($prs_id)
        {
            $sql="select COUNT(1) as email_count from person_email where  pse_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $row=$query->row();
            return $row->email_count;
        }

        public function getcomboUserMobiles($prs_id='')
        {
           $sql="select GROUP_CONCAT(psm_mobile) as mobiles from person_mobile where  psm_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $row=$query->row();
            return $row->mobiles;
        }
         public function getComboUserEmails($prs_id='')
        {
            $sql="select GROUP_CONCAT(pse_email) as email from person_email where  pse_prs_id='".$prs_id."'";
            $query=$this->db->query($sql);
            $row=$query->row();
            return $row->email;
        }


}