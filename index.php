<?php
session_start();
extract($_REQUEST);
$user_role_ref = $_SESSION['user_role_ref'];
//echo $user_role_ref;

if(isset($_REQUEST["page"]) && $_REQUEST["page"]!=""){
    //$page=$_REQUEST["page"];
    $page=$_REQUEST["page"];
} else {
    $page="home";
}
if (isset($user_role_ref) && ($user_role_ref == 1 || $user_role_ref == 2)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include 'view/headerScript.php'; ?>
    </head>

    <body>

        <?php include 'view/siteHeader.php'; ?>

        <?php include 'pages/'.$page.'.php'; ?>


    </body>

    </html>
<?php } else {
    header("Location: https://bdclean.winkytech.com/backend/apps/controller/pages/login.php");
}
?>
