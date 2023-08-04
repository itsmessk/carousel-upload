    
<?php 
$conn = mysqli_connect('localhost','root','','slides');
if(!$conn){
    echo "not connected".mysqli_error($conn);
    
}
?>
<?php
$msg = '';
if(isset($_POST['submit'])){
    
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($tmp_image,"images/$image");
    
    $query = "INSERT INTO slide (img) VALUES ('$image')";
    $query_result = mysqli_query($conn,$query);
    
    if($query_result){
        $msg = 'image upload successfully!';
    }else{
        $msg = 'error'.mysqli_error($conn);
    }
}

$query = "SELECT * FROM slide";
$result = mysqli_query($conn,$query);

$rowcount = mysqli_num_rows($result);

?>

<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
        <div class="row justify-content-center">
           
            <div class="col-sm-4 bg-dark">
                <h5 class="text-center text-success"><?php echo $msg; ?></h5>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group  bg-dark">
                    <input type="submit" name="submit" value="upload" class="form-control btn btn-success">
                </div>
                   
               </form>
                
            </div>
        </div>
        
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
</body>
</html>