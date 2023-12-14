<?php
session_start();
include("../settings/db_con.php");
$obj = new my_class();
extract($_REQUEST);

// Define $username and $password
//$password = md5($password);
$chk_status = $obj->Total_Count_By_Cond("web_user", "user_name='$username' AND user_password='$password' AND active_flag=1");

if($chk_status==1){
    $user_info = $obj->Details_By_Cond("web_user", "user_name='$username' AND active_flag=1");
    $user_role_ref = $user_info['user_role_ref'];
    $_SESSION['user_role_ref'] = $user_role_ref;
    $_SESSION['login_user'] = $username;
    $_SESSION['login_id'] = $user_info['id'];
    $_SESSION['login_status'] = 'ACTIVE';
    echo "Success";
} else {
    echo $chk_status;
}
//header("location: https://vetsheba.edpngo.org/backend/?page=dashboard"); // Redirecting To Other Page
