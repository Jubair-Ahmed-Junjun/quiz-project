<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if($admin_id==NULL){
        header('Location: ../index.php');
    }
?>
<?php
    require 'connection.php';
    $sql = "SELECT * FROM registration_table WHERE id='$admin_id'";
    if( $row=mysqli_query($conn, $sql) ){
        if($row){
            $result = mysqli_fetch_assoc($row);
        }
    }
?>
<?php
    if(isset($_POST['updbtn'])){
        function update_admin_profile($udata){
            require 'connection.php';
            $an = $udata['uname'];
            $am = $udata['umn'];
            $ae = $udata['uemail'];
            $au = $udata['uusername'];
            $hid = $udata['hid'];
            $usql = "UPDATE registration_table SET name='$an',mobile_number='$am',email='$ae',user_name='$au' WHERE id='$hid'";
            if(mysqli_query($conn, $usql)){
                header('Location: adminprofile.php');
            }  else {
                $um = 'Profile Not Update';
                echo $um;
            }
        }
        update_admin_profile($_POST);
    }
?>
<?php

if(isset($_POST['updbtn'])){
    
    require 'connection.php';
    $derectory = 'admin_image/';
    $target_file = $derectory.$_FILES['admim_image']['name'];
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_size = $_FILES['admim_image']['size'];
    $check = getimagesize($_FILES['admim_image']['tmp_name']);
    if($check){
        if(file_exists($target_file)){
            echo 'This image is alrady exists';
        }  else {
            if($file_type!='jpg' && $file_type!='png'){
                echo 'This is not an image';
            }  else {
                if($file_size>500000){
                    echo 'Your image size is too large';
                }  else {
                    move_uploaded_file($_FILES['admim_image']['tmp_name'], $target_file);
                    $sql = "UPDATE registration_table SET image='$target_file' WHERE id='$admin_id'";
                    mysqli_query($conn, $sql);
                    header('Location: adminprofile.php');
                }
            }
        }
    }  else {
        echo 'Your upload file is not an image';
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
    
    <title>Online exam</title>
</head>
<body>

    
<?php 
    include 'includes/navber.php';
?>

<div class="container">
<div class="row justify-content-center mt-4">
    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header mch" style="text-align: center;"><?php echo $_SESSION['admin_name']; ?></div>
                            
                            <div class="card-body row">
                                
                                <form class="form-horizontal col-md-12" action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group"> 
                                                <input type="text" class="form-control" name="uname" id="name" value="<?php echo $result['name']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="mn" class="cols-sm-2 control-label">Mobile Number</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                
                                                <input type="Number" class="form-control" name="umn" id="mn" value="<?php echo $result['mobile_number']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="uemail" id="email" value="<?php echo $result['email']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Username</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" name="uusername" id="username" value="<?php echo $result['user_name']; ?>"/>
                                                <input type="hidden" name="hid" value="<?php echo $admin_id;?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mn" class="cols-sm-2 control-label">Upload Your Image</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                 <input type="file" name="admim_image" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-2" style="text-align: center;">
                                        <input type="submit" name="updbtn" class="btn btn-danger" value="Update Profile">
                                    </div>
                                    
                                </form>
                                
                            </div>

                        </div>
                    </div>
                </div>
</div>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>
</html>