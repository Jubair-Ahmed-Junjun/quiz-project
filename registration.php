
<?php
    require 'users/connection.php';
    if(isset($_POST['btn'])){
        
        $name = $_POST['name'];
        $mobile_number = $_POST['mn'];
        $email = $_POST['email'];
        $un = $_POST['username'];
        $pass = md5($_POST['password']);
        $roll = $_POST['rn'];
        $sqlS = "SELECT * FROM registration_table";
        $row = mysqli_query($conn,$sqlS);
        if($row->num_rows == 0){
            $sql = "INSERT INTO registration_table(name,mobile_number,email,user_name,pass,roll,status) VALUES('$name','$mobile_number','$email','$un','$pass','$roll','2')";
            if(mysqli_query($conn, $sql)){
            header('Location: index.php');
            }  else {
                echo 'Data Not Insert';
            }
        }else{

            $sql = "INSERT INTO registration_table(name,mobile_number,email,user_name,pass,roll,status) VALUES('$name','$mobile_number','$email','$un','$pass','$roll','1')";
            if(mysqli_query($conn, $sql)){
            header('Location: index.php');
            }  else {
                echo 'Data Not Insert';
            }

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

<div class="container">
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header mch">Student Registration</div>
            <div class="card-body">

                <form class="form-horizontal" action="" method="POST" onsubmit="return validation()">

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Your Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group"> 
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="mn" class="cols-sm-2 control-label">Mobile Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="Number" class="form-control" name="mn" id="mn" placeholder="Enter your Username" required/>
                            </div>
                            <span id="smn" style="color:red;"></span>
                        </div>
                    </div>
                    <script type="text/javascript">

                            function validation(){
                                    //user Validation
                                    var mn = document.getElementById("mn").value;
                                    if(mn.length<11 || mn.length>=12){
                                            document.getElementById("smn").innerHTML="Invalid Mobile Number";
                                            return false;
                                    }
                            }

                    </script>
                    
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rn" class="cols-sm-2 control-label">Roll Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                
                                <input type="Number" class="form-control" name="rn" id="rn" placeholder="Enter your roll number" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" required/>
                            </div>
                            <span id="spass" style="color:red;"></span>
                        </div>
                    </div>
                    <script type="text/javascript">

                            function validation(){
                                    //Password Validation

                                    var UN = document.getElementById("password").value;
                                    if(UN.length<3 || UN.length>10){
                                            document.getElementById("spass").innerHTML="Password must have 3 to 10 charecter";
                                            return false;
                                    }

                            }

                    </script>
                    
                    <div class="form-group mt-2">
                        <input type="submit" name="btn" class="btn btn-danger">
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