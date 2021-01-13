<?php

// function user_login_info($data){
//     require 'connection.php';
//     $password = md5($data['password']);
//     $sql = "SELECT * FROM user_reg_info WHERE un = '$data[userName]' AND pass='$password' AND status='1'";
//     if(mysqli_query($conn, $sql)){
//         $row = mysqli_query($conn, $sql);
//         $result = mysqli_fetch_assoc($row);
//         if($result){
//             session_start();
//             $_SESSION['userId'] = $result['id'];
//             $_SESSION['userName'] = $result['student_name'];
//             header('Location: userhome.php');
//         }  else {
//             echo 'Invalid UserName and Password';
//         }
//     }  else {
//         echo 'error';
//     }
// }

function get_ques_rows(){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques";
    if(mysqli_query($conn, $sql)){
        $rows = mysqli_query($conn, $sql);
        $count = $rows->num_rows;
        return $count;
    }
}
function get_ques($getnumber){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques WHERE ques_no='$getnumber'";
    if(mysqli_query($conn, $sql)){
        $row = mysqli_query($conn, $sql);
        $ques = mysqli_fetch_assoc($row);
        return $ques;
    }
}
function get_ans($get_ans_number){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ans WHERE ques_no='$get_ans_number'";
    if(mysqli_query($conn, $sql)){
        $row = mysqli_query($conn, $sql);
        return $row;
    }
}
function get_next_question($data){
    session_start();
    $number = (int) $data['getqv'];
    
    $selectedScore = $data['ans'];
    $nextNmuber = $number+1;
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    $total = (int) $data['total']+1;
    $rightAns = $data['rid'];
    
    if($rightAns == $selectedScore){
        $_SESSION['score']++;
    }
    if($nextNmuber == $total){
        header('Location: final.php');
        exit();
    }  else {
        header('Location: test.php?q='.$nextNmuber);
    }
    
}
function right_ans($number){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ans WHERE ques_no='$number' AND right_ans = '1'";
    if($row = mysqli_query($conn, $sql)){
        $result = mysqli_fetch_assoc($row);
        $fr = $result['id'];
        return $fr;
    }
}
function get_all_ques(){
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques";
    if($row=mysqli_query($conn, $sql)){
        //$row = mysqli_query($conn, $sql);
        //$ques = mysqli_fetch_assoc($row);
        return $row;
    }
}

function user_logout_info(){
    unset($_SESSION['userId']);
    unset($_SESSION['userName']);
    require 'connection.php';
    header('Location: ../index.php');
}

