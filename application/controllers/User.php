<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('User_model');		
	}

	public function user_list()
	{
		$data['user_list']=$this->User_model->getUserList();
		$this->load->view('user_list',$data);
	}
	public function user_add()
	{
		$this->load->view('user_add');
	}
	public function insertUser()
	{
    $this->db->trans_start();
		$loc_id=$this->Home_model->validateLocation($this->input->post('prs_location'));
        if($loc_id==INVALID_LOCATION)
        {
            
            echo json_encode(array("success"=>false,"message"=>INVALID_LOCATION));
        }
        else
        {
          $check_validation = $this->User_model->checkServerSideValidation($this->input->post('prs_email'),$this->input->post('prs_mob'),$this->input->post('prs_user_name'));
         if($check_validation != '')
         {
         echo json_encode(array("success"=>false,"message"=>$check_validation,"linkn"=>base_url('user-add')));
         }
         else
         {
        	$image='';
        	/*if(isset($_FILES["file"]["type"]))
        	{
        		$image_path =PERSON_IMAGE_PATH;
        		$image = $this->ValidateImage($image_path,$_FILES["file"]["name"],'file');
        	}*/
        	 $slug = $this->input->post('prs_name').'-'.$this->Home_model->generateRandomStringNum(4);
             $prs_slug = url_title($slug, 'dash', TRUE); 
        	 $prs_id=$this->User_model->insert_user($prs_slug,$loc_id,$image);
        	 if($prs_id != '')
        	 {
        	 	$user_id=$this->User_model->insertUserData($prs_id,$this->input->post('usr_designation'));   
        	 	echo json_encode(array("success"=>true,"message"=>'User Registered Successfully',"linkn"=>base_url('user-details-'.$this->url_encrypt->encrypt_openssl($prs_slug))));
        	 }else
        	 {
                echo json_encode(array("success"=>false,"message"=>'Some error occured',"linkn"=>base_url('user-add')));
        	 }
         }
               
        }

    $this->db->trans_complete();
	}
	public function ValidateImage($image_path,$image_name)
		{
			
			log_message('error','in Validate image controller');
			
			$string=$this->User_model->ImageValidation($image_path,$image_name,'file');
					 if($string=='error')
		    {
		        echo json_encode(array("success"=>false,"message"=>'some error occured.Try again'));
		    }
		           elseif($string=='size')
		        {
		        echo json_encode(array("success"=>false,"message"=>'Invalid size'));
		        }
		    elseif($string !='')
		    {
		        log_message('error','image valid');
		        return $string;
		    }
		    else
		    {
		        echo json_encode(array("success"=>false,"message"=>'some error occured'));
		    }

		}
		public function checkValidation()
   {
    $check = $this->User_model->check_validation($this->input->post('type'),$this->input->post('value'));

    if($check != '0')
    {
         echo json_encode(array("success"=>true,"message"=>$this->input->post('type'). 'already exists',"linkn"=>base_url()));
    }
    else{
         echo json_encode(array("success"=>false,"message"=>'',"linkn"=>base_url()));
    }
  }
  public function checkeditValidation($value='')
  {
    $check = $this->User_model->check_edit_validation($this->input->post('type'),$this->input->post('value'),$this->input->post('prs_id'));

    if($check != '0')
    {
         echo json_encode(array("success"=>true,"message"=>$this->input->post('type'). 'already exists',"linkn"=>base_url()));
    }
    else{
         echo json_encode(array("success"=>false,"message"=>'',"linkn"=>base_url()));
    }
  }

  public function user_edit($slug='')
  {
    $ref_decrypt=$this->url_encrypt->decrypt_openssl($slug);
     $rowuser = $this->User_model->getUserbyslug($ref_decrypt);
    $data['user_data'] = $rowuser;
     
      $data['ref_encrypt']= $slug;

       $candidate_alt_mobiles=$this->User_model->getUserMobiles($rowuser->prs_id);
     $data['candidate_alt_mobiles']=$candidate_alt_mobiles;
     $data['alt_mobiles_cnt']=$this->User_model->getUserMobilesCount($rowuser->prs_id);
        if ($candidate_alt_mobiles === NULL) {
             $data['mobiledata'] = 'null';
             
        } else {
             // We trust our model, pass it along.
             $data['mobiledata'] = json_encode($candidate_alt_mobiles);
              
        }


        $candidate_alt_emails=$this->User_model->getUserEmails($rowuser->prs_id);
      $data['candidate_alt_emails']=$candidate_alt_emails;
      $data['alt_emails_cnt']=$this->User_model->getUserEmailssCount($rowuser->prs_id);
      
      if ($candidate_alt_emails === NULL) {
             $data['emailsdata'] = 'null';
        } else {
             // We trust our model, pass it along.
             $data['emailsdata'] = json_encode($candidate_alt_emails);
        }


    $this->load->view('user_edit',$data);
  }

   public function user_profile()
  {
    $user = $this->User_model->getUserbyid($this->session->userdata('trgn_prs_id'));
    $slug = $user->prs_slug;
    $ref_decrypt=$this->url_encrypt->encrypt_openssl($slug);
     $data['ref_encrypt']= $ref_decrypt;
    $data['user_data']=$this->User_model->getUserbyslug($slug);
   
       $candidate_alt_mobiles=$this->User_model->getUserMobiles($this->session->userdata('trgn_prs_id'));
     $data['candidate_alt_mobiles']=$candidate_alt_mobiles;
     $data['alt_mobiles_cnt']=$this->User_model->getUserMobilesCount($this->session->userdata('trgn_prs_id'));
        if ($candidate_alt_mobiles === NULL) {
             $data['mobiledata'] = 'null';
             
        } else {
             $data['mobiledata'] = json_encode($candidate_alt_mobiles);
              
        }


        $candidate_alt_emails=$this->User_model->getUserEmails($this->session->userdata('trgn_prs_id'));
      $data['candidate_alt_emails']=$candidate_alt_emails;
      $data['alt_emails_cnt']=$this->User_model->getUserEmailssCount($this->session->userdata('trgn_prs_id'));
      
      if ($candidate_alt_emails === NULL) {
             $data['emailsdata'] = 'null';
        } else {
             $data['emailsdata'] = json_encode($candidate_alt_emails);
        }

    $this->load->view('user_edit',$data);
  }

   public function changePassword()
    {
           log_message('error','reached in controller');

        $id= $this->input->post('prs_id');
          $user=$this->User_model->getUserbyid($id);
            $pwd=$this->input->post('old_password');

        $encrypt=openssl_encrypt($pwd,CIPHER,KEY);

    if ($user->prs_password == $encrypt)
  { 
 
              log_message('error','in loop');
              $pwd_new=$this->input->post('new_password');
            $encrypt_new=openssl_encrypt($pwd_new,CIPHER,KEY);
              $data = array('prs_password' =>$encrypt_new);
               $this->User_model->changepassword($id,$data);

               if ($this->input->post('prs_id') == $this->session->userdata('trgn_prs_id')) {
                echo json_encode(array("success"=>true,"message"=>'Password changed successfully.',"linkn"=>base_url().'logout' ));
               }else{
                echo json_encode(array("success"=>true,"message"=>'Password changed successfully.',"linkn"=>base_url().'user-details-'.$this->url_encrypt->encrypt_openssl($user->prs_slug)));
               }

                 
     }
     else
     {
       echo json_encode(array("success"=>false,"message"=>'Please Wnter Valid Old Password.'));
     }
          

     }


 public function secure()
  {

      
   $response_value=$this->User_model->secure();
    echo json_encode(array("success"=>true,"message"=>$response_value));
    }

public function updateProfilePic()
    {
      


      log_message('error','in controller');
      
      
          $image='';
          if(isset($_FILES["file"]["type"]))
          {
            $image_path =PERSON_IMAGE_PATH;
            $image = $this->ValidateImage($image_path,$_FILES["file"]["name"],'file');
          }
           
           $prs_id=$this->input->post('prs_id');
           if($prs_id != '')
           {
            /*$user_id=$this->User_model->insertUserData($prs_id);  */ 
            $data=array(
  
                'prs_img'=>$image
                );



               $this->Home_model->update('prs_id',$this->input->post('prs_id'), $data, 'person');
                if ($this->input->post('prs_id') == $this->session->userdata('trgn_prs_id')) {
                 $newdata = array(
                          'trgn_prs_img'  => $image,
                         'is_logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);
                      }

            echo json_encode(array("success"=>true,"message"=>'User Profile Update  Successfully') );

           }else
           {
                echo json_encode(array("success"=>true,"message"=>'Some error occured'));
           }
         

    }


public function updateprofile()
    {
      $this->db->trans_start();
        log_message('error','in controller');
        $loc_id=$this->Home_model->validateLocation($this->input->post('prs_location'));
        if($loc_id==INVALID_LOCATION)
        {
            
            echo json_encode(array("success"=>false,"message"=>INVALID_LOCATION));
        }
        else
        {
              $check_validation = $this->User_model->checkServerSideeditValidation($this->input->post('prs_email'),$this->input->post('prs_mob'),$this->input->post('prs_user_name'),$this->input->post('prs_id'));
                   if($check_validation != '')
                   {
                          echo json_encode(array("success"=>false,"message"=>$check_validation,"linkn"=>base_url('user-add')));
                   }
                   else
                   {
                         $string=$this->User_model->updateprofile($loc_id);
                         $this->User_model->updateuserdata($this->input->post('prs_id'),$this->input->post('usr_designation'));
                        if($string==1){
                           if ($this->input->post('prs_id') == $this->session->userdata('trgn_prs_id')) {
                          $newdata = array(
                          'trgn_prs_name'  => $this->input->post('prs_name'),
                          'trgn_prs_email'  => $this->input->post('prs_email'),
                          'trgn_prs_mob'  => $this->input->post('prs_mob'),
                          'trgn_prs_dpt_id' => $this->input->post('prs_department'),
                         'is_logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);

                       }

                       $id= $this->input->post('prs_id');
                    $user=$this->User_model->getUserbyid($id);
                        
                         echo json_encode(array("success"=>true,"message"=>'User Profile Update Successfully',"linkn"=>base_url('user-details-'.$this->url_encrypt->encrypt_openssl($user->prs_slug))));
                           }
                         else
                         {
                           echo json_encode(array("success"=>false,"message"=>'Some error occured.'));
                         }
                   }
              
        }

      $this->db->trans_complete();   
       
    } 


public function userDetail($prs_slug)
  {

     if($this->session->userdata('trgn_prs_id')!='')
     {
      $ref_decrypt=$this->url_encrypt->decrypt_openssl($prs_slug);

     $rowuser = $this->User_model->getUserbyslug($ref_decrypt);
    $data['user_data'] = $rowuser;
      $data['User_alt_mobiles']=$this->User_model->getcomboUserMobiles($rowuser->prs_id);
        $data['user_alt_emails']=$this->User_model->getComboUserEmails($rowuser->prs_id);

    $data['prs_slug']=$ref_decrypt;
     $data['ref_encrypt'] =$prs_slug;          

      $this->load->view('user_detail',$data);
    }
    else
    {
        $this->load->view('user_detail');
    }
  }




}//controller end