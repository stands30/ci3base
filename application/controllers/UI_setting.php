<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class UI_setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->load->model('Person_model');		
	}
	public function index($value='')
	{
		$sql ="SELECT `uis_id`, `uis_type`, `uis_value`,uis_field FROM `ui_settings`  ";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['ui_field'] = $result;
		$this->load->view('ui_setting',$data);
	}
	public function updateProfilePic($value='')
	{

		 log_message('error','>> insert_edu_qual ');
       $uis_value=explode(',',$this->input->post('uis_value'));
       $uis_id=explode(',',$this->input->post('uis_id'));
       $uis_type=explode(',',$this->input->post('uis_type'));
        $uis_field=explode(',',$this->input->post('uis_field'));
       $BLO_img=explode(',',$this->input->post('BLO_img'));

$j = 1;
  $credu_certificate_upload_='';
  $credu_certificate_='';
 
       for($i=0;$i<count($uis_type);$i++)
       {
       $img_id='BLO_img'.$j;
       if ($uis_field[$i] == 1) {
             if(isset($_FILES[$img_id]["type"]))
          {
            // log_message('error','>> credu_certificate_ image  = '[$j]);
            // echo  'credu_certificate_';
            $credu_certificate_upload =$this->upload_image(UI_IMAGE_PATH,$img_id);
            $credu_certificate =$credu_certificate_upload ;
            // log_message('error','>> credu_certificate_ = '.$credu_certificate_[$j]);
          }
          else
          {
            $credu_certificate =$uis_value[$i];
          }
       }else{
              $credu_certificate =$uis_value[$i];
       }
       
        
          
            log_message('error','>> insert_edu_qual loop id = '.$j);
            $edu_qual=array(
              'uis_type'=>$uis_type[$i],
            'uis_value'=>$credu_certificate,
            );
            // print_r($edu_qual);
              $this->Home_model->update('uis_id',$uis_id[$i], $edu_qual, 'ui_settings');
          
          $j++;
         }
         
           echo json_encode(array('success'=>true,'message'=>'Form submitted successfully!','linkn'=>base_url()));   
	}


	      public function upload_image($image_path,$file_id)
      {
      	
        log_message('error','>> image file_id  = '.$file_id);
        if (file_exists($image_path.$_FILES[$file_id]['name'])) 
            {
            	
              $image=$this->Home_model->getFileName($_FILES[$file_id]['name']);
              if (file_exists($image_path.$_FILES[$file_id]["name"])) 
              {
              	
                $image=$this->Home_model->getFileName($_FILES[$file_id]['name']);
              }
              else
              {
                $image=$_FILES[$file_id]["name"];
              }
            }
            else
            {
            	
              $image=$_FILES[$file_id]["name"];
            }
                $sourcePath = $_FILES[$file_id]['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = $image_path.$image; // Target path where file is to be stored
                    move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                       $file_name='';
                  
                   
         return $image;

      }

}
