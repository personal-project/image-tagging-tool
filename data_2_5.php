<?php
  include 'header.php';
  $id = $_GET['id']; 
?>
<section class="image-data-section mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="show_message" class="alert alert-success" style="display: none">Data has been successfully inserted in database!</div>
        <div id="error" class="alert alert-danger" style="display: none"></div>  
    </div>
    </div>
    <div class="row">
      <div class="col-md-6" style="margin-top: 34px"> 
        <?php 
          $result = mysqli_query($db, "SELECT * FROM all_images WHERE id = $id");
          if($row = mysqli_fetch_array($result))
          {
            $title = $row['image_name'];
            $imgId = $row['id'];
            
          }
        ?>
        
        <a href="image_preview.php?imgId=<?php echo  $imgId; ?>"  target="_blank">
        <!-- <a href="data.php?id='.$row['id'].'">'.$row['content_name'].'</a> -->
          <img class="w-100 tagging-img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($title); ?>" /> 
        </a>
        <p>Original size image is shown in a new tab by clicking the image.
          画像をクリックすると，オリジナルサイズの画像が別のタブに表示されます．
        </p>
        <div class="group">
          <?php
            // Previous button 
            $previous= mysqli_query($db, "SELECT * FROM all_images WHERE id<$id order by id DESC");

            if($row = mysqli_fetch_array($previous))
            {

              echo '<a href="data.php?id='.$row['id'].'"><button type="button" class="btn btn-info mr-2">Previous</button></a>';  
            } 
            // Previous button end
            // Next button 
            $next = mysqli_query($db, "SELECT * FROM all_images WHERE id>$id order by id ASC");
            if($row = mysqli_fetch_array($next))
            {

              echo '<a href="data.php?id='.$row['id'].'"><button type="button" class="btn btn-success">Next</button></a>';  
            } 
          ?>
        </div>
      </div>
      <div class="col-md-6">
      <div id="error" class="alert alert-danger" style="display: none"></div>
        <form id="testform" method="post">
           <div class="form-group">
            <input type="text" class="form-control" name="ImgId" id="ImgId" aria-describedby="ImgId" readonly value="<?php echo $id; ?>" >
          </div>
          <div class="form-group">
            <label for="taggedId">Tagged by ID</label>
            <input type="text" class="form-control" name="taggedId" id="taggedId" aria-describedby="taggedID"  value="" placeholder="Tagged ID">
          </div>
          <div class="form-group">
            <label for="analyzability">Analyzability (解析可能性)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="analyzability" id="analyzYes" value="Yes">
                <label class="form-check-label" for="analyzYes">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="analyzability" id="analyzeNo" value="No">
                <label class="form-check-label" for="analyzeNo">No</label>
              </div>
            </div>
            <small id="" class="form-text  text-primary">Bad is -1 And Good in +1</small>
          </div>
          <div class="form-group">
            <label for="focus">Focus (ピント位置が適切か)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusMinusOne" value="-1">
                <label class="form-check-label" for="focusMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusZero" value="0">
                <label class="form-check-label" for="focusZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="focus" id="focusPlusOne" value="+1">
                <label class="form-check-label" for="focusPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Shooting range (撮影範囲は適切か)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingMinusOne" value="-1">
                <label class="form-check-label" for="shootingMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingZero" value="0">
                <label class="form-check-label" for="shootingZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="shottingRange" id="shootingPlusOne" value="+1">
                <label class="form-check-label" for="shootingPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No halation (ハレーションはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationMinusOne" value="-1">
                <label class="form-check-label" for="noHalationMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationZero" value="0">
                <label class="form-check-label" for="noHalationZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noHalation" id="noHalationPlusOne" value="+1">
                <label class="form-check-label" for="noHalationPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No muddiness (濁りはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessMinusOne" value="-1">
                <label class="form-check-label" for="noMuddinessMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessZero" value="0">
                <label class="form-check-label" for="noMuddinessZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noMuddiness" id="noMuddinessPlusOne" value="+1">
                <label class="form-check-label" for="noMuddinessPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>No OccludingObj (濁りはないか)</label>
            <div class="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjMinusOne" value="-1">
                <label class="form-check-label" for="noOccludingObjMinusOne">-1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjZero" value="0">
                <label class="form-check-label" for="noOccludingObjZero">0</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="noOccludingObj" id="noOccludingObjPlusOne" value="+1">
                <label class="form-check-label" for="noOccludingObjPlusOne">+1</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Remarks</label>
            <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
            <small id="emailHelp" class="form-text text-muted">please remark other reasons and evidence areas.
その他の要因や判断の根拠となる領域に関してのコメントをお願いします．</small>
          </div>
          <div class="form-group">
            <input type="submit" value="Save" name="submit" id="butsave" class="btn btn-primary"/>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
 
<script type="text/javascript">

$(document).ready(function(){
     $("#butsave").click(function(){
         

         $("#butsave").attr("disabled", "disabled");

           $("#error").hide();
  
             //Tagged Id 
             var taggedId = $("#taggedId").val();
            if(taggedId == ""){
                 $("#error").show().text("Tagged Id required.");
                 $("#taggedId").focus();
                 $("#butsave").removeAttr("disabled");
                 return false;
             }
  
             // remark
             var remark = $("#remark").val();
             if(remark == ""){
                 $("#error").show().text("Remark required");
                 $("#remark").focus();
                 $("#butsave").removeAttr("disabled");
                 return false;
             }
  
             // Analyzability
             var getanalyzabilityValue = document.querySelector( 'input[name="analyzability"]:checked');   
             if(getanalyzabilityValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("Analyzability Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              }
                
               // focus
             var getfocusValue = document.querySelector( 'input[name="focus"]:checked');   
             if(getfocusValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("Focus Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              } 
              
                // shottingRange
             var getshottingRangeValue = document.querySelector( 'input[name="shottingRange"]:checked');   
             if(getshottingRangeValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("ShottingRange Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              }   
              
               // noHalation
             var getnoHalationRangeValue = document.querySelector( 'input[name="noHalation"]:checked');   
             if(getnoHalationRangeValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("NoHalation Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              }    

                // noMuddiness
             var getnoMuddinessValue = document.querySelector( 'input[name="noMuddiness"]:checked');   
             if(getnoMuddinessValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("NoMuddiness Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              } 
              
                 // noMuddiness
             var getnoOccludingObjValue = document.querySelector( 'input[name="noOccludingObj"]:checked');   
             if(getnoOccludingObjValue == null) {   
                      //document.write(" Radio button is selected"); 
                      $("#error").show().text("NoOccludingObj Nothing has been selected");
                      $("#butsave").removeAttr("disabled");
                      return false;
              }

               var ImgId = $("#ImgId").val(); 

         //alert(ImgId);
 
   $.ajax({
     url: "insert-data.php",
     type: "POST",
     data: $("#testform").serialize(),
     //dataType: 'json',
     async: true,
     cache: false,
     success: function(data){
     //   data=data.replace(/\\s+/g,"");

       //alert(data);
     if(data == "true"){
          $("#butsave").removeAttr("disabled");
         $('#testform').find('input:text').val('');
          

         getData(ImgId);

       //alert("Error occured !")


         //$("#show_message").fadeIn();          
       }
       else {
          //alert("Error occured !");

          $("#error").fadeIn().text("Error occured");
         return false;
       }

     }
   });



     });

    
    function getData(ImgId) {
     //alert(ImgId);

       
          $.ajax({    //create an ajax request to display.php
         type: "GET",
         url: "getImgTagData.php",
         data: { id: ImgId },             
         dataType: "html",   //expect html to be returned                
         success: function(response){ 
                $("#show_message").show();
              $('#show_message').html('Data added successfully !');   
                                
              $("#responsecontainer").html(response); 
              $("#myModal").modal('show'); 

             //alert(response);
         }
 
     })

   }

      



$('#CloseRequest').click(function(){
   var ImgId1 = $("#ImgId1").val();
  //alert(ImgId1);
 $.ajax({    //create an ajax request to display.php
         type: "GET",
         url: "getNextImg.php",
         data: { id: ImgId1 },   
         dataType: 'json',   //expect html to be returned                
         success: function(data){ 
                
         var id = data[0];
         var url = "data.php?id=";    
         url += id;
         window.location.href = url;
         }
 
     })
 
 });
  
 });
</script>

<?php include 'footer.php'; ?>
