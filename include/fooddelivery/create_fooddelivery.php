<div><h3 class="styl">Create Food Delivery</h3></div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$gid    = $_POST["cmdGuestId"];
		$fid    = $_POST["cmbfoodId"];	
		$pprice = $_POST["txtPprice"];
		$dprice = $_POST["txtDprice"];
		$date   = $_POST["txtDate"];
		$status = $_POST["cmbStatus"];
	   $fstatus = $_POST["fstatus"];
	
		
		$errors = array();
		
		if($gid==""){
			array_push($errors,"Guest Id Field is Empty !!");	
		}
		
		if($fid==""){
			array_push($errors,"Food Id Field is Empty !!");	
		}
		
		if($pprice==""){
			array_push($errors,"Paid Price Field is Empty !!");	
		}
		
		if($dprice==""){
			array_push($errors,"Due price is Empty !!");	
		}
		
		if($date==""){
			array_push($errors,"Date Field is Empty !!");	
		}
		if($status==""){
			array_push($errors,"Status Field is Empty !!");	
		}
		
		if(count($errors==0)){
			$db->query("insert into b_income(guest_id,food_id,checkin_date,p_price,d_price,status,fstatus) values('$gid','$fid','$date','$pprice','$dprice','$status','$fstatus')");
			
			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Success !</strong> Successfully Created.
			</div>";
			
			$gid=$fid=$pprice=$dprice=$date="";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Error:</strong>".implode("<br/>",$errors)."</div>";
			
		}
		
	}
?>
<div style="float:right">
<a href="home.php?item=41" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Food delivery List</a>
</div>

    <form class="form-horizontal" method="post" action="home.php?item=40">
    	
        <div class="form-group">
        <label class="control-label col-sm-4">Guest Id :</label>
        <div class="col-sm-5">
        <select class="form-control" name="cmdGuestId">
        	<?php
            $guest_table = $db->query("select id,name,gender,email,contact_no from b_guest");
			while(list($id,$name,$gender,$email,$contact)=$guest_table->fetch_row()){
				echo "<option value='$id'>$id | $name | $email | $contact</option>";
				
				
				 }
				 
			?>
        </select>
        </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-4">Food Id :</label>
        <div class="col-sm-5">
        	<select class="form-control" name="cmbfoodId">
            <?php
            	$food_table = $db->query("select id,name,price from b_food");
				while(list($id,$name,$price)=$food_table->fetch_row()){
				echo "<option value='$id'>$id | $name | $price</option>";	
				}
			?>
            </select>
        </div>
        </div>
        
         <div class="form-group">
        <label class="control-label col-sm-4">Paid Price :</label>
        <div class="col-sm-5">
        <input type="number" class="form-control" name="txtPprice"/>
        </div>
        </div>
        
         <div class="form-group">
        <label class="control-label col-sm-4">Due Price :</label>
        <div class="col-sm-5">
        <input type="number" class="form-control" name="txtDprice"/>
        </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-4">Date :</label>
        <div class="col-sm-5">
        <input type="text" id="Date" class="form-control" name="txtDate" placeholder="yyyy-mm-dd"/>
        </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-4">Status :</label>
        <div class="col-sm-5">
        <select class="form-control" name="cmbStatus">
        	<option>--select--</option>
        	<option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Due">Due</option>
        </select>
        </div>
        </div>
        
        <div class="form-group" hidden="">
        <label class="control-label col-sm-4">Food Status</label>
        <div class="col-sm-5">
        <select class="form-control" name="fstatus">
        	<option value="fstatus">food Status</option>
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