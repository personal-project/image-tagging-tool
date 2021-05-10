<?php 
 include 'connection.php';
 $ImgId = $_GET['id'];
 //echo $ImgId; exit;
 
 $sql = "SELECT t.image_id,t.tagged_id,t.analyzability,t.focus,t.shooting_range,t.no_halation,t.no_muddiness,t.no_occluding_object,t.remarks,i.image_name
             FROM tagging_image t
             INNER JOIN all_images i ON t.image_id = i.id
             WHERE t.image_id = '" . $ImgId . "'";
//echo $sql; exit;
          
$result = mysqli_query($db,$sql);
//$row = $result->fetch_assoc();
 //$row = mysqli_fetch_array($result);         


// $result = mysqli_query($db,$sql);
  // print_r($row); exit;
 $html = '';

	
	while($row = mysqli_fetch_array($result)) {

	 
      //print_r($row); exit;
	$analyzability_yes_checked = "";
	$analyzability_no_checked = "";

	if ($row['analyzability']=='Yes') {
		$analyzability_yes_checked = "checked";
	}
	else if($row['analyzability']=='No'){
		$analyzability_no_checked = "checked";
	}
    
    $focusMinusOne = "";
    $focusZero = "";
    $focusPlusOne = "";
    
    if ($row['focus']=='-1') {
		$focusMinusOne = "checked";
	} else if($row['focus']=='0'){
      $focusZero = "checked";
	}else if ($row['focus']=='+1'){
		$focusPlusOne = "checked";
	}

	$shootingMinusOne = "";
    $shootingZero = "";
    $shootingPlusOne = "";
    
    if ($row['shooting_range']=='-1') {
		$shootingMinusOne = "checked";
	} else if($row['shooting_range']=='0'){
      $shootingZero = "checked";
	}else if ($row['shooting_range']=='+1'){
		$shootingPlusOne = "checked";
	}


	$noHalationMinusOne = "";
    $noHalationZero = "";
    $noHalationPlusOne = "";
    
    if ($row['no_halation']=='-1') {
		$shootingMinusOne = "checked";
	} else if($row['no_halation']=='0'){
      $shootingZero = "checked";
	}else if ($row['no_halation']=='+1'){
		$shootingPlusOne = "checked";
	}
    

	$noMuddinessMinusOne = "";
    $noMuddinessZero = "";
    $noMuddinessPlusOne = "";
    
    if ($row['no_muddiness']=='-1') {
		$noMuddinessMinusOne = "checked";
	} else if($row['no_muddiness']=='0'){
      $noMuddinessZero = "checked";
	}else if ($row['no_muddiness']=='+1'){
		$noMuddinessPlusOne = "checked";
	}
    
    $noOccludingObjMinusOne = "";
    $noOccludingObjZero = "";
    $noOccludingObjPlusOne = "";
    
    if ($row['no_occluding_object']=='-1') {
		$noMuddinessMinusOne = "checked";
	} else if($row['no_occluding_object']=='0'){
      $noMuddinessZero = "checked";
	}else if ($row['no_occluding_object']=='+1'){
		$noMuddinessPlusOne = "checked";
	}

      
       $html .= '<div class="row">
      <div class="col-md-6">
       
       <img class="w-100" src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['image_name']).'" /> 
        <div class="group float-right">
          
        </div>
        <p>Original size image is shown in a new tab by clicking the image.
          画像をクリックすると，オリジナルサイズの画像が別のタブに表示されます．
        </p>
        </div>
       
      <div class="col-md-6">

       
         <div id="error" class="alert alert-danger" style="display: none"></div>

        <form   id="testform" method="post">
           <div class="form-group">
            <input type="text" class="form-control" name="ImgId" id="ImgId1" value="'.$row['image_id'].'" aria-describedby="ImgId" readonly  >
          </div>
          <div class="form-group">
            <label for="taggedId">Tagged by ID</label>
            <input type="text" class="form-control" name="taggedId" id="taggedId" aria-describedby="taggedID"  value="'.$row['tagged_id'].'" placeholder="Tagged ID">
          </div>
          <div class="form-group">
            <label for="analyzability">Analyzability (解析可能性)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="analyzability" id="analyzYes" value="Yes" '.$analyzability_yes_checked .'>
                <label class="form-check-label" for="analyzYes">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="analyzability" id="analyzeNo" value="No" '.$analyzability_no_checked .'>
                <label class="form-check-label" for="analyzeNo">No</label>
              </div>
            </div>
            <small id="" class="form-text  text-primary">Bad is -1 And Good in +1</small>
          </div>

          <div class="form-group">
            <label for="focus">Focus (ピント位置が適切か)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusMinusOne" value="-1" '.$focusMinusOne.'>
                <label class="form-check-label" for="focusMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusZero" value="0" '.$focusZero.'>
                <label class="form-check-label" for="focusZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusPlusOne" value="+1" '.$focusPlusOne.'>
                <label class="form-check-label" for="focusPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Shooting range (撮影範囲は適切か)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingMinusOne" value="-1" '.$shootingMinusOne.'>
                <label class="form-check-label" for="shootingMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingZero" value="0" '.$shootingZero.'>
                <label class="form-check-label" for="shootingZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingPlusOne" value="+1" '.$shootingPlusOne.'>
                <label class="form-check-label" for="shootingPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No halation (ハレーションはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationMinusOne" value="-1" '.$noHalationMinusOne.'>
                <label class="form-check-label" for="noHalationMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationZero" value="0" 
                '.$noHalationZero.'>
                <label class="form-check-label" for="noHalationZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationPlusOne" value="+1" '.$noHalationPlusOne.'>
                <label class="form-check-label" for="noHalationPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No muddiness (濁りはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessMinusOne" value="-1" '.$noMuddinessMinusOne.'>
                <label class="form-check-label" for="noMuddinessMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessZero" value="0" '.$noMuddinessZero.'>
                <label class="form-check-label" for="noMuddinessZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessPlusOne" value="+1" '.$noMuddinessPlusOne.'>
                <label class="form-check-label" for="noMuddinessPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No OccludingObj (濁りはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjMinusOne" value="-1" '.$noOccludingObjMinusOne.'>
                <label class="form-check-label" for="noOccludingObjMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjZero" value="0" '.$noOccludingObjZero.'>
                <label class="form-check-label" for="noOccludingObjZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjPlusOne" value="+1" '.$noOccludingObjPlusOne.'>
                <label class="form-check-label" for="noOccludingObjPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Remarks</label>
            <textarea class="form-control" name="remark" id="remark" rows="3" >'.$row['remarks'].'</textarea>
            <small id="emailHelp" class="form-text text-muted">please remark other reasons and evidence areas.
その他の要因や判断の根拠となる領域に関してのコメントをお願いします．</small>
          </div>
            
          


        </form>
          

      </div>
    </div>';
  


	}
    echo $html;
	mysqli_close($db);
?>