


<?php
    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
    }
?>
<?php
    require 'connection.php';
    $sql = "SELECT * FROM registration_table WHERE id='$userId'";
    if( $row=mysqli_query($conn, $sql) ){
        if($row){
            $result = mysqli_fetch_assoc($row);
        }
    }
?>
<?php
    if(isset($_POST['updbtn'])){
        function update_user_profile($udata){
            require 'connection.php';
            $an = $udata['uname'];
            $am = $udata['umn'];
            $ae = $udata['uemail'];
            $au = $udata['username'];
            $hid = $udata['hid'];
            $usql = "UPDATE registration_table SET name='$an',mobile_number='$am',email='$ae',user_name='$au' WHERE id='$hid'";
            if(mysqli_query($conn, $usql)){
                header('Location: user_profile.php');
            }  else {
                $um = 'Profile Not Update';
                echo $um;
            }
        }
        update_user_profile($_POST);
    }
?>
<?php

if(isset($_POST['updbtn'])){
    
    require 'connection.php';
    $derectory = 'user_image/';
    $target_file = $derectory.$_FILES['user_image']['name'];
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_size = $_FILES['user_image']['size'];
    $check = getimagesize($_FILES['user_image']['tmp_name']);
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
                    move_uploaded_file($_FILES['user_image']['tmp_name'], $target_file);
                    $sql = "UPDATE registration_table SET image='$target_file' WHERE id='$userId'";
                    mysqli_query($conn, $sql);
                    header('Location: user_profile.php');
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

    
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <h3><a class="navbar-brand" href="index.html">Online Exam</a></h3>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="userhome.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="exam.php" class="nav-link">Exam</a>
                </li>
                
                <li class="nav-item">
                    <a href="user_profile.php" class="nav-link">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
<div class="row justify-content-center mt-4">
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mch" style="text-align: center;"><?php echo $_SESSION['userName']; ?></div>
                
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
                                    
                                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $result['user_name']; ?>"/>
                                    <input type="hidden" name="hid" value="<?php echo $userId;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mn" class="cols-sm-2 control-label">Upload Your Image</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                        <input type="file" name="user_image" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-2" style="text-align: center;">
                            <input type="submit" name="updbtn" class="btn btn-secondary" value="Update Profile">
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