
<?php

    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
    }
    if(isset($_GET['start'])){
        header('Location: main_exam.php');
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
                            <a href="#" class="nav-link">Exam</a>
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
    
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header mch" style="text-align: center;">Online Examination</div>
                            
                            <div class="card-body row">
                                <div class="col-md-6 border-right" style="text-align: center;">
                                    <img src="images/services1.jpg" alt="Profile Image" class="img-thumbnail" />
                                </div>
                                <div class="col-md-6 p-5">
                                    <div style="text-align: center">
                                        <img src="images/monitor.png" width="200px;">
                                    </div>
                                    <div style="text-align: center;" class="mt-3">
                                        <a href="?start=ex" class="btn btn-secondary p-2" style="width: 200px;">Start Test</a>
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