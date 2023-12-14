<?php
    session_start();
    include("../settings/db_con.php");
    $obj=new my_class();
    $current_date = date("j F, Y");
    $total_record = $obj->Total_Count_By_Cond("election_attendance_profile","attendance_flag=0 AND active_flag=1");
	$user_role_ref=$_SESSION['user_role_ref'];
	$header = '
        <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: middle; font-family: serif; font-size: 9pt; color: #000088;"><tr>
        <td width="33%">BD Clean Election 2023</td>
        <td width="33%" align="center"><img src="" width="126px" style="margin-bottom: 10px;" /></td>
        <td width="33%" style="text-align: right;">Date: <span style="">'.$current_date.'</span></td>
        </tr></table>
    ';
	$html .='<h2 style="text-align: center">All Absent Members of BD Clean Election 2023</h2>';
$html .='Total Member Found: '.$total_record.'';
$html .='
<table class="bpmTopic">
    <thead>
        <tr>
            <th class="pmhMiddleLeft" style=" width:5%; padding: 10px 5px; font-size: 12pt; border: 1px solid #CCC">Sl.</th>
            <th class="pmhMiddleLeft" style=" width:50%;padding: 10px 5px; font-size: 12pt; border: 1px solid #CCC">
                Member
            </th>
            <th class="pmhMiddleLeft" style=" width:45%;padding: 10px 5px; font-size: 12pt; border: 1px solid #CCC">
                Designation
            </th>
            <th class="pmhMiddleLeft" style=" width:45%;padding: 10px 5px; font-size: 12pt; border: 1px solid #CCC">
                Phone
            </th>
            <th class="pmhMiddleLeft" style=" width:45%;padding: 10px 5px; font-size: 12pt; border: 1px solid #CCC">
                Area
            </th>
        </tr>
    </thead>
    <tbody>';
    $x=1;
    
    foreach($obj->View_All_By_Cond("election_attendance_profile","attendance_flag=0 AND active_flag=1") as $value){
        $user_ref = $value['user_ref'];
        $personal_info = $obj->Details_By_Cond("personal_profile","id='$user_ref' AND active_flag=1");
        $member_name = $personal_info['full_name'];
        $org_level_ref = $personal_info['org_level_pos'];
        $member_id = $personal_info['id'];
        $active_flag=1;
        $election_ref = 1;
        $create_by = 1;
        $attendance_flag=0;
        $create_date = date("Y-m-d H:i:s");
        $member_designation_info = $obj->Details_By_Cond("user_level_pos","id='$org_level_ref' AND active_flag=1");
        $member_designation = $member_designation_info['name'];
        $division_ref = $personal_info['division_ref'];
        $district_ref = $personal_info['district_ref'];
        $upazila_ref = $personal_info['upazila_ref'];
        $union_ref = $personal_info['union_ref'];
        $village_ref = $personal_info['village_ref'];
        $division_info = $obj->Details_By_Cond("division_profile","id='$division_ref' AND active_flag=1");
        $district_info = $obj->Details_By_Cond("district_profile","id='$district_ref' AND active_flag=1");
        $upazila_info = $obj->Details_By_Cond("upazila_profile","id='$upazila_ref' AND active_flag=1");
        $union_info = $obj->Details_By_Cond("union_profile","id='$union_ref' AND active_flag=1");
        $village_info = $obj->Details_By_Cond("village_profile","id='$village_ref' AND active_flag=1");
        $member_photo = $personal_info['profile_photo'];
        if($member_photo!=""){
            $path = "../../../../resources/user/profile_pic/";
            $member_photo = $path.$member_photo;
            
        } else {
            $member_photo ="./theme/winky/img/avatar_img.png";
        }
        //$reg_date = date("j F, Y", strtotime($value['create_date']));
        if($x%2==0){
            $html .='
            <tr class="oddrow">
                <td class="pmhMiddleLeft" style="padding: 10px 5px; font-size: 14px; border: 1px solid #CCC">'.$x.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_name.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_designation.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_name.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_designation.'</td>
            </tr>';
        } else {
            $html .='
            <tr class="evenrow">
                <td class="pmhMiddleLeft" style="padding: 10px 5px; font-size: 14px; border: 1px solid #CCC">'.$x.'</td>
                <td class="pmhMiddleLeft" style="width: 20%;padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_name.'</td>
                <td class="pmhMiddleLeft" style="width: 20%;padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_designation.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_name.'</td>
                <td class="pmhMiddleLeft" style="padding: 10px 5px;font-size: 14px; border: 1px solid #CCC">'.$member_designation.'</td>
            </tr>';
        }
        $x++;
    }
    $html .='</tbody>
</table>';




//==============================================================
//==============================================================
//==============================================================
include("mpdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',10,10,35,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdf/examples/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML($html,2);

$mpdf->Output('bdclean-election-total-absent-list.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?>