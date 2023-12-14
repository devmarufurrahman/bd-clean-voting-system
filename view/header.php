<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Clean Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../theme/winky/css/style.css">
    <link rel="shortcut icon" href="../theme/winky/img/bd-clean.png" type="image/x-icon">
    <script src="https://bdclean.winkytech.com/backend/theme/porto_admin/vendor/jquery/jquery.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-lg">
            <a class="navbar-brand" href="https://bdclean.winkytech.com/backend/apps/controller/index.php">
                <img class="logo" src="../theme/winky/img/bdclean_logo_2.png" alt="BD Clean logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <h3 class="nav-link active text-light" aria-current="page" href="#">Attendance System</h3>
                    </li>
                    <li class="nav-item">

                    </li>
                    <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    <!-- </ul> -->
                    </li>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
                <a class="nav-link  btn btn-outline-light me-3" href="?page=absentList">
                    Absent List
                </a>
                <a class="nav-link  btn btn-outline-light me-3" href="?page=presentList">
                    Event Participants
                </a>

                <a class="nav-link btn btn-outline-light" href="./login.php">
                    Login
                </a>
            </div>
        </div>
    </nav>