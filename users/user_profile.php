


<?php
    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
    }
    if(isset($_GET['status'])){
        require 'function.php';
        user_logout_info();
    }
    if(isset($_GET['edit'])){
        header('Location: user_profile_edit.php');
    }
?>
<?php
    require 'connection.php';
    $sql = "SELECT * FROM  registration_table WHERE id='$userId'";
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
                           <a href="#" class="nav-link">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
<div class="row justify-content-center mt-4">    
    <div class="col-md-10">
        <div class="card">
            <div class="card-header mch" style="text-align: center;"><?php echo $_SESSION['userName']; ?></div>
            
            <div class="card-body row">
                <div class="col-md-4 border-right" style="text-align: center;">
                    <img src="<?php echo $result['image']; ?>" alt="Profile Image" class="img-thumbnail" />
                </div>
                <div class="col-md-8 p-5">
                    <h5 class="mt-3" style="color: gray; font-style: italic">Your Name : <?php echo $result['name']; ?></h5>
                    <h5 class="mt-3" style="color: gray; font-style: italic">Your Mobile Number : <?php echo $result['mobile_number']; ?></h5>
                    <h5 class="mt-3" style="color: gray; font-style: italic">Your Email : <?php echo $result['email']; ?></h5>
                    <h5 class="mt-3" style="color: gray; font-style: italic">Your User Name : <?php echo $result['user_name']; ?></h5>
                    <div style="text-align: center;" class="mt-3 mb-2">
                        <a href="?edit=s" class="btn btn-secondary">Edit Profile</a>
                        <a href="?status=logout" class="btn btn-secondary">Logout</a>
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