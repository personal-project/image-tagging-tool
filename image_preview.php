<?php
    include 'header.php';
    $imgId = $_GET['imgId']; 
    $result = mysqli_query($db, "SELECT * FROM all_images WHERE id = $imgId");
    if($row = mysqli_fetch_array($result))
    {
        $title = $row['image_name'];
    }
?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($title); ?>" /> 
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>