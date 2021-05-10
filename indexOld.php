<?php
  require_once 'connection.php';
    //Step1
  // $db = mysqli_connect('localhost','root','','fundus_image')
  // or die('Error connecting to MySQL server.');
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
        <div class="col-md-12">
          <table>
<tr>
    <td>
    <a href="./sample.jpg" target="_blank"><img src="./Fundus_of_eye_normal.jpg" width="640"></a>
    <br>
    Original size image is shown in a new tab by clicking the image. <br>
    画像をクリックすると，オリジナルサイズの画像が別のタブに表示されます．
    </td>

    <td width="20">
    </td>

    <td>
        <form method="post" action="fundus_v1.php" enctype="multipart/form-data">
        <?php
            
            // $query = "SELECT * FROM single_image";
            // // echo $query;
            // mysqli_query($connect, $query) or die('Error querying database.');

            // $result = mysqli_query($connect, $query);
            // // var_dump($result);

            // $row = mysqli_fetch_array($result);
            // // echo $row['id'];
        
            // $res = $row['id'];
            
            // echo '<p>
            //       <input type="hidden" name="id" value="xxxx">
            //       Tagged by <strong>ID:'.$res.'</strong>
            //     </p>'
            // ?>
        <p>
                  <input type="hidden" name="id" value="xxxx">
                  Tagged by <strong>ID:'.$res.'</strong>
                </p>

        <p>
        <strong>Analyzability (解析可能性)</strong><br>
        <table>
    <tr>
<td><input type="radio" name="okng" value="yes" checked>Yes </td>
<td><input type="radio" name="okng" value="no">No </td>
</tr>
</table>
</p>

<p>
Focus (ピント位置が適切か)<br>
<table>
<tr>
<td width="60">Bad</td>
<td width="40"><input type="radio" name="focus" value="-1">-1 </td>
<td width="40"><input type="radio" name="focus" value="0">0 </td>
<td width="60"><input type="radio" name="focus" value="1" checked>+1 </td>
<td>Good </td>
</tr>
</table>

Shooting range (撮影範囲は適切か)<br>
<table>
<tr>
<td width="60">Bad</td>
<td width="40"><input type="radio" name="range" value="-1">-1 </td>
<td width="40"><input type="radio" name="range" value="0">0 </td>
<td width="60"><input type="radio" name="range" value="1" checked>+1 </td>
<td>Good </td>
</tr>
</table>

No halation (ハレーションはないか)<br>
<table>
<tr>
<td width="60">Bad</td>
<td width="40"><input type="radio" name="hal" value="-1">-1 </td>
<td width="40"><input type="radio" name="hal" value="0">0 </td>
<td width="60"><input type="radio" name="hal" value="1" checked>+1 </td>
<td>Good </td>
</tr>
</table>

No muddiness (濁りはないか)<br>
<table>
<tr>
<td width="60">Bad</td>
<td width="40"><input type="radio" name="mud" value="-1">-1 </td>
<td width="40"><input type="radio" name="mud" value="0">0 </td>
<td width="60"><input type="radio" name="mud" value="1" checked>+1 </td>
<td>Good </td>
</tr>
</table>

No occluding object (まつ毛などの映り込みはないか)<br>
<table>
<tr>
<td width="60">Bad</td>
<td width="40"><input type="radio" name="occ" value="-1">-1 </td>
<td width="40"><input type="radio" name="occ" value="0">0 </td>
<td width="60"><input type="radio" name="occ" value="+1" checked>+1 </td>
<td>Good </td>
</tr>
</table>

<p>
Remarks: please remark other reasons and evidence areas. <br>
その他の要因や判断の根拠となる領域に関してのコメントをお願いします．<br>
<textarea name="remarks" rows="4" cols="60">

</textarea>
</p>

<p>
<table>
<tr>
<td width="150">
<input type="submit" value="Back" tabindex="1">
<button type="submit" value="Next" tabindex="1"> Next</button>
</td>
<td>
<input type="reset" value="Reset" tabindex="1">
</td>
</p>

</form>
</td>
</tr>
        </div>
    </div>
  </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
  
  </body>
</html>
