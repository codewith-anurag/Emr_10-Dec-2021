<?php 
   defined('BASEPATH') OR exit('No direct script access allowed');
   if (! function_exists('insert_auditdump')) {
    function insert_auditdump($current_login_user,$current_login_user_role,$module,$action,$detail,$hospital_id,$performed_id="",$performed_user="",$performed_role="")
    {
     // echo $current_login_user.",".$current_login_user_role.",".$module.",".$action.",".$detail.",".$hospital_id.",".$performed_id.",".$performed_user.",".$performed_role;exit;
      $CI = &get_instance();
      $current_log_datetime = date("Y-m-d h:i:s");
      $data = ['date'=>$current_log_datetime, 'user'=>$current_login_user, 'role'=>$current_login_user_role,"module"=>$module,"action"=>$action,"detail"=>$detail,"hospital_id"=>$hospital_id,"performed_id"=>$performed_id,"performed_user"=>$performed_user,"performed_role"=>$performed_role];

      $result = $CI->db->insert("audit_dump",$data);
      //echo $CI->db->last_query();exit;
      if($result){
         return 1;
      }else{
         return 0;
      }     
   }
}

 ?>