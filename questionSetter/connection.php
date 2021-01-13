<?php

$conn = new mysqli('localhost','root','','online-exam');
if($conn->connect_error){
    echo 'Connection Failed';
}  else {
    //echo 'connect';
}

