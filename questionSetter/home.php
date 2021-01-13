
<?php
    session_start();
    $quesSet_id = $_SESSION['quesSetId'];
    if($quesSet_id==NULL){
        header('Location: ../index.php');
    }
    
?>
<?php

    require 'connection.php';
    $sql = "SELECT * FROM registration_table WHERE status = '2' OR status = '3'";
    if(mysqli_query($conn,$sql)){
        $row = mysqli_query($conn,$sql);
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
    <section id="body" class="mt-3">
        <div class="container">
            <div class="jumbotron bg-danger">
                <p class="lead" style="color: white;font-style: italic">Yeah well, that's just, ya know, like, your opinion, man. Walter, you can't do that. These guys're like me, they're pacifists. Smokey was a conscientious objector. Your "revolution" is over, Mr. Lebowski! Condolences! The bums lost! Brandt can't watch though. Or he has to pay a hundred. HERE'S WHAT HAPPENS, LARRY! Darkness warshed over the Dude— darker'n a black steer's tookus on a moonless prairie night. There was no bottom.</p>
            </div>
             <p>Mr. Lebowski asked me to repeat that: Her life is in your hands. They're nihilists. Now this story I'm about to unfold took place back in the early nineties —just about the time of our conflict with Sad'm and the Eye-rackies. I only mention it 'cause some- times there's a man—I won't say a hee-ro, 'cause what's a hee-ro?—but sometimes there's a man. Our basic freedoms.</p>


            <!--Markup for Table-->
            <div class="row">
                <div class="col-md-12">
                    <h3>Admin List</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th>Name</th>
                                <th>Character</th>
                            </tr>
                            </thead>
                            <?php $i=1; ?>
                            <?php while($result = mysqli_fetch_assoc($row)){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $result['name'] ?></td>
                                    <?php if($result['status'] == 2){ ?>
                                        <td>Admin</td>
                                    <?php }else{ ?>
                                        <td>Question Setter</td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; } ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

</body>
</html>