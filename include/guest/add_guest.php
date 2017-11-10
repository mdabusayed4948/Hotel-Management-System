<div class="topstyle">
	<h3 class="styl">Create Guest</h3>
</div>

<?php
if(isset($_POST["btnSubmit"])){
	
	$name    = $_POST["txtName"];
	$gender  = $_POST["cmbGender"];
	$mail    = $_POST["txtmail"];
	$contact = $_POST["txtcontact"];
	$address = $_POST["txtaddress"];
	$status  = $_POST["txtStatus"];
	
	
	$errors = array();
	
	
			if($name==""){
			array_push($errors,"Guest name field is Empty !!");
			}else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         	array_push($errors,"Only letters and white space allowed");
            }
			
			if($gender==""){
				array_push($errors,"Gender field is Empty !!");	
			}	
			
			
			if($mail==""){
				array_push($errors,"E-mail address field is Empty !!");	
			}else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			array_push($errors,"Invalid email format"); 
			}
			
			if($contact==""){
				array_push($errors,"Contact no field is Empty !!");	
			}else if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         		array_push($errors,"Only Number and white space allowed");
            }
			
			if($address==""){
				array_push($errors,"Address field is Empty !!");	
			}
			
			if($status==""){
			  array_push($errors,"Status field is Empty !!");	
			}
			
			
			
			if(count($errors)==0){
				$db->query("insert into b_guest(name,gender,email,contact_no,address,status)values('$name','$gender','$mail','$contact','$address','$status')");
				
					echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
  
  $name=$gender=$mail=$contact=$address=$status="";
			}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
  
			}
			
	
	}
?>

<div>
    <a style="text-decoration:none; float:right" href="home.php?item=14" class="btn btn-success">
    	<i class='glyphicon glyphicon-list'></i> Guest list
    </a> 
</div>
 

<form class="form-horizontal" method="post" action="home.php?item=11">
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
      <label class="control-label col-sm-4" >Status:</label>
      <div class="col-sm-5">
      <select class="form-control" name="txtStatus">
        <option value="Active">Active</option>
        <option value="In Active">In Active</option>
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