<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if($admin_id==NULL){
        header('Location: ../index.php');
    }
    if(isset($_GET['status'])){
        require 'function.php';
        admin_logout_info();
    }
    if(isset($_GET['edit'])){
        header('Location: editprofile.php');
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header mch" style="text-align: center; color: crimson; font-weight: bold;"><?php echo $_SESSION['admin_name']; ?></div>
                
                <div class="card-body row">
                    <div class="col-md-4 border-right">
                        <img src="<?php echo $result['image']; ?>" alt="Profile Image" class="img-thumbnail" />
                    </div>
                    <div class="col-md-8 p-5">
                        <h5 class="mt-3" style="color: crimson; font-style: italic; font-weight: bold;">Your Name : <?php echo $result['name']; ?></h5>
                        <h5 class="mt-3" style="color: crimson; font-style: italic; font-weight: bold;">Your Mobile Number : <?php echo $result['mobile_number']; ?></h5>
                        <h5 class="mt-3" style="color: crimson; font-style: italic; font-weight: bold;">Your Email : <?php echo $result['email']; ?></h5>
                        <h5 class="mt-3" style="color: crimson; font-style: italic; font-weight: bold;">Your User Name : <?php echo $result['user_name']; ?></h5>
                        <div style="text-align: center;" class="mt-3 mb-2">
                            <a href="?edit=s" class="btn btn-danger">Edit Profile</a>
                            <a href="?status=logout" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>
</html>