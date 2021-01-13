<?php

// function admin_login_info($data){
//     require 'connection.php';
//     //$password = md5($data['password']);
//     //echo $password;
//     //exit();
//     $sql = "Select * FROM registration_table WHERE 	user_name = '$data[userName]' AND pass ='$data[password]' AND status='2'";
//     if(mysqli_query($conn, $sql)){
//         $row = mysqli_query($conn, $sql);
//         $result = mysqli_fetch_assoc($row);
//         if($result){
//             session_start();
//             $_SESSION['admin_id'] = $result['id'];
//             $_SESSION['admin_name'] = $result['name'];
//             header('Location: admin/adminhome.php');
//         }  else {
//             echo 'Invalid UserName and Password';
//         } 
//     }  else {
//         echo 'Error';
//     }  
// }

function update_status_for_disable($disData){
    require 'connection.php';
    $sql = "UPDATE registration_table SET status = '0'  WHERE id='$disData'";
    if(mysqli_query($conn, $sql)){
        $mass = '<span style="color:red;">User Disable !</span>';
        return $mass;
    }  else {
        $mass = 'User Not Disable !';
        return $mass;
    }
}
function update_status_for_enable($enaData){
    require 'connection.php';
    $sql = "UPDATE registration_table SET status = '1'  WHERE id='$enaData'";
    if(mysqli_query($conn, $sql)){
        $mass = 'User Enable !';
        return $mass;
    }  else {
        $mass = 'User Not Enable !';
        return $mass;
    }
}
function delete_user($del){
    require 'connection.php';
    $sql = "DELETE FROM registration_table WHERE id = '$del'";
    if(mysqli_query($conn, $sql)){
        $mass = '<span class="ml-5" style="color:red;">User Removed !</span>';
        return $mass;
    }  else {
        $mass = 'User Not Removed !';
        return $mass;
    }
}
 // Remove Question
function delete_ques($delqdata){
    require 'connection.php';
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table){
        $sql = "DELETE FROM $table WHERE ques_no = '$delqdata'";
        if(mysqli_query($conn, $sql)){
            $row = mysqli_query($conn, $sql);
        }  else {
            echo 'Query Problem';
        }
    }
    
    if($row){
        
        $mass = "Question Removed";
        return $mass;
    }  else {
        $mass = "Question not Removed";
        return $mass;
    }
}

function get_ques_rows(){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques";
    if(mysqli_query($conn, $sql)){
        $rows = mysqli_query($conn, $sql);
        $count = $rows->num_rows;
        return $count;
    }
}



function admin_logout_info(){
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header('Location: ../index.php');
}