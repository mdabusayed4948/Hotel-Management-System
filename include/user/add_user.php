<div class="topstyle"><h3 class="styl">Add User</h3></div>

<?php
	if(isset($_POST["btnSubmit"])){
	    
		$file_name = $_FILES["pic"]["name"];
		$tmp_name = $_FILES["pic"]["tmp_name"];
		$type = $_FILES["pic"]["type"];
		$file_size = $_FILES["pic"]["size"];
		$div =explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="images/".$unique_image;
		
		if($upload_image==""){
			array_push($errors,"Image Upload field is empty");
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
    <strong>Warning!</strong>File size is more than 200kb. Actual file size is $kb kb
  </div>";
			 
			}	
		}else{
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>Invalid format !
  </div>";
	 
	 
			}	
		}
		
		$role      =  validate($_POST["cmbRole"]);
		$username  =  validate($_POST["txtUsername"]);
		$gender    =  validate($_POST["cmbGender"]);
		$contact   =  validate($_POST["txtContact"]);
		$email     =  validate($_POST["txtEmail"]);
		$address   =  validate($_POST["txtAddress"]);
		$join      =  validate($_POST["txtJoin"]);
		$pwd       =  md5(validate($_POST["pwdPassword"]));
		$repwd     =  md5(validate($_POST["pwdRePassword"]));
		
		$errors = array();
		
		if($role==""){
			array_push($errors,"Role field is Empty !!");
		}
		
		if($username==""){
			array_push($errors,"Username field is Empty !!");
		
        }else if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
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
			array_push($errors,"Email address Field is Empty !!");
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format"); 
   		 }
		 
		if($address==""){
		array_push($errors,"Address field is Empty !!");	
		}
	
		if($join==""){
		array_push($errors,"Join Date field is Empty !!");	
		}
		
		if($pwd==""){
		array_push($errors,"Password field is Empty !!");	
		}
		
		if($repwd==""){
		array_push($errors,"Retype Password field is Empty !!");	
		}
		
		
		if($pwd!=$repwd ){
		array_push($errors,"Password did not match");	
		}
		
		if(count($errors)==0){
			$db->query("insert into b_user(username,gender,password,role_id,contact_no,email,address,join_date,image)values('$username','$gender','$pwd','$role','$contact','$email','$address','$join','$upload_image');");
			
	 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
	 
	 $role = $username = $gender = $contact = $email = $address = $join = $pwd = $repwd  = "";   

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

 <div> <a style="text-decoration:none; float:right" href="home.php?item=4" class="btn btn-success"> <i class='glyphicon glyphicon-list'></i> User list</a> </div>


<form class="form-horizontal" method="post" action="home.php?item=1" enctype="multipart/form-data">
     <div class="form-group">
          <label class="control-label col-sm-4" for="email">User Role:</label>
          <div class="col-sm-5">
         
            <select class="form-control" name="cmbRole">
               <?php
               $role_table=$db->query("select id,name from b_role");
               while(list($id,$name) = $role_table->fetch_row()){?>
                  <option value=" <?php echo  $id?>"> <?php echo  $name?></option> 
                 <?php }?>
              
            </select>
         
          </div>
     </div>
    
    <div class="form-group">
      <label class="control-label col-sm-4" >Username:</label>
      <div class="col-sm-5">
         <input type="text" name="txtUsername" value="<?php echo isset($username)?$username:""?>" class="form-control" placeholder="Username"/>
      
      </div>
    </div>
    
    
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Gender:</label>
      <div class="col-sm-5">
        <select  class="form-control" name="cmbGender">
        
        	<option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
      
      </div>
    </div>
  
     <div class="form-group">
      <label class="control-label col-sm-4" >Contact No:</label>
      <div class="col-sm-5">
      <input type="text" name="txtContact" value="<?php echo isset($contact)?$contact:""?>" class="form-control" placeholder="Contact No"/>
      
      </div>
      
    </div>
    
      
     <div class="form-group">
      <label class="control-label col-sm-4" >E-mail:</label>
      <div class="col-sm-5">
         <input type="email" name="txtEmail" value="<?php echo isset($email)?$email:""?>" class="form-control" placeholder="E-mail"/>
      
      </div>
      
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-4" >Address:</label>
      <div class="col-sm-5">
        <textarea  class="form-control" placeholder="Address" cols="20" rows="3" name="txtAddress"><?php echo isset($address)?$address:""?></textarea>
      
      </div>
    </div>
    
    
   <div class="form-group">
      <label class="control-label col-sm-4" >Join Date:</label>
      <div class="col-sm-5">
      <input type='text' class="form-control" id="Date" name="txtJoin"  placeholder="yyyy-mm-dd"  class="form-control"  value="<?php echo isset($join)?$join:""?>"/>
      </div>
    </div>
    
   <div class="form-group">
      <label class="control-label col-sm-4">Password:</label>
      <div class="col-sm-5">
       <input type="password" name="pwdPassword" value="<?php echo isset($pwd)?$pwd:""?>"  class="form-control" placeholder="Password"/>
      </div>
     </div>
        
           <div class="form-group">
          <label class="control-label col-sm-4">Retype Password:</label>
          <div class="col-sm-5">
          <input type="password" name="pwdRePassword" value="<?php echo isset($repwd)?$repwd:""?>"  class="form-control" placeholder="Retype Password"/>
          </div>
     </div> 
     
     <div class="form-group">
      <label class="control-label col-sm-4">Picture:</label>
      <div class="col-sm-5">
         <input type="file" name="pic"/>
      </div>
      
     </div> 
 
        <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>

  </form>
  
  
 