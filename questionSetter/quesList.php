
<?php
    session_start();
    $quesSet_id = $_SESSION['quesSetId'];
    if($quesSet_id==NULL){
        header('Location: ../index.php');
    }
    
?>
<?php
    require 'connection.php';
    $sql = "SELECT * FROM tbl_ques";
    if(mysqli_query($conn, $sql)){
        $row = mysqli_query($conn, $sql);
    }
    
?>
<?php
    if(isset($_GET['delq'])){
        require 'function.php';
        $delq = (int)$_GET['delq'];
        $delqmass = delete_ques($delq);
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
            <h2 style="color: #3548dc;">Questions List</h2>
            <?php
                if(isset($delqmass)){
                    echo $delqmass;
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
                  <th scope="col">Question</th>
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
                              echo $i;
                       ?></td>
                      
                      <td><?php echo $result['ques']; ?></td>
                      <td>
                        <a onclick="return confirm('Are you sure to Remove')" href="?delq=<?php echo $result['ques_no'] ?>" class="btn btn-danger">Remove</a>
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


