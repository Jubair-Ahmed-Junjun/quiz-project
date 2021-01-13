


<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if($admin_id==NULL){
        header('Location: ../index.php');
    }
    
?>
<?php
    require 'function.php';
    $total = get_ques_rows();
    $next = $total+1;
    
    if(isset($_POST['btn'])){
        require 'connection.php';
        $qn = $_POST['ques_no'];
        $ques = $_POST['ques'];
        $ans = array();
        $ans[1]= $_POST['ans1'];
        $ans[2]= $_POST['ans2'];
        $ans[3]= $_POST['ans3'];
        $rightAns = $_POST['right_ans'];
        $sql = "INSERT INTO tbl_ques(ques_no,ques) VALUES('$qn','$ques')";
        if($row = mysqli_query($conn, $sql)){
            //$row = mysqli_query($conn, $sql);
        }
        if($row){
                foreach ($ans as $key => $ansName){
                    if($ansName != ''){
                        if($rightAns == $key){
                            $rquery = "INSERT INTO tbl_ans(ques_no,right_ans,ans) VALUES('$qn','1','$ansName')";
                        }  else {
                            $rquery = "INSERT INTO tbl_ans(ques_no,right_ans,ans) VALUES('$qn','0','$ansName')";
                        }
                        if($insiderow = mysqli_query($conn, $rquery)){
                            //$insiderow = mysqli_query($conn, $rquery);
                            }
                            if($insiderow){
                                continue;
                                
                            }  else {
                                echo "Error";
                            }
                    }
                }
              header('Location: quesList.php');
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
                            <div class="card-header mch" style="color: #dc3545;">Add Question</div>
                            
                            <div class="card-body">

                                <form class="form-horizontal" action="" method="POST">

                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Question No :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group"> 
                                                <input type="number" class="form-control" name="ques_no" value="<?php if(isset($next)){
                                                    echo $next;
                                                } 
                                                    ?>" placeholder="Enter question Number" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="mn" class="cols-sm-2 control-label">Question Description :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" name="ques" placeholder="Write question" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Choice One :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ans1" placeholder="Enter choice one" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Choice Two :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ans2" placeholder="Enter choice two" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Choice Three :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ans3" placeholder="Enter choice three" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Correct Answer :</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="right_ans" placeholder="Enter correct ans" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group mt-2">
                                        <input type="submit" name="btn" class="btn btn-danger" value="Add Question" />
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