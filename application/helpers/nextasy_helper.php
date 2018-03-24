<?php 
//   function getLastNoforInvoiceNo($ord_category,$start)
//  {

// $sql="SELECT prs_id,prs_code,SUBSTRING(`prs_code`, 2,5) as w, LEFT(`prs_code` , 1) as y FROM orders where LEFT(`prs_code` , 1) ='".$start."' ORDER BY w DESC limit 1 ";
//     $query = $this->db->query($sql);
//     $row = $query->row();
//     $row1=$row->y.$row->w;
//     //echo $row1;
//    return $row1;
//   }
	  function code_gen($code,$random_string)
    {
      log_message('nexlog','code_gen >> code : '.$code);
        $lastNo =getLastNo($code);
      // if (!empty($lastNo)) {
      //   $lastNo=$lastNo;
      // }
      // else
      // {
      //     $lastNo = "";
      // } 
    
  
     $n = (empty($lastNo)) ? '0001' : $n = str_pad(++$lastNo,4,'0',STR_PAD_LEFT);
     $code_generated=$code.$n;
      // $n = ((empty($lastNo))) ? '0001' : $n = $lastNo + 1;
      $new_code_generated = $code.$n;
      return $new_code_generated;

    }
    function getLastNo($code)
    {
       $CI       = &get_instance();
       // $sql=" select prs_id,prs_code ,(SUBSTRING(`prs_code`,'".OLD_CODE."') ) as code_new,LEFT(`prs_code` , '".CODE_LENGTH."') as username from person where LEFT(`prs_code` , '".CODE_LENGTH."') ='".$code."'   ORDER BY prs_id DESC  ";
       $sql="SELECT prs_id,prs_code,SUBSTRING(`prs_code`, 2,5) as w, LEFT(`prs_code` , 1) as y FROM person where LEFT(`prs_code` , 1) ='".$code."' ORDER BY w DESC limit 1 ";

       log_message('nexlog','getLastNo >> code gen query :'.$sql);
      $res = $CI->db->query($sql);
      $row = $res->row();
      if(empty($row))
      {
      return '';
      }
      else
      {
       return $row->code_new;
      }
    }
    function getClubDetails($clb_id)
    {
       $CI       = &get_instance();
       $sql=" select * from club_master where clb_id='".$clb_id."' and clb_status='".ACTIVE_STATUS."' ";
       //log_message('error','getLastNo >> code gen query :'.$sql);
      $res = $CI->db->query($sql);
      $row = $res->row();
      if(empty($row))
      {
      return '';
      }
      else
      {
       return $row;
      }
    }
    function getGenPrmName($value,$group)
    {
       $CI       = &get_instance();
       $sql=" select gnp_name from gen_prm where gnp_value='".$value."' and  gnp_group='".$group."' and gnp_status='".ACTIVE_STATUS."' ";
       //log_message('error','getLastNo >> code gen query :'.$sql);
      $res = $CI->db->query($sql);
      $row = $res->row();
      if(empty($row))
      {
      return '';
      }
      else
      {
       return $row->gnp_name;
      }
    }
     function mysqlDateFormat($value='')
  {
     
         if($value != '')
         {
            $date = str_replace('/','-',$value);
            $mysql_date = date('Y-m-d',strtotime($value));
         }
         else
         {
           $mysql_date = $value;
         
         }
         return $mysql_date;
  }
  function DateDisplay($value='')
  {
   
         if($value != '')
         {
           $date = date('d-M-Y',strtotime($value));
         }
         else
         {
           $date = $value;
         
         }
         return $date;
  }
  function DateTimeDisplay($value='')
  {
   
         if($value != '')
         {
           $date = date('d-M-Y h:i:s A',strtotime($value));
         }
         else
         {
           $date = $value;
         
         }
         return $date;
  }
 ?>