<?php
include 'connection.php';
 $ImgId = $_GET['id'];
 $query="SELECT id FROM all_images WHERE id >'" . $ImgId . "' order by id ASC";

$result = mysqli_query($db,$query);
$cust = mysqli_fetch_array($result);
// print_r($cust); exit;
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $query . "" . mysqli_error($db);
}

mysqli_close($db);

?>