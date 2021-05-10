<?php 
   include 'header.php';
?>
<div class="container" style="margin-top: 50px;margin-bottom: 50px">
   <div class="row">
      <div class="col-md-12">
         <h2 style="text-align:center">Ophthalmology Random Data</h2>
      </div>
   </div>
   <div class="row"  style="margin-top: 50px;">
      <?php 
         $result = mysqli_query($db, "SELECT * FROM all_images ORDER BY id DESC");
         while($row = mysqli_fetch_array($result)) {         
         echo  
         '<div class="col-md-4">
            <li class="after-border">
               <a href="data.php?id='.$row['id'].'">'.$row['content_name'].'</a>
            </li> 
         </div>';
         }
      ?>
   </div>
</div>
<?php include 'footer.php'; ?>