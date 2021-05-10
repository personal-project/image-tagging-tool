<?php 
// Include the database configuration file  
require_once 'connection.php'; 
 
// Get image data from database 
$result = $db->query("SELECT * FROM all_images  ORDER BY id DESC"); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Fundus Image Tagging Tools</title>
    <style>
    .img-upload-form {
      margin-top: 50px;
    }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php if($result->num_rows > 0){ ?>
                <?php while($row = $result->fetch_assoc()){ ?>  
                    <div class="col-md-4">
                        <img style="width: 100%" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image_name']); ?>" /> 
                    </div>
                <?php } ?>
            <?php }else{ ?> 
                <p class="status error">Image(s) not found...</p> 
            <?php } ?>
     </div>
</body>
</html>

