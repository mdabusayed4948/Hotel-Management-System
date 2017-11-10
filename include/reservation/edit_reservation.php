
<div class="topstyle"><h3 class="styl">Edit Reservation</h3></div>

<?php
if(isset($_POST["txtRid"])){
	$r_id = $_POST["txtRid"];
	$reserv_table = $db->query("select id,guest_id,room_id,checkin_date,checkout_date,p_price,d_price from b_income where id='$r_id'");
	
	list($r_id,$gid,$rid,$checkin_date,$checkout_date,$pamount,$damount)=$reserv_table->fetch_row();
	}
	
	
	if(isset($_POST["btnSave"])){
		
		$r_id          = validate($_POST["txtRid"]);
		$gid           = validate($_POST["cmbRid"]);
		$rid           = validate($_POST["cmbRid"]);
		$checkin_date  = validate($_POST["txtCindate"]);
		$checkout_date = validate($_POST["txtCoutdate"]);
		$pamount       = validate($_POST["txtPamount"]);
		$damount       = validate($_POST["txtDamount"]);
		
		$db->query("update b_income set guest_id='$gid',room_id='$rid',checkin_date='$checkin_date',checkout_date='$checkout_date',p_price='$pamount',d_price='$damount' where id='$r_id'");
		 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";
	 }
	 
	 function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data); 
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<div><a style="text-decoration:none; float:right" href="home.php?item=23" class="btn btn-success"><i class="glyphicon glyphicon-list"></i> Reservation List</a></div>
<form class="form-horizontal" method="post" action="home.php?item=24">
	
    <div class="form-group" hidden="">
    <label class="control-label col-sm-4">Reservation Id :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtRid" value="<?php echo isset($r_id)?$r_id:""?>" class="form-control"/>	
    </div>
    </div>

	<div class="form-group">
    <label class="control-label col-sm-4">Guest Id :</label>
    <div class="col-sm-5">
    <select class="form-control" name="cmbGid">
    	<?php
        $guest_table=$db->query("select id,name,email,contact_no from b_guest");
		while(list($id,$name,$mail,$contact)=$guest_table->fetch_row()){
			if($gid==$id){
				echo "<option value='$id' selected>Id=$id | $name | $mail | $contact</option>";	
				}else{
				echo "<option value='$id'>Id=$id | $name | $mail |$contact</option>";	
				}
		
		}
		?>
    </select>
    
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Room Id :</label>
    <div class="col-sm-5">
     	<select class="form-control" name="cmbRid">
        	<?php
              $room_table=$db->query("select id,room_no,room_type,price from b_room");
			  while(list($id,$room_no,$room_type,$price)=$room_table->fetch_row()){
				  if($rid==$id){
					echo "<option value='$id' selected>Id=$id | $room_no | $room_type | $price</option>";   
					 }else{
					echo "<option value='$id'>Id=$id | $room_no | $room_type | $price</option>";	 
					 }
				
				}
			?>
        </select>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Checkin Date :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtCindate" id="Date" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo isset($checkin_date)?$checkin_date:""?>"/>
    </div>
    </div>
    
    <div class="form-group">
     <label class="control-label col-sm-4">Checkout Date :</label>
     <div class="col-sm-5">
       <input type="text" name="txtCoutdate" id="Date1" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo isset($checkout_date)?$checkout_date:""?>"/>
     </div>
   	</div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Paid Amount :</label>
    <div class="col-sm-5">
       <input type="number" name="txtPamount" class="form-control" placeholder="Paid Amount" value="<?php echo isset($pamount)?$pamount:""?>"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Due Amount :</label>
    <div class="col-sm-5">
    	<input type="number" name="txtDamount" class="form-control" placeholder="Due Amount" value="<?php echo isset($damount)?$damount:""?>"/>
    </div>
    </div>
    
  
    
     <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSave" value="Submit" class="btn btn-primary  " />
   
      </div>
     </div>
     
</form>