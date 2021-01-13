



<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if($admin_id==NULL){
        header('Location: ../index.php');
    }
?>

<?php 
require 'connection.php';
    if(isset($_GET['edit'])){
        $edit = (int)$_GET['edit'];

        $sql = "SELECT * FROM registration_table WHERE id='$edit'";
        if($row = mysqli_query($conn,$sql)){
            $result = mysqli_fetch_assoc($row);
        }
    }
?>
<!-- <?php
    if(isset($_GET['adminStatus'])){
        $adminEdit = (int)$_GET['adminStatus'];  
    }
?> -->

<?php
    if(isset($_POST['submit'])){
        $selectRole = $_POST['role'];
        $hid = $_POST['hid'];
        $usql = "UPDATE registration_table SET status = '$selectRole' WHERE id='$hid'";
        if(mysqli_query($conn,$usql)){
            if($selectRole == 2 || $selectRole == 3){
                header('Location: adminList.php');
            }else {
                header('Location: manageUser.php');
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

    
<?php 
    include 'includes/navber.php';
?>

<div class="container">
<div class="row justify-content-center mt-4">
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header mch" style="text-align: center;"><?php echo $result['name'] ?></div>
            
            <div class="card-body row">
                
                <form action="" method="post" class="ml-5">
                    <label>Select The Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1">Student</option>
                        <option value="2">Admin</option>
                        <option value="3">Question Setter</option>
                    </select>
                    <input type="hidden" name="hid" value="<?php echo $result['id'];?>"/>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger" name="submit">Submit</button>
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