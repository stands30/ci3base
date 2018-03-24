<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Communication_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    //return the 
     function communication($event_name,$email,$CUS_name,$verificationText)
  {

  
    global $EUS_type_email;
          global $EUS_type_sms;
            global $EUS_USR_type_user;
          global $EUS_USR_type_admin;
        $event_id=  $this->get_event_id($event_name);
        $event_usr=  $this->get_events_usr($event_id);

if(!empty($event_usr))
  {

       foreach ($event_usr as $key)
        {


         if($key->eus_type ==$EUS_type_email)
          {
            
     
             if($key->eus_usr_type==$EUS_USR_type_admin)
          {
            $email_id=$this->get_admin_email();
            
       
          }
          else{
           $email_id=$email;


          }



     $sql ="SELECT  tmp_name,tmp_sub,tmp_msg
FROM `com_template` WHERE `tmp_id`=".$key->eus_tmp_id."";
             $query = $this->db->query($sql);
       $data=  $query->result();
       $rowtemp = $query->row();

       $msg=$this->get_mail_msg($rowtemp->tmp_name,$verificationText,$CUS_name);

       $this->sendMail($email_id,$msg['subject'],$msg['body']);
 

    //$this->sendMail($email_id,$array['sub'],$array['msg']);
      
           // $this->sendMail($email_id,$array['sub'],$array['msg']);

        
               // $this->mail($this->input->post('CUS_email'),$eget_mail_msgmail_verification_code);
     
          }else{

          }

       }
  
  }
    }

            function get_event_id($event_name)
  {
  $sql ="SELECT ent_id FROM `com_events` WHERE `ent_name`='".$event_name."' and `ent_status`=1";
                              $query = $this->db->query($sql);
                              $row= $query->row();
                              return $row->ent_id;

    }

          function get_events_usr($ent_id)
  {
  	global $eus_status_active;
 $sql ="SELECT eus_id,eus_ent_id,eus_usr_type,eus_tmp_id,
 (Select com_template.tmp_name from com_template where com_template.tmp_id =com_events_usr.eus_tmp_id
) template_name, eus_type FROM `com_events_usr` WHERE `eus_ent_id`=".$ent_id." and eus_status=".$eus_status_active." order by eus_order_by";
             $query = $this->db->query($sql);
                  return $query->result();

  }
 function get_admin_email()
  {
    global $admin_email;
     $sql ="SELECT bpm_value from bsn_prm  where bpm_name='".$admin_email."'";
             $query = $this->db->query($sql);
                 $row=$query->row();

       return $row->bpm_value;

  }
     function get_mail_msg($name,$code,$cus_name)
  {
 
   global $ticket_temp,$ticket_comment_temp,$ticket_owner_comment_temp,$template_comment_temp;
   $ticket_message='';
     $ticket_message1='';
    if($this->session->userdata('tck_id')!='')
    {
      
  $ticket=$this->ticket_model->getTicketById($this->session->userdata('tck_id'));
   $tck_desc =  word_limiter(strip_tags($ticket->tck_desc),word_limitor);

  $ticket_subject = ADD_TICKET_EMAIL_SUBJECT;
  $ticket_subject = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_subject);
  $ticket_subject = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $ticket_subject);
  $ticket_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_subject);


  $ticket_message = ADD_TICKET_EMAIL_BODY;
  $ticket_message = str_replace('%PERSON_RECEIVER%', $cus_name, $ticket_message);
  $ticket_message = str_replace('%PERSON_SENDER%', $ticket->tck_crdt_by_name, $ticket_message);
  $ticket_message = str_replace('%TICKET_ID%', strtoupper($ticket->tck_slug), $ticket_message);
  $ticket_message = str_replace('%TICKET_URL%', NEXTASY_SUPPORT_URL.('ticket-'.$ticket->tck_slug), $ticket_message);
  $ticket_message = str_replace('%TICKET_TITLE%', $ticket->tck_title, $ticket_message);
  $ticket_message = str_replace('%TICKET_STATUS%', $ticket->tck_status_name, $ticket_message);
  $ticket_message = str_replace('%PROJECT_NAME%', $ticket->tck_prj_name, $ticket_message);
  $ticket_message = str_replace('%TICKET_PRIORITY%', $ticket->tck_priority_name, $ticket_message);
  $ticket_message = str_replace('%TICKET_DESC%',  $tck_desc, $ticket_message);
    }



       global $ticket_changed_temp;

    if($this->session->userdata('tck_id1')!='')
    {
      
      $ticket=$this->ticket_model->getTicketById($this->session->userdata('tck_id1'));
        $tck_desc =  word_limiter(strip_tags($ticket->tck_desc),word_limitor);
      // $ticket_old_data=$this->ticket_model->getTicketOldDataById($this->session->userdata('tck_id1'));
         if($this->session->userdata('tck_old_user_name')!='' && $this->session->userdata('tck_old_status_name')!='')
    {
       $modified_ticket_subject = EDIT_TICKET_EMAIL_SUBJECT;
  $modified_ticket_subject = str_replace('%TICKET_ID%', $ticket->tck_no, $modified_ticket_subject);
  $modified_ticket_subject = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $modified_ticket_subject);
  $modified_ticket_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $modified_ticket_subject);

      $ticket_message1 = EDIT_TICKET_EMAIL_BODY;
      $ticket_message1 = str_replace('%PERSON_RECEIVER%', $cus_name, $ticket_message1);
      $ticket_message1 = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_URL%', site_url('ticket-'.$ticket->tck_slug), $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_TITLE%', $ticket->tck_title, $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_OLD_STATUS%', $this->session->userdata('tck_old_status_name'), $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_OLD_USER%', $this->session->userdata('tck_old_user_name'), $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_NEW_STATUS%', $ticket->tck_status_name, $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_NEW_USER%', $ticket->tck_user_name, $ticket_message1);
      $ticket_message1 = str_replace('%PROJECT_NAME%', $ticket->tck_prj_name, $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_PRIORITY%', $ticket->tck_priority_name, $ticket_message1);
      $ticket_message1 = str_replace('%TICKET_DESC%',$tck_desc , $ticket_message1);
    }
    else
    {

  $modified_ticket_subject = BASIC_EDIT_TICKET_EMAIL_SUBJECT;
  $modified_ticket_subject = str_replace('%TICKET_ID%', $ticket->tck_no, $modified_ticket_subject);
  $modified_ticket_subject = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $modified_ticket_subject);
  $modified_ticket_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $modified_ticket_subject);

     $ticket_message1 = BASIC_EDIT_TICKET_EMAIL_BODY;
      $ticket_message1 = str_replace('%BASIC_PERSON_RECEIVER%', $cus_name, $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_TICKET_ID%', $ticket->tck_no, $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_TICKET_URL%', site_url('ticket-'.$ticket->tck_slug), $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_TICKET_TITLE%', $ticket->tck_title, $ticket_message1);

      $ticket_message1 = str_replace('%BASIC_PROJECT_NAME%', $ticket->tck_prj_name, $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_TICKET_PRIORITY%', $ticket->tck_priority_name, $ticket_message1);
      $ticket_message1 = str_replace('%BASIC_TICKET_DESC%',$tck_desc , $ticket_message1);
    }
    //   $style='color:black';
    //   $style1='font-weight:bold;color:black;size:18px';
    //   $style2='font-weight:bold;color:black;size:13px';  
    //   $body ="
    //   <p style=".$style2.">Hi ".$cus_name.",</p>
    // </br>
    // Ticket- ".$ticket->tck_no." has been modified</br>
     
    //   <p style=".$style2.">Title :".$ticket->tck_title."</p>
      
    //   <BR>Cheers,<BR><u style=".$style2.">Team Nextasy Support</u><BR><u style=".$style2.">support.nextasy.in</u><BR>";
      $ticket_message1= $ticket_message1;

        }
            if($this->session->userdata('tkc_id')!='')
        {

           
     
    $ticket=$this->ticket_model->getTicketCommentById($this->session->userdata('tkc_id'));
$tkc_comment =  word_limiter(strip_tags($ticket->tkc_comment),word_limitor);
    // echo $ticket->tkc_tagged_user;
     $tagged_user=$this->user_model->getUserName($ticket->tkc_tagged_user);


  $ticket_comment_subject = TAG_TICKET_EMAIL_SUBJECT;
  $ticket_comment_subject = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_comment_subject);
  $ticket_comment_subject = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $ticket_comment_subject);
  $ticket_comment_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_comment_subject);


      $ticket_comment_message = TAG_TICKET_EMAIL_BODY;
      
        $ticket_comment_message = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_comment_message);
      $ticket_comment_message = str_replace('%PERSON_RECEIVER%', 'User', $ticket_comment_message);
      $ticket_comment_message = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_comment_message);
   $ticket_comment_message = str_replace('%TICKET_URL%', site_url('ticket-'.$ticket->tck_slug), $ticket_comment_message);
      $ticket_comment_message = str_replace('%TICKET_TITLE%', $ticket->tck_title, $ticket_comment_message);
      $ticket_comment_message = str_replace('%TICKET_STATUS%', $ticket->tck_status_name, $ticket_comment_message);
       $ticket_comment_message = str_replace('%TICKET_PROJECT%',$ticket->tck_prj_name, $ticket_comment_message);
      $ticket_comment_message = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $ticket_comment_message);
      $ticket_comment_message = str_replace('%TICKET_COMMENT%', $tkc_comment, $ticket_comment_message);
      $ticket_comment_message = str_replace('%TAGGED_USERS%', $tagged_user, $ticket_comment_message);
    
  
    }
      if($this->session->userdata('tkc_id_owner')!='')
        {

           
     
    $ticket=$this->ticket_model->getTicketCommentById($this->session->userdata('tkc_id_owner'));
$tkc_comment =  word_limiter(strip_tags($ticket->tkc_comment),word_limitor);
    // echo $ticket->tkc_tagged_user;
if($ticket->tkc_tagged_user!='')
{
  $tagged_user=$this->user_model->getUserName($ticket->tkc_tagged_user);
}
else
{
  $tagged_user='------';
}
      $ticket_owner_comment_subject = COMMENT_TICKET_EMAIL_SUBJECT;
       $ticket_owner_comment_subject = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_owner_comment_subject);
         $ticket_owner_comment_subject = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $ticket_owner_comment_subject);
          $ticket_owner_comment_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_owner_comment_subject);

    
      $ticket_owner_comment_message = COMMENT_TICKET_EMAIL_BODY;

      $ticket_owner_comment_message = str_replace('%PERSON_RECEIVER%', $cus_name, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_ID%', $ticket->tck_no, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_STATUS%', $ticket->tck_status_name, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_URL%', site_url('ticket-'.$ticket->tck_slug), $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_PROJECT%',$ticket->tck_prj_name, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_PRIORITY%',$ticket->tck_priority_name, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_TITLE%', $ticket->tck_title, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TICKET_COMMENT%', $tkc_comment, $ticket_owner_comment_message);
      $ticket_owner_comment_message = str_replace('%TAGGED_USERS%', $tagged_user, $ticket_owner_comment_message);
    
  
    }
      if($this->session->userdata('tcm_id')!='')
        {
          
    $template=$this->template_model->getTemplateCommentById($this->session->userdata('tcm_id'));
      $tagged_user=$this->user_model->getUserName($template->tcm_tagged_user);


      $template_comment_subject = TAG_TEMPLATE_EMAIL_SUBJECT;
       $template_comment_subject = str_replace('%TEMPLATE_TITLE%', $template->tmp_sub_name, $template_comment_subject);
       $template_comment_subject = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $template_comment_subject);

    
      $template_comment_message = TAG_TEMPLATE_EMAIL_BODY;

      $template_comment_message = str_replace('%PERSON_RECEIVER%', 'User', $template_comment_message);
      $template_comment_message = str_replace('%PERSON_SENDER%',$this->session->userdata("prs_name"), $template_comment_message);
      $template_comment_message = str_replace('%TEMPLATE_URL%',site_url('templates/detail/'.$template->tcm_tmp_id), $template_comment_message);
      $template_comment_message = str_replace('%TEMPLATE_TITLE%', $template->tmp_sub_name, $template_comment_message);
     
      $template_comment_message = str_replace('%TEMPLATE_COMMENT%', $template->tcm_comment, $template_comment_message);
      $template_comment_message = str_replace('%TEMPLATE_USERS%', $tagged_user, $template_comment_message);

    }



      

 switch ($name)
 {
      case $ticket_temp:

      
        $msg = array("subject"=> $ticket_subject, "body"=>$ticket_message);
       return $msg;

       case $ticket_changed_temp:
        $msg = array("subject"=> $modified_ticket_subject, "body"=>$ticket_message1);
       return $msg;

         case $ticket_comment_temp:
      
          $msg = array("subject"=> $ticket_comment_subject, "body"=>$ticket_comment_message);
       return $msg;

       case $ticket_owner_comment_temp:
       $msg = array("subject"=> $ticket_owner_comment_subject, "body"=>$ticket_owner_comment_message);
 return $msg;
         case $template_comment_temp:
        $msg = array("subject"=> $template_comment_subject, "body"=>$template_comment_message);
       return $msg;

       

        default:
        return "Bar\n";
        break;
}


  }

 public function get_admin_from_email()
    {
     
     
     
$sql ="SELECT bpm_value from bsn_prm where bpm_name='admin_source_email'";
             $query = $this->db->query($sql);
           $row= $query->row();
         return $row->bpm_value;

      
     }
          public function get_admin_from_pw()
    {
     
     
     
$sql ="SELECT bpm_value from bsn_prm where bpm_name='admin_source_pw'";
             $query = $this->db->query($sql);
           $row= $query->row();
         return $row->bpm_value;

      
     }
   public function sendMail($email_id,$email_sub,$email_msg){ 

$email_source=$this->get_admin_from_email();
 $pw_source=$this->get_admin_from_pw();
  $list = ''.$email_id.'';
 $email_sub;
   $email_msg;
   
          //  $config = Array(
          //     'protocol' => 'smtp',
          //     'smtp_host' => 'ssl://smtp.googlemail.com',
          //     'smtp_port' => 465,
          //     'smtp_user' => ''.$email_source.'',
          //     'smtp_pass' => ''.$pw_source.'',
          //     'mailtype'  => 'html', 
          //     'charset'   => 'iso-8859-1',
          //     'wordwrap' => TRUE
          // );
$config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'bh-in-19.webhostbox.net',
              'smtp_port' => 587,
              'smtp_user' => ''.$email_source.'',
              'smtp_pass' => ''.$pw_source.'',
              'mailtype'  => 'html', 
              'charset'   => 'iso-8859-1',
              'wordwrap' => TRUE,
              '_smtp_auth'=> true
          );

          $this->load->library('email', $config);
          /*$this->load->library('email');*/
          // $this->email->set_newline("\r\n");
          // $this->email->from(''.$email_source.'');
          // $this->email->subject($email_sub);
          // $this->email->to($email_id);
          // $this->email->message($email_msg);
           $this->email->set_newline("\r\n");
          $this->email->from(''.$email_source.'', 'Nextasy Support');
          $this->email->subject($email_sub);
          $this->email->Bcc($list);
          $this->email->message($email_msg);
         
          if($this->email->send())
             {
                return true;
             }
             else
            {
             log_message('error','error occured in people insert Communication_model/send_mail'.$this->email->print_debugger());
             show_error($this->email->print_debugger());
              return false;
            } 
   
 }

}


?>
