<?php
if(isset($_COOKIE["user"])){
    unset($_COOKIE["user"]);
    setcookie("user","",-1,"/");
}
header("location: login.php");
exit;
?>