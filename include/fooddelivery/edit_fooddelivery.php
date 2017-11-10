<div class="topstyl"><h3 class="styl">Edit Food Delivery</h3></div>

<?php
	if(isset($_POST["txtfdid"])){
		
		$fdid = $_POST["txtfdid"];
		
		$fooddel_table = $db->query("select id,guest_id,food_id,checkin_date,p_price,d_price,status from b_income where id='$fdid' ");
		
		list($fdid,$gid,$fid,$date,$pprice,$dprice,$status)=$fooddel_table->fetch_row();
	}
	if(isset($_POST["btnUpdate"])){
		
		$fdid = $_POST["txtfdid"];
		$gid  = $_POST["txtGid"];
		$fid = $_POST["txtFid"];
		$pprice = $_POST["txtPamount"];
		$dprice = $_POST["txtDamount"];	
		$date  = $_POST["txtDate"];
		$status = $_POST["cmbStatus"];
		
		$db->query("update b_income set  guest_id='$gid',food_id='$fid',checkin_date='$date',p_price='$pprice',d_price='$dprice',status='$status'");
		
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Success !</strong> Successfully Updated.
		</div>";
	}
	
?>

<div style="float:right">
<a href="home.php?item=32" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Food delivery List</a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=33">

	<div class="form-group">
    	<label class="control-label col-sm-4">Food Delivery id :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtfdid" class="form-control" value="<?php echo $fdid;?>"/>
    </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-4">Guest Id :</label>
     <div class="col-sm-5">
     	<select class="form-control" name="txtGid">
        	<?php
            $guest_table=$db->query("select id,name,email,contact_no from b_guest");
			while(list($id,$name,$email,$contact)=$guest_table->fetch_row()){
				if($gid==$id){
					echo "<option value='$id' selected>$id | $name | $email | $contact</option>>";
					}else{
					echo "<option value='$id'>$id | $name | $email | $contact</option>";
					}
				}
			?>
        </select>
     </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-4">Food Id :</label>
     <div class="col-sm-5">
        <select class="form-control" name="txtFid">
        	<?php
            $food_table=$db->query("select id,name,price from b_food");
			while(list($id,$name,$price)=$food_table->fetch_row()){
			if($fid==$id){
			echo "<option value='$id' selected>$id | $name | $price</option>";	
			}else{
			echo "<option value='$id'>$id | $name | $price</option>>";	
			}	
			}
			?>
        </select>
     </div>
    </div>
    
    <div class="form-group">
    <label class=" control-label col-sm-4">Paid Amount :</label>
    <div class="col-sm-5">
    	<input type="text" class="form-control" value="<?php echo $pprice;?>" name="txtPamount"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Due Amount :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $dprice;?>" name="txtDamount"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    	<input type="text" id="Date" class="form-control" value="<?php echo $date;?>" name="txtDate" placeholder="yyyy-mm-dd"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Status :</label>
    <div class="col-sm-5">
    <select class="form-control" name="cmbStatus">
    	<option><?php echo $status;?></option>
        <option value="Paid">Paid</option>
        <option value="Unpaid">Unpaid</option>
        <option value="Due">Due</option>
    </select>
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
     <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
    </div>
   
    
    </div>
    
</form>