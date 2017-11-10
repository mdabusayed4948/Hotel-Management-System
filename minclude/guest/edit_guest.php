<div class="topstyle"><h3 class="styl">Edit Guest </h3></div>

<?php
	if(isset($_POST["txtGuestId"])){
		
	  $g_id = $_POST["txtGuestId"];
	  
	  $guest_table = $db->query("select id,name,gender,email,contact_no,address,status from b_guest where id ='$g_id'");
	  list($g_id,$name,$gender,$mail,$contact,$address,$status)=$guest_table->fetch_row();	
	}
	
	
	if(isset($_POST["btnUpdate"])){
		
		  $g_id    = validate($_POST["txtGuestId"]);
		  $name    = validate($_POST["txtName"]);
		  $gender  = validate($_POST["cmbGender"]);
		  $mail    = validate($_POST["txtmail"]);
		  $contact = validate($_POST["txtcontact"]);
		  $address = validate($_POST["txtaddress"]);
		  $status  = validate($_POST["txtStatus"]);
		  
		  $errors = array();
		  
		  	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         array_push($errors,"Only letters and white space allowed");
            }
			
			if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         array_push($errors,"Only Number and white space allowed");
            }
			
				if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format"); 
   		 }
			
		  
		  if(count($errors)==0){
		  $db->query("update b_guest set name='$name',gender='$gender',email='$mail',contact_no='$contact',address='$address',status='$status' where id='$g_id'");
		  
		   echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";
  
 
			}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
  
	}
	}
	
	function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<div> <a style="text-decoration:none; float:right" href="home.php?item=11" class="btn btn-success"> <i class='glyphicon glyphicon-list'></i> Guest list</a> </div>

<form class="form-horizontal" method="post" action="home.php?item=12">
	<div class="form-group" hidden="">
    	  <label class="control-label col-sm-4" >Guest Id:</label>
          <div class="col-sm-5">
          	<input type="text" name="txtGuestId" value="<?php echo isset($g_id)?$g_id:""?>" class="form-control"/>
          </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-4" >Guest Name:</label>
      <div class="col-sm-5">
         <input type="text" name="txtName" value="<?php echo isset($name)?$name:""?>" class="form-control" placeholder="Guest name"/>
     </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Gender:</label>
      <div class="col-sm-5">
     	<select class="form-control" name="cmbGender">
        	<option><?php echo isset($gender)?$gender:""?></option>
        	<option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
     </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >E-mail:</label>
      <div class="col-sm-5">
         <input type="email" name="txtmail" value="<?php echo isset($mail)?$mail:""?>" class="form-control" placeholder="E-mail address "/>
     </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Contact No:</label>
      <div class="col-sm-5">
         <input type="text" name="txtcontact" value="<?php echo isset($contact)?$contact:""?>" class="form-control" placeholder="Contact no"/>
     </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Address:</label>
      <div class="col-sm-5">
       <textarea class="form-control" cols="20" rows="4" name="txtaddress" placeholder="Address"><?php echo isset($address)?$address:""?></textarea>
     </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Status:</label>
    <div class="col-sm-5">
    	<select class="form-control" name="txtStatus">
        	<option><?php echo isset($status)?$status:""?></option>
        	<option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </div>
    
    </div>
  
       <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary  " />
  
      </div>
     </div>
     
</form>