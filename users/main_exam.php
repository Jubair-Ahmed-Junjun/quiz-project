

<?php


    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
    }
    require 'function.php';
    $total = get_ques_rows();
    
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques";
    if(mysqli_query($conn, $sql)){
        $row = mysqli_query($conn, $sql);
        $ques = mysqli_fetch_assoc($row);
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
                            <div class="card-header mch" style="text-align: center;">Welcome To Online Examination</div>
                            
                            <div class="card-body row">
                                
                                <div class="col-md-12" style="text-align: center;">
                                    <div style="text-align: center;" class="border-bottom mb-2">
                                        <h5>Test Your Knowledge</h5>
                                    </div>
                                    <div>
                                        <p style="font-size: 20px;">This is multiple choice quiz to test your knowledge.</p>
                                        <p style="font-weight: bold">Number Of Question : <?php echo '<span style="color: green;">'.$total.'</span>'; ?></p>
                                        <p style="font-weight: bold">Question Type : Multiple Choice</p>
                                        
                                    </div>
                                    <div style="text-align: center;" class="mt-3">
                                        <a href="test.php?q=<?php echo $ques['ques_no']; ?>" class="btn btn-secondary p-2" style="width: 100%;">Start Test</a>
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