<?php
    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
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
                            <div class="card-header mch" style="text-align: center;">You are done !</div>
                            
                            <div class="card-body row">
                                
                                <div class="col-md-12" style="text-align: center;">
                                    <div style="text-align: center; font-size: 20px;" class="border-bottom mb-2">
                                        <p>Congrats ! you have just completed the test.</p>
                                        <p>Final Score :<span style="color: green; font-weight: bold;">
                                            <?php
                                                if(isset($_SESSION['score'])){
                                                    echo $_SESSION['score'];
                                                    unset($_SESSION['score']);
                                                }
                                            ?>
                                                </span> 
                                        </p>
                                    </div>
                                    <div style="text-align: center;" class="mt-3">
                                        <a href="viewAns.php" class="btn btn-secondary p-2" style="width: 100%;">View Ans</a>
                                    </div>
                                    <div style="text-align: center;" class="mt-2">
                                        <a href="test.php" class="btn btn-secondary p-2" style="width: 100%;">Start Test</a>
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