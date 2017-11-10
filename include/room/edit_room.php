<div class="topstyle">
	<h3 class="styl">Edit Room </h3>
</div>

<?php
 if(isset($_POST["txtroomId"])){
	$room_id = $_POST["txtroomId"];	 
	
	$room_table = $db->query("select id,room_name,room_no,room_type,description,price,status,image from b_room where id='$room_id'");
	
	list($id,$rname,$rno,$rtype,$desc,$price,$status,$image)=$room_table->fetch_row();
}

   if(isset($_POST["btnUpdate"])){
	
	$file_name=$_FILES["abc"]["name"];
	$tmp_name=$_FILES["abc"]["tmp_name"];
	$type=$_FILES["abc"]["type"];
	$file_size=$_FILES["abc"]["size"];
	$div=explode('.',$file_name);
	$file_ext=strtolower(end($div));
	$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
	$upload_image="img/".$unique_image;
    
	$kb=$file_size/1024; //size convert to kb
	
	 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
        "application/pdf"==$type){ 
	    if($kb<=2000000){
		
	    copy($tmp_name,$upload_image);
	    
	     $room_id  = $_POST['txtroomId'];
        	
	$msg=$db->query("update  b_room set  image='$upload_image' where id='$room_id'");
  
	    }
        
        } 
	
    $room_id = validate($_POST["txtroomId"]);	 
	$rname   = validate($_POST["txtRname"]);
	$rno     = validate($_POST["txtRno"]);
	$price   = validate($_POST["txtPrice"]);
	$rtype   = validate($_POST["txtRtype"]);
	$desc    = validate($_POST["txtdesc"]);
	$status  = validate($_POST["txtstatus"]);	
	
	$msg=$db->query("update b_room set room_name='$rname',room_no='$rno',room_type='$rtype',description='$desc',price='$price',status='$status' where id='$room_id'");
	
	if($msg==TRUE){
		echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";
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
    <a style="text-decoration:none; float:right" href="home.php?item=16" class="btn btn-success">
    	<i class='glyphicon glyphicon-list'></i> Room list
    </a> 
</div>

<form class="form-horizontal" method="post" action="home.php?item=18" enctype="multipart/form-data">

	<div class="form-group" hidden="">
    	  <label class="control-label col-sm-2" >Room Id:</label>
          <div class="col-sm-8">
          	<input type="text" name="txtroomId" value="<?php echo isset($room_id)?$room_id:""?>" class="form-control"/>
          </div>
    </div>
    
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
      
        <textarea class="ckeditor"  name="txtdesc" class="form-control" ><?php echo isset($desc)?$desc:""?></textarea>
      </div>
    </div>
    
    
    
      <div class="form-group">
      <label class="control-label col-sm-2" >Status:</label>
      <div class="col-sm-8">
       <select class="form-control" name="txtstatus" >
        <option><?php echo isset($status)?$status:""?></option>
          <option value="Occupied">Occupied</option>
          <option value="Vacant">Vacant</option>
         
       </select>
      </div>
    </div>
    
        <div class="form-group">
  <label class="control-label col-sm-2">Picture:</label>
  <div class="col-sm-5">
 
      <input type="file" name="abc" />
        <br>
    <img src="<?php echo isset($image)?$image:""?>" width="200" height="150"/>

 </div>    
 </div>
 
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
    
      <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary  " />
    
      </div>
     </div>
    
</form>