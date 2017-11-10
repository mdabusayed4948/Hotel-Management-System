<div class="topstyle">
 <h3 class="styl">Create Reservation</h3>
</div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$room_id  = validate($_POST["cmbRoomid"]);
		$guest_id = validate($_POST["cmbGuestId"]);
		$checkin  = validate($_POST["checkin"]);
		$checkout = validate($_POST["checkout"]);
		$pprice   = validate($_POST["txtpPrice"]);
		$dprice   = validate($_POST["txtdPrice"]);
		$status   = validate($_POST["cmbStatus"]);
		$rstatus  = validate($_POST["cmbRstatus"]);
		
		$errors =array();
		
		if($room_id==""){
		  array_push($errots,"Room Id Field is Empty !!");	
		}
		
		if($guest_id==""){
			array_push($errors, "Guest Id field is Empty !!");	
		}
		
		if($checkin==""){
			array_push($errors, "Checkin Field is Empty !!");	
		}
		
		if($checkout==""){
			array_push($errors, "Checkout Field is Empty !!");	
		}
		
		if($pprice==""){
			array_push($errors,"Paid Rate field is empty !!");	
		}
		
		if($dprice==""){
		 	array_push($errors,"Due Rate field is empty !!");	
		}
		
		if($status==""){
			array_push($errors,"Status Field is Empty !!");	
		}
		
		if(count($errors)==0){
			$db->query("insert into b_income(guest_id,room_id,checkin_date,checkout_date,p_price,d_price,status,fstatus) values('$room_id','$guest_id','$checkin','$checkout','$pprice','$dprice','$status','$rstatus')");
			
			
			echo "<div class='alert alert-success alert-dismissable'>
  	 		 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   			 <strong>Success!</strong> Successfully Created.
  			</div>";
			$room_id=$guest_id=$checkin=$checkout="";
			
		}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
  
			}
		
		
	}
	
	function validate($data) {
 		 $data = trim($data);
 		 $data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>

<div><a class="btn btn-success" style="text-decoration:none; float:right" href="home.php?item=24"><i class='glyphicon glyphicon-list'></i> Reservation List</a></div>

<form class="form-horizontal" method="post" action="home.php?item=23">


    
    <div class="form-group">
    <label class="control-label col-sm-4">Guest ID :</label>
    <div class="col-sm-5">
    	<select class="form-control" name="cmbGuestId">
        	<?php
              $guest_table = $db->query("select id,name,email,contact_no from b_guest where status='Active'");
			  while(list($id,$name,$email,$contact)=$guest_table->fetch_row()){
				  echo "<option value='$id'>Id= $id | $name | $email | $contact</option>";
				  }
			?>
        </select>
    </div>
    
    </div>
    
    	<div class="form-group">
    <label class="control-label col-sm-4">Room ID :</label>
    <div class="col-sm-5">
    	<select name="cmbRoomid" class="form-control">
        	<?php 
				$reserv_table =$db->query("select id,room_no,room_type,price from b_room where status='Vacant' ");
				while(list($id,$rno,$rtype,$price)=$reserv_table->fetch_row()){
					echo "<option value='$id'>Id=$id | $rno | $rtype | $price</option>";
					}
				
				?>
        </select>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Checkin Date :</label>
     <div class="col-sm-5">
      <input type='text' class="form-control" id="Date" name="checkin"  placeholder="yyyy-mm-dd"  value="<?php echo isset($join)?$join:""?>"/>
      </div>
    </div>
    
       <div class="form-group">
    <label class="control-label col-sm-4">Checkout Date :</label>
     <div class="col-sm-5">
      <input type='text' class="form-control" id="Date1" name="checkout"  placeholder="yyyy-mm-dd"   value="<?php echo isset($join)?$join:""?>"/>
      </div>
    </div>
    
      <div class="form-group">
    <label class="control-label col-sm-4">Paid Amount :</label>
     <div class="col-sm-5">
      <input type='number' class="form-control" name="txtpPrice"  class="form-control"  value="<?php echo isset($join)?$join:""?>"/>
      </div>
    </div>
     <div class="form-group">
    <label class="control-label col-sm-4">Due Amount :</label>
     <div class="col-sm-5">
      <input type='number' class="form-control" name="txtdPrice"  class="form-control"  value="<?php echo isset($join)?$join:""?>"/>
      </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Status :</label>
    <div class="col-sm-5">
       <select class="form-control" name="cmbStatus">
       		<option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Due">Due</option>
       </select>
    </div>
    </div>
    
      <div class="form-group" hidden="">
    <label class="control-label col-sm-4">rStatus :</label>
    <div class="col-sm-5">
       <select class="form-control" name="cmbRstatus">
       		<option value="reservation">reservation</option>
           
       </select>
    </div>
    </div>
    
   
    
     <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
   
    
</form>