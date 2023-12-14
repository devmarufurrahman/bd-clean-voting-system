<?php
    session_start();
    echo $_SESSION['user_role_ref'];
    include '../view/header.php';
?>

<div class="container mt-5 loginParent">

    <form id="loginForm" class="loginForm pt-5">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label h5 text-light" for="form2Example1">User Id</label>
            <input type="email" id="user_name" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label h5 text-light" for="form2Example2">Password</label>
            <input type="password" id="user_password" class="form-control" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-start">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label text-light" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <!-- <div class="col">
                <a href="#!">Forgot password?</a>
            </div> -->
        </div>

        <!-- Submit button -->
        <button type="button" class="btn btn-outline-light btn-block mb-4" onclick="user_login()">Sign in</button>


    </form>
</div>

<script>
    function user_login(){										
		//alert("infront");
		var username = $("#user_name").val();
		var password = $("#user_password").val();
		var dataStr = "username="+username+"&password="+password;
	    alert(dataStr);
		if(username=="") {
			alert("Enter username");
			$("#user_name").focus();
			return false;
		}
		else  if(password=="") {
			alert("Enter password");
			$("#user_password").focus();
			return false;
		}
		else {
			$.ajax({
				type:"post",
			    url:"../model/logincheck.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st){
				    alert(st);
				    if(st=='Success'){
					    window.location.href = "https://bdclean.winkytech.com/backend/apps/controller/index.php";
				    } else {
				        window.location.href = "https://bdclean.winkytech.com/backend/apps/controller/pages/login.php";
				    }
				}
			});	
		}
	}
</script>
</body>

</html>