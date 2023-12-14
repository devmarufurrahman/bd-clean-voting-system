<?php
session_start();
session_destroy();

header("Location: https://bdclean.winkytech.com/backend/apps/controller/pages/login.php");
echo "<script>window.location.href='https://vetsheba.edpngo.org/backend/login.php';</script>";
exit;
?>