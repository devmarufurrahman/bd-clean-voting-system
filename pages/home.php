<div class="search container mt-5 mb-5">

    <div class="m-auto">
        <div class="card searchCard">
            <div class="card-body">
                <h3 class="card-title text-center text-light fw-bolder">Search Participent</h3>
                <p class="card-text text-center text-light fw-bolder h5">Search participent with registered phone
                    number</p>

                <form class="d-flex flex-column">
                    <input class="form-control  mb-4 m-auto w-75 p-2" type="text" id="contact" placeholder="Contact Number" aria-label="Search" value="">

                    <button class="btn btn-outline-light w-50 m-auto" type="submit" onclick="search_member()">Search</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div id="memberListWrapper">

</div>

<script>
    // search onclick
    function search_member() {
        var contact = $("#contact").val();
        var dataStr = "contact=" + contact;

        if (contact == "") {
            alert("Please Input a Contact Number To Search");
            $("#contact").focus();
            return false;
        } else {
            $.ajax({
                url: 'model/checkUser.php',
                dataType: 'text',
                data: dataStr,
                type: 'POST',
                success: function(php_script_response) {
                    //alert(php_script_response);
                    if (php_script_response == 'Success') {
                        $("#memberListWrapper").load("pages/member_datatable.php", dataStr);
                        $("#contact").focus();
                        $("#contact").val('');
                    } else {
                        alert("Member Not Found with this number. Please Try with Another Number");
                        $("#contact").focus();
                        $("#contact").val('');
                    }
                }
            });

        }
    }

    // var click = document.getElementById(searchBtn);

    // key press function
    function onKeyPress() {
        document.body.addEventListener("keydown", (e) => {
            if (e.keyCode === 13) {
                e.preventDefault()
                search_member();
            }
        });
    }

    onKeyPress();
</script>