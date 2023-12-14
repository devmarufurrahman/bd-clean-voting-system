<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../theme/winky/css/style.css">

    <title>BD Clean Election-2023</title>
</head>

<body>
    <div class="container m-auto">
        <div class="header_right d-flex align-items-center justify-content-center  mt-5">
            <img class="logo_bd_clean" src="../theme/winky/asset/asset-logo.png" alt="BD Clean Logo">
        </div>

        <div class="result_content mt-2">

            <div class="header_right d-flex flex-column align-items-center justify-content-center ">
                <div class="main_header text-light display-1 text-center ">BD CLEAN 2nd NATIONAL ELECTION - 2023</div>
                <div class="timeDiv">Time: <span id="timer">15:00</span></div>
            </div>



            <div class="result_head d-flex justify-content-between mb-2">
                <div class="text-light display-3 fw-bolder text-left">Total Voter</div>
                <div class="text-light display-3 fw-bolder text-center">: <span id="total_voter">000</span> </div>
            </div>

            <div class="result_head d-flex justify-content-between mb-2 gap-5">
                <div class="text-light display-3 fw-bolder text-left">Vote Cast</div>
                <div class="text-light display-3 fw-bolder text-center ps-3">: <span id="total_vote">000</span> </div>
            </div>

            <div class="result_head d-flex justify-content-between mb-2">
                <div class="text-light display-3 fw-bolder text-left">Rest Voter</div>
                <div class="text-light display-3 fw-bolder text-center">: <span id="restOfVoter">000</span> </div>
            </div>


        </div>

    </div>
</body>

<script src="../model/script/result_page.js"></script>

</html>