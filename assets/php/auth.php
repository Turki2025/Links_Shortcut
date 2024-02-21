<?php
if(isset($_COOKIE["user"])){
    $user = json_decode($_COOKIE["user"]);
    $loggedIn = true;
} 
else{
    $loggedIn = false;
}


?>