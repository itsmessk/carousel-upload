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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>slider</title>
</head>
<body>
  
   <div class="container-fluid">
      <div class="row">
           <div class="col-sm-12">
               <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-indicators">
                    
                  </div>
                  <div class="carousel-inner">
                      <?php
                      for($i=1;$i<=$rowcount;$i++)
                      {
                          $row = mysqli_fetch_array($result);
                      
                          if($i==1){
                      ?>
                    <div class="carousel-item active">
                        <img src="images/<?php echo $row['img'];?>" class="d-block w-100" alt="..." width="100%" height="400px">
                    </div>
                      <?php }
                      else{
                      ?>
                    <div class="carousel-item">
                    <img src="images/<?php echo $row['img'];?>" class="d-block w-100" alt="..." width="100%" height="400px">
                    </div>
                    <?php 
                    } ?>
                    <?php }  
                    ?>
                    
                    
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
  </a>
                </div>
            </div>
      </div>
    </div>
          
   
    
    
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>