<div class="topstyle">
	<h3 class="styl">Add Guest</h3>
</div>

<?php

$nameErr = $mailErr = $genderErr = $contactErr =$addressErr= "";
$name = $gender = $mail = $contact = $address = "";
if(isset($_POST["btnSubmit"])){
	
	  if (empty($_POST["txtName"])) {
    $nameErr = "Name is required";
  } else {
    $name = validate($_POST["txtName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
    if (empty($_POST["cmbGender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = validate($_POST["cmbGender"]);
  }
	
  if (empty($_POST["txtmail"])) {
    $mailErr = "Email is required";
  } else {
    $mail = validate($_POST["txtmail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Invalid email format"; 
    }
  }
  
    if (empty($_POST["txtcontact"])) {
    $contactErr = "Contact No is required";
  } else {
    $contact = validate($_POST["txtcontact"]);
    // check if e-mail address is well-formed
    if (!preg_match('/^[0-9]{11,13}$/', $contact)) {
      $contactErr = "Invalid Contact format"; 
    }
  }

    if (empty($_POST["txtaddress"])) {
    $addressErr = "Address is required";
  } else {
    $address = validate($_POST["txtaddress"]);
    // check if  address is well-formed
    if (!preg_match( '/^[a-zA-Z0-9- ]+$/', $address)) {
      $addressErr = "Invalid Address format"; 
    }
  }


	

				$db->query("insert into b_guest(name,gender,email,contact_no,address)values('$name','$gender','$mail','$contact','$address')");
				
					echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
  
		
	
	}
	
	function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div>
    <a style="text-decoration:none; float:right" href="home.php?item=14" class="btn btn-success">
    	<i class='glyphicon glyphicon-list'></i> Guest list
    </a> 
</div>
 

<form class="form-horizontal" method="post" action="home.php?item=11">
	 <div class="form-group">
      <label class="control-label col-sm-2" >Guest Name:</label>
      <div class="col-sm-5">
         <input type="text" name="txtName" value="<?php echo isset($name)?$name:""?>" class="form-control" placeholder="Guest name"/>
     </div>
      <span class="error">* <?php echo $nameErr;?></span>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Gender:</label>
      <div class="col-sm-5">
     	<select class="form-control" name="cmbGender">
        	<option value="Male">Male</option>
            <option value="Female">Female</option>
              <span class="error">* <?php echo $genderErr;?></span>
        </select>
      
     </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >E-mail:</label>
      <div class="col-sm-5">
         <input type="email" name="txtmail" value="<?php echo isset($mail)?$mail:""?>" class="form-control" placeholder="E-mail address "/>
     </div>
       <span class="error">* <?php echo $mailErr;?></span>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Contact No:</label>
      <div class="col-sm-5">
         <input type="text" name="txtcontact" value="<?php echo isset($contact)?$contact:""?>" class="form-control" placeholder="Contact no"/>
     </div>
       <span class="error">* <?php echo $contactErr;?></span>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Address:</label>
      <div class="col-sm-5">
       <textarea class="form-control" cols="20" rows="4" name="txtaddress" placeholder="Address"><?php echo isset($address)?$address:""?></textarea>
     </div>
       <span class="error">* <?php echo $addressErr;?></span>
    </div>
    
       <div class="form-group">
      <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
     
</form>