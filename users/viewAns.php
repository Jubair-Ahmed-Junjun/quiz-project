




<?php


    session_start();
    $userId = $_SESSION['userId'];
    if($userId == NULL){
        header('Location: ../index.php');
    }
    require 'function.php';
    $total = get_ques_rows();
    
   
    
   
   
    
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
                            <div class="card-header mch" style="text-align: center;">All Questions Answer </div>
                            
                            <div class="card-body row ">
                                
                                <div class="col-md-12 ml-3">
                                   <?php
                                   $get_all_result = get_all_ques();
                                        if($get_all_result){
                                            while ($get_result =  mysqli_fetch_assoc($get_all_result)){
                                        
                                   ?>
                                        <h5 class="mb-3">
                                            <span class="border-bottom">Ques <?php echo $get_result['ques_no']; ?></span> : <?php echo $get_result['ques']; ?>
                                        </h5>
                                        <div class="ml-4 mb-3">
                                            
                                            <?php
                                                $number = $get_result['ques_no'];
                                                $get_ans_result = get_ans($number);
                                                if($get_ans_result){
                                                    while ($ansResult = mysqli_fetch_assoc($get_ans_result)){
                                                
                                            ?>
                                            
                                            <div style="font-weight: bold;">
                                                
                                                <?php
                                                    if($ansResult['right_ans']=='1'){
                                                        echo '<input type="radio" checked/>';
                                                        echo "<span style='color: blue; margin-left: 5px;'>".$ansResult['ans']."</span>";
                                                    }  else {
                                                          echo '<input type="radio" style="margin-right: 5px;"/>';
                                                        echo $ansResult['ans'];
                                                    }
                                                     
                                                ?>
                                            </div>
                                                <?php } }?>
                                        </div>
                                        
                                    
                                        <?php } } ?>
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