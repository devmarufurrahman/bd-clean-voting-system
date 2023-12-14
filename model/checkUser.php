<?php
session_start();
include("../settings/db_con.php");
$obj = new my_class();
extract($_REQUEST);

// Define $username and $password
//$password = md5($password);
$contact = '88'.$contact;
$chk_status = $obj->Total_Count_By_Cond("personal_profile", "contact='$contact' AND active_flag=1");

if($chk_status==1){
    echo "Success";
} else {
    echo $chk_status;
}
//header("location: https://vetsheba.edpngo.org/backend/?page=dashboard"); // Redirecting To Other Page
