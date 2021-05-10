<?php
    require 'connection.php';
    $okng = $_POST['okng'];
    $focus = $_POST['focus'];
    $range =$_POST['range'];
    $hal = $_POST['hal'];
    $mud = $_POST['mud'];
    $occ = $_POST['occ'];
    $remarks_str = $_POST['remarks'];
    $remarks = mysqli_real_escape_string($connect,$remarks_str);

    // random number script
    $digit = 9;
    $random_num = '';
    $count = 0;

    while($count < $digit) {
        $random_digit = mt_rand(0,9);
        $random_num .= $random_digit;
        $count++;
    }

    $insert_var = "INSERT INTO `single_image`
                (`id`,`analyzability`,`foucs`,`shooting_range`,`no_halation`,`no_muddi`,`no_occluding`,`remarks`)
                VALUES ('$random_num','$okng','$focus','$range','$hal','$mud','$occ','$remarks')";
    $insert_query = mysqli_query($connect,$insert_var);
    // var_dump($insert_query);

    if($insert_var){
        echo "<script type='text/javascript'>";
        echo "alert('Image tag info successfully inserted into database!');";
        echo 'window.location.href = "index.php"';
        echo "</script>";
    }else {
        echo "<script type='text/javascript'>";
        echo "alert('Image tag info insert operation is not successful!');";
        echo 'window.location.href = "index.php"';
        echo "</script>";
    }
?>