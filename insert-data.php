<?php
   include 'connection.php';
    
    //extract($_POST);
    
    // if(mysqli_query($db, "INSERT INTO tagging_image(image_id,tagged_id,analyzability,focus,shooting_range,no_halation,no_muddiness,no_occluding_object,remarks)VALUES('" . $ImgId . "', '" . $taggedId . "', '" . $analyzability . "','".$focus."','".$shottingRange."','".$noHalation."','".$noMuddiness."','".$noOccludingObj."','".$remark."')")) {
    //  echo '1';
    //  exit;
    // } else {
    //    echo "Error: " . $sql . "" . mysqli_error($db);
    // }
 
    // mysqli_close($db);


    $ImgId=$_POST['ImgId'];
	$taggedId=$_POST['taggedId'];
	$analyzability=$_POST['analyzability'];
	$focus=$_POST['focus'];
	$shottingRange=$_POST['shottingRange'];
    $noHalation=$_POST['noHalation'];
    $noMuddiness=$_POST['noMuddiness'];
    $noOccludingObj=$_POST['noOccludingObj'];
    $remark=$_POST['remark'];

    $sql = "INSERT INTO tagging_image(image_id,tagged_id,analyzability,focus,shooting_range,no_halation,no_muddiness,no_occluding_object,remarks)VALUES('" . $ImgId . "', '" . $taggedId . "', '" . $analyzability . "','".$focus."','".$shottingRange."','".$noHalation."','".$noMuddiness."','".$noOccludingObj."','".$remark."')";

    //echo $sql;
	if (mysqli_query($db, $sql)) {
		echo "true";
	} 
	else {
		echo "MYSQL Error : ";
	}
	mysqli_close($db);




	// if (mysqli_query($db, $sql)) {
	// 	echo json_encode(array("statusCode"=>200));
	// } 
	// else {
	// 	echo json_encode(array("statusCode"=>201));
	// }
	// mysqli_close($db);
	 
?>