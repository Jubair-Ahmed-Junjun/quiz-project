
<?php
require 'connection.php';
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '<hr/>';
//echo $_FILES['pi']['tmp_name'];

$derectory = 'admin_image/';
$target_file = $derectory.$_FILES['pi']['name'];
$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
echo 'File type is: '.$file_type;
echo '<br/>';
$file_size = $_FILES['pi']['size'];
echo 'File size is: '.$file_size;
echo '<br/>';

$check = getimagesize($_FILES['pi']['tmp_name']);
if($check){
    if(file_exists($target_file)){
        echo 'This image is alrady exists';
    }  else {
        if($file_type!='jpg' && $file_type!='png'){
            echo 'This is not an image';
        }  else {
            if($file_size>500000){
                echo 'Your image size is too large';
            }  else {
                move_uploaded_file($_FILES['pi']['tmp_name'], $target_file);
                $sql = "INSERT INTO image_tbl(image_name,image) VALUES('$_POST[in]','$target_file')";
                mysqli_query($conn, $sql);
                echo 'Image uploaded';
        }
        }
    }
}  else {
    echo 'Your upload file is not an image';
}



//move_uploaded_file($_FILES['pi']['tmp_name'], $target_file);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Photo</title>
    </head>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
        <tr>
            <td>Image Name</td>
            <td><input type="text" name="in"/></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="pi"/></td>
        </tr>
        <tr>
            <td rowspan="2"><input type="submit" name="btn"/></td>
        </tr>
    </table>
    </form>
    
    <hr/>
    <?php
        $sqli="SELECT * FROM image_tbl";
        $row = mysqli_query($conn, $sqli);
        
    
    ?>
    <table>
        <?php while ($result=  mysqli_fetch_assoc($row)){ ?>
        <tr>
            <td><?php echo $result['image_name']; ?></td>
            <td><img src="<?php echo $result['image']; ?>"></td>
        </tr>
        <?php } ?>
    </table>
    
</html>