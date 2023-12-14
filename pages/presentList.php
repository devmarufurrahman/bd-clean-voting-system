<?php
session_start();
include("settings/db_con.php");
$obj = new my_class();
extract($_REQUEST);
$total_absent = $obj->Total_Count_By_Cond("election_attendance_profile", "attendance_flag=1 AND active_flag=1");
?>



<div class="absentInfo container mt-5">
    <h3 class="text-center text-light p-4">Present Participants Information</h3>
    <h4 class="text-center text-light"> Total Present: <?php echo $total_absent; ?></h4>
    <table class="table w-75 m-auto">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Phone</th>
                <th scope="col">Area</th>
                <th scope="col">Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obj->View_All_By_Cond("election_attendance_profile", "active_flag=1 AND attendance_flag=1") as $value) {
                $user_ref = $value['user_ref'];
                $personal_info = $obj->Details_By_Cond("personal_profile", "id='$user_ref' AND active_flag=1");
                $org_level_ref = $personal_info['org_level_pos'];
                $member_id = $personal_info['id'];
                $active_flag = 1;
                $election_ref = 1;
                $create_by = 1;
                $attendance_flag = 0;
                $create_date = date("Y-m-d H:i:s");
                $member_designation_info = $obj->Details_By_Cond("user_level_pos", "id='$org_level_ref' AND active_flag=1");
                $division_ref = $personal_info['division_ref'];
                $district_ref = $personal_info['district_ref'];
                $upazila_ref = $personal_info['upazila_ref'];
                $union_ref = $personal_info['union_ref'];
                $village_ref = $personal_info['village_ref'];
                $division_info = $obj->Details_By_Cond("division_profile", "id='$division_ref' AND active_flag=1");
                $district_info = $obj->Details_By_Cond("district_profile", "id='$district_ref' AND active_flag=1");
                $upazila_info = $obj->Details_By_Cond("upazila_profile", "id='$upazila_ref' AND active_flag=1");
                $union_info = $obj->Details_By_Cond("union_profile", "id='$union_ref' AND active_flag=1");
                $village_info = $obj->Details_By_Cond("village_profile", "id='$village_ref' AND active_flag=1");
                $member_photo = $personal_info['profile_photo'];
                if ($member_photo != "") {
                    $path = "../../../../resources/user/profile_pic/";
                    $member_photo = $path . $member_photo;
                } else {
                    $member_photo = "./theme/winky/img/avatar_img.png";
                }
            ?>
                <tr>
                    <th scope="row"><?php echo $personal_info['id']; ?></th>
                    <td><?php echo $personal_info['full_name']; ?></td>
                    <td><?php echo $member_designation_info['name']; ?></td>
                    <td><?php echo $personal_info['contact']; ?></td>
                    <td>Division: <?php echo $division_info['name']; ?>, District:<?php echo $district_info['name']; ?>, Upazila: <?php echo $upazila_info['name']; ?> </td>
                    <td>
                        <img class="absentUserImg" src="<?php echo $member_photo; ?>" alt="img">
                    </td>
                </tr>
                <?php /* echo "INSERT INTO election_attendance_profile (user_ref, attendance_flag,active_flag,create_by,create_date,election_ref)
VALUES ('".$member_id."', '".$attendance_flag."','".$active_flag."','".$create_by."','".$create_date."','".$election_ref."');<br/>"; */ ?>
            <?php }  ?>
        </tbody>
    </table>

</div>