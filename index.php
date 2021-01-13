<?php
    //require 'connection.php';
    session_start();
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];
        if($admin_id!=NULL){
            header('Location: admin/adminhome.php');
        }
    }
    if(isset($_POST['loginbtn'])){
        require 'admin/connection.php';
        $password = md5($_POST['password']);
        $sql = "Select * FROM registration_table WHERE 	user_name = '$_POST[userName]' AND pass ='$password'";
        if(mysqli_query($conn, $sql)){
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            $s = $result['status'];
            if($s == 2){
                if($result){
                    session_start();
                    $_SESSION['admin_id'] = $result['id'];
                    $_SESSION['admin_name'] = $result['name'];
                    header('Location: admin/adminhome.php');
                }  else {
                    echo 'Invalid UserName and Password';
                }
            }
            if($s == 1){
                if($result){
                    session_start();
                    $_SESSION['userId'] = $result['id'];
                    $_SESSION['userName'] = $result['name'];
                    header('Location: users/userhome.php');
                }  else {
                    echo 'Invalid UserName and Password';
                }
            }
            if($s == 3){
                if($result){
                    session_start();
                    $_SESSION['quesSetId'] = $result['id'];
                    $_SESSION['quesSetName'] = $result['name'];
                    header('Location: questionSetter/home.php');
                }  else {
                    echo 'Invalid UserName and Password';
                }
            }
        } else {
            echo 'Error';
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

<?php include 'includes/navber.php'; ?>

<main class="login-form mt-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mch">Login Home</div>
                    <div class="card-body">
                        <form action="" method="POST" class="mt-5 mb-5">
                            <div class="form-group row">
                                <label for="userName" class="col-md-4 col-form-label text-md-right">User Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="userName" class="form-control" name="userName" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>



                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger" name="loginbtn">
                                    Login
                                </button>
                            </div>
                            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</main>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>
</html>
