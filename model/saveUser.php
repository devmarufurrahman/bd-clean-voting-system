<?php
    session_start();
    include("../settings/db_con.php");
    $obj = new my_class();
    extract($_REQUEST);
    $date=date('Y-m-d H:i:s');
	$dataTable = "election_attendance_profile";
	$values = array(
		'user_ref'=>$user_ref,
		'active_flag'=>1,
		'attendance_flag'=>1,
		'attendance_date'=>$date,
		'create_by'=>$user_id,
		'create_date'=>$date
	);
	$where_cond = "user_ref='$user_ref'";
	$sql = $obj->Update_Data($dataTable,$values,$where_cond);
	
	if($sql){
		echo "Success";
	} else {
		echo "Fail";
	}