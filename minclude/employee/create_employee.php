<div class="topstyle">
	<h3 class="styl">Create Employee</h3>
</div>



<?php
	if(isset($_POST["btnSubmit"])){
		
	    $file_name = $_FILES["pic"]["name"];
		$tmp_name  = $_FILES["pic"]["tmp_name"];
		$type      = $_FILES["pic"]["type"];
		$file_size = $_FILES["pic"]["size"];
		     $div  = explode('.',$file_name);  
		 $file_ext = strtolower(end($div));
		 $unique_image = substr(md5(time()),0,10).''.$file_ext;
		 $upload_image ="images/".$unique_image;
		 
		 if($upload_image==""){
		   array_push($errors,"ImageUpload field is empty !");	 
		}
		
		if(empty($file_name)){
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>Please Select any Image !!
  </div>";		
		}else{
		 $kb=$file_size/1024;	
		 
		 if("image/jpeg"==$type ||
		 "image/png"==$type ||
		 "image/gif"==$type ||
		 "application/pdf"==$type){
		 if($kb<=400){
			copy($tmp_name,$upload_image);
			echo " ";
			 }else{
			 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>File size is more than 200kb. Actual file size is $kb kb
  </div>";		 
			}	 
		}else{
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>Invalid format !
  </div>";
	 	
		}
		}
		
		$ename     = validate($_POST["txtEname"]);
		$fname     = validate($_POST["txtFname"]);	
		$mname     = validate($_POST["txtMname"]);		
		$gender    = validate($_POST["cmbGender"]);	
		$contact   = validate($_POST["txtContact"]);	
		$email     = validate($_POST["txtEmail"]);	
		$dob       = validate($_POST["txtdob"]);
		$desig     = validate($_POST["txtdesig"]);
		$praddress = validate($_POST["txtPraddress"]);	
		$peaddress = validate($_POST["txtpeaddress"]);	
		$join      = validate($_POST["txtJoin"]);
		
		$errors = array();
		
			if($ename==""){
			array_push($errors,"Employee name field is Empty !!");
			}else if (!preg_match("/^[a-zA-Z ]*$/",$ename)) {
         	array_push($errors,"Only letters and white space allowed");
            }
			
			if($fname==""){
			array_push($errors,"Father's name field is Empty !!");
			}else if (!preg_match("/^[a-zA-Z ]*$/",$ename)) {
         	array_push($errors,"Only letters and white space allowed");
            }
			
			if($mname==""){
			array_push($errors,"Mother's name field is Empty !!");
			}else if (!preg_match("/^[a-zA-Z ]*$/",$ename)) {
         	array_push($errors,"Only letters and white space allowed");
            }
			
			if($gender==""){
				array_push($errors,"Gender field is Empty !!");	
			}	
			
			if($contact==""){
				array_push($errors,"Contact no field is Empty !!");	
			}else if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         		array_push($errors,"Only Number and white space allowed");
            }
			
			if($email==""){
				array_push($errors,"E-mail address field is Empty !!");	
			}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors,"Invalid email format"); 
			}
			
			if($dob==""){
				array_push($errors,"Dath of birth field is Empty !!");	
			}
			
			if($desig==""){
				array_push($errors,"Designation name field is Empty !!");
			}
			
			if($praddress==""){
				array_push($errors,"Present address field is Empty !!");	
			}
			
			if($peaddress==""){
				array_push($errors,"Permanent address field is Empty !!");	
			}
			
			if($join==""){
				array_push($errors,"Join date field is Empty !!");	
			}
			
			if(count($errors)==0){
				$db->query("insert into b_employee(name,f_name,m_name,gender,contact_no,email,dob,designation_id,present_address,permanent_address,join_date,image)values('$ename','$fname','$mname','$gender','$contact','$email','$dob','$desig','$praddress','$peaddress','$join','$upload_image');");
				
		echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
  
  $ename=$fname=$mname=$gender=$contact=$email=$dob=$desig=$praddress=$peaddress=$join="";
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

<div>
    <a style="text-decoration:none; float:right" href="home.php?item=2" class="btn btn-success">
    	<i class='glyphicon glyphicon-list'></i> Employee list
    </a> 
</div>
 
 <form class="form-horizontal" method="post" action="home.php?item=1" enctype="multipart/form-data">
   
   <div class="form-group">
      <label class="control-label col-sm-4" >Employee Name:</label>
      <div class="col-sm-5">
         <input type="text" name="txtEname" value="<?php echo isset($ename)?$ename:""?>" class="form-control" placeholder="Employee name"/>
      
      </div>
    </div>
    
       <div class="form-group">
      <label class="control-label col-sm-4" >Father's Name:</label>
      <div class="col-sm-5">
         <input type="text" name="txtFname" value="<?php echo isset($fname)?$fname:""?>" class="form-control" placeholder="Father's name"/>
      
      </div>
    </div>
    
       <div class="form-group">
      <label class="control-label col-sm-4" >Mother's Name:</label>
      <div class="col-sm-5">
         <input type="text" name="txtMname" value="<?php echo isset($mname)?$mname:""?>" class="form-control" placeholder="Mother's name"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Gender :</label>
      <div class="col-sm-5">
       <select class="form-control" name="cmbGender">
         <option value="Male">Male</option>
         <option value="Female">Female</option>
        
       </select>
      
      </div>
    </div>
    
    
     <div class="form-group">
      <label class="control-label col-sm-4" > Contact No:</label>
      <div class="col-sm-5">
         <input type="text" name="txtContact" value="<?php echo isset($contact)?$contact:""?>" class="form-control" placeholder="Contact no"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >E-mail:</label>
      <div class="col-sm-5">
         <input type="email" name="txtEmail" value="<?php echo isset($email)?$email:""?>" class="form-control" placeholder="E-mail address"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Date of Birth :</label>
      <div class="col-sm-5">
         <input type="text" id="Date" name="txtdob" value="<?php echo isset($dob)?$dob:""?>" class="form-control" placeholder="Date of Birth"/>
      
      </div>
    </div>
    
      <div class="form-group">
      <label class="control-label col-sm-4" >Designation :</label>
      <div class="col-sm-5">
          <select class="form-control col-sm-4" name="txtdesig">
        <option>--select--</option>
         <?php
         $desig_table = $db->query("select id,name,salary from b_designation");
		 while(list($id,$name,$salary)=$desig_table->fetch_row()){
			echo "<option value='$id'>id=$id | $name | $salary</option>"; 
			}
		 ?>
          $desig_table
          </select>
       
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Present Address:</label>
      <div class="col-sm-5">
       <textarea class="form-control" cols="20" rows="4" placeholder="Present Address" name="txtPraddress"><?php echo isset($praddress)?$praddress:""?></textarea>
      
      </div>
    </div>
    
      <div class="form-group">
      <label class="control-label col-sm-4" >Permanent Address:</label>
      <div class="col-sm-5">
       <textarea class="form-control" cols="20" rows="4" placeholder="Permanent Address" name="txtpeaddress"><?php echo isset($peaddress)?$peaddress:""?></textarea>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Join Date  :</label>
      <div class="col-sm-5">
         <input type="text" id="Date1" name="txtJoin" value="<?php echo isset($join)?$join:""?>" class="form-control" placeholder="Join Date"/>
      
      </div>
    </div>
    
     <div class="form-group">
  <label class="control-label col-sm-4">Picture:</label>
  <div class="col-sm-5">
 
      <input type="file" name="pic" />

 </div>    
 </div>
    
    
        <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
   
 </form>
