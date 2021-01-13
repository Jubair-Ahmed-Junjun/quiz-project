

<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if($admin_id==NULL){
        header('Location: ../index.php');
    }
    require 'connection.php';
    $sql = "SELECT * FROM registration_table WHERE status='1' OR status='0'";
    if(mysqli_query($conn, $sql)){
        $row = mysqli_query($conn, $sql);
    }
    
?>
<?php
    if(isset($_GET['dis'])){
        require 'function.php';
        $dis = (int)$_GET['dis'];
        $dsmass = update_status_for_disable($dis);
    }
    if(isset($_GET['ena'])){
        require 'function.php';
        $ena = (int)$_GET['ena'];
        $enmass = update_status_for_enable($ena);
    }
    if(isset($_GET['del'])){
        require 'function.php';
        $del = (int)$_GET['del'];
        $delmass = delete_user($del);
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
        <div class="mt-4">
            <h2 style="color: crimson;">Students List</h2>
            <?php
                if(isset($dsmass)){
                    echo $dsmass;
                }
                if(isset($enmass)){
                    echo $enmass;
                }
                if(isset($delmass)){
                    echo $delmass;
                }
            ?>
        </div>
    </div>

    <div class="container">
          <div class="tbl mt-4">
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Student's Name</th>
                  <th scope="col">Roll No.</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 0;
                    while ($result=mysqli_fetch_assoc($row)) {
                        $i++;
                      ?>
                    <tr>
                      <td><?php 
                      
                      if($result['status']=='0'){
                          echo '<span style="color:red">'.$i.'<span>';
                      }  else {
                          echo $i;
                      } ?></td>
                      
                      <td><?php echo $result['name']; ?></td>
                      <td><?php echo $result['roll']; ?></td>
                      <td><?php echo $result['mobile_number']; ?></td>
                      <td><?php echo $result['email']; ?></td>
                      
                      <td>
                      <?php
                        if($result['status']=='1'){
                            ?>
                          <a onclick="return confirm('Are you sure to Disable')" href="?dis=<?php echo $result['id'] ?>" class="btn btn-danger">Disable</a>
                       <?php }  else {?>
                            <a onclick="return confirm('Are you sure to Enable')" href="?ena=<?php echo $result['id'] ?>" class="btn btn-danger">Enable</a> 
                        <?php } ?>
                           <a onclick="return confirm('Are you sure to Remove')" href="?del=<?php echo $result['id'] ?>" class="btn btn-danger">Remove</a>
                           <a href="studentEdit.php?edit=<?php echo $result['id'] ?>" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>

          
        </div>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>
</html>


