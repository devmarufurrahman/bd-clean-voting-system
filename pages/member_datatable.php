<?php
include("../settings/db_con.php");
$obj = new my_class();
extract($_REQUEST);
$contact_info = $contact;
$contact = '88' . $contact;
//echo $contact;
$member_info = $obj->Details_By_Cond("personal_profile", "contact='$contact' AND active_flag=1");
$org_level_pos = $member_info['org_level_pos'];
$user_designation_info = $obj->Details_By_Cond("user_level_pos", "id='$org_level_pos' AND active_flag=1");
$member_photo = $member_info['profile_photo'];
$user_ref = $member_info['id'];
$attendance_status_info = $obj->Total_Count_By_Cond("election_attendance_profile", "user_ref='$user_ref' AND attendance_flag=1 AND active_flag=1");
echo $attendance_status_info;
if ($member_photo != "") {
    $path = "../../../../resources/user/profile_pic/";
    $member_photo = $path . $member_photo;
} else {
    $member_photo = "./theme/winky/img/avatar_img.png";
}

if ($attendance_status_info == 0) {
    $status = "Absent";
} else if ($attendance_status_info == 1) {
    $status = "<button class='btn btn-warning'><i class='fas fa-check-circle'></i> Present</button>";
}
?>
<input type="hidden" id="attendance_status" value="<?php echo $attendance_status_info; ?>">
<div class="result container mb-5">
    <h3 class="text-center">Participants Information</h3>

    <div class="informationDiv mt-3 d-flex flex-row mb-3 gap-5 justify-content-center align-items-center">
        <div class="userImg">

            <img class="img-fluid" src="<?php echo $member_photo; ?>" alt="Participants Image" style="height: 300px">
        </div>
        <div class="infoText align-items-center mb-3">
            <h3>Name: <?php echo $member_info['full_name']; ?></h4>
                <h3>Designation: <?php echo $user_designation_info['name']; ?></h4>
                    <h3>Address: <?php echo $member_info['address']; ?></h4>
                        <h4>Status: <?php echo $status; ?></h4>
                        <button class="btn btn-success p-2" id="save_attendance" type="button" onclick="save_attendance('<?php echo $user_ref; ?>','<?php echo $contact_info; ?>')">Entry
                            Participant</button>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        var attendance_status = $("#attendance_status").val();
        if (attendance_status == 1) {
            $("#save_attendance").prop("disabled", true);
        }
    });
</script>
<script>
    function save_attendance(member_id, contact) {

        var dataStr = "contact=" + contact + "&user_ref=" + member_id;
        //alert(dataStr);
        $.ajax({
            url: 'model/saveUser.php',
            dataType: 'text',
            data: dataStr,
            type: 'POST',
            success: function(php_script_response) {
                //alert(php_script_response);
                if (php_script_response == 'Success') {
                    $("#memberListWrapper").load("pages/member_datatable.php", dataStr);
                    $("#contact").val('');
                } else {
                    alert("Failed to SaveMember. Please Try Again");
                }
            }
        });
    }
</script>