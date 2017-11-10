<div class="topstyle">
	<h3 class="styl">Create Room </h3>
</div>

<?php 
if(isset($_POST["btnSubmit"])){
	
	
		$file_name = $_FILES["pic"]["name"];
		$tmp_name = $_FILES["pic"]["tmp_name"];
		$type = $_FILES["pic"]["type"];
		$file_size = $_FILES["pic"]["size"];
		$div = explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image =substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="images/".$unique_image;
		
		if($upload_image==""){
		 	 array_push($errors,"Image Upload field is empty!");		
		}
		
		if(empty($file_name)){
			
				echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>Please select any image !!
  </div>";
			
			}else{
	$kb=$file_size/1024; //size convert to kb
	
	
	 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
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
		
	
	$rname  = validate($_POST["txtRname"]);
	$rno    = validate($_POST["txtRno"]);
	$price  = validate($_POST["txtPrice"]);
	$rtype  = validate($_POST["txtRtype"]);
	$desc   = validate($_POST["txtdesc"]);
	$status = validate($_POST["txtstatus"]);	
	
	$errors = array();
	
		if($rname==""){
			array_push($errors,"Room name field is Empty !!");
			}
			
			if($rno==""){
				array_push($errors,"Room no field is Empty !!");	
			}
			
			if($price==""){
				array_push($errors,"Room no field is Empty !!");	
			}
			
			if($rtype==""){
				array_push($errors,"Room Type field is Empty !!");	
			}
			
			if($desc==""){
				array_push($errors,"Room Description field is Empty !!");	
			}
			
			if($status==""){
				array_push($errors,"Room Status field is Empty !!");	
			}
			
			if(count($errors)==0){
				
			$db->query("insert into b_room(room_name,room_no,room_type,description,price,status,image)values('$rname','$rno','$rtype','$desc','$price','$status','$upload_image')");
				
	echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
  $rname=$rno=$price=$rtype=$desc=$status=$upload_image="";
			}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
			}
			
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
    <a style="text-decoration:none; float:right" href="home.php?item=17" class="btn btn-success">
    	<i class='glyphicon glyphicon-list'></i> Room list
    </a> 
</div>

<form class="form-horizontal" method="post" action="home.php?item=16" enctype="multipart/form-data">
	 <div class="form-group">
      <label class="control-label col-sm-2" >Room Name:</label>
      <div class="col-sm-8">
         <input type="text" name="txtRname" value="<?php echo isset($rname)?$rname:""?>" class="form-control" placeholder="Room name"/>
      
      </div>
    </div>
    
   
     <div class="form-group">
      <label class="control-label col-sm-2" >Room No:</label>
      <div class="col-sm-8">
         <input type="text" name="txtRno" value="<?php echo isset($rno)?$rno:""?>" class="form-control" placeholder="Room No (101,102)"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Price for per night:</label>
      <div class="col-sm-8">
         <input type="text" name="txtPrice" value="<?php echo isset($price)?$price:""?>" class="form-control" placeholder="Price for per night"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Room Type:</label>
      <div class="col-sm-8">
         <input type="text" name="txtRtype" value="<?php echo isset($rtype)?$rtype:""?>" class="form-control" placeholder="Room Type"/>
      
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Description:</label>
      <div class="col-sm-8">
      
        <textarea class="ckeditor"  name="txtdesc" class="form-control"  value=" <?php echo isset($desc)?$desc:""?>"></textarea>
      </div>
    </div>
    
    
    
      <div class="form-group">
      <label class="control-label col-sm-2" >Status:</label>
      <div class="col-sm-8">
       <select class="form-control" name="txtstatus" value="<?php echo isset($status)?$status:""?>">
          <option value="Vacant">Vacant</option>
       </select>
      </div>
    </div>
    
        <div class="form-group">
  <label class="control-label col-sm-2">Picture:</label>
  <div class="col-sm-5">
 
      <input type="file" name="pic" />
    

 </div>    
 </div>
 
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
    
</form>