<div class="topstyl"><h3 class="styl">Edit Food</h3></div>


<?php
	if(isset($_POST["txtfid"])){
		
		$fid = $_POST["txtfid"];
		
		$food_table = $db->query("select id,name,description,price from b_food where id='$fid'");	
		list($id,$fname,$desc,$price)=$food_table->fetch_row();
	}
	
	if(isset($_POST["btnSubmit"])){
		
		$fid = $_POST["txtfid"];
		$fname = $_POST["txtFname"];	
		$desc = $_POST["fdesc"];
		$price = $_POST["txtprice"];
		
		$db->query("update b_food set name='$fname',description='$desc',price='$price' where id='$fid' ");
		
			echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";	
	}
?>

<div>
<a href="home.php?item=35" style="float:right; text-decoration:none" class="btn btn-success"><i class="glyphicon glyphicon-list"></i> Food List</a>
</div>
<form method="post" class="form-horizontal" action="home.php?item=36">

	<div class="form-group">
    <label class="control-label col-sm-2">Food Id :</label>
    <div class="col-sm-8">
    <input type="text" name="txtfid" value="<?php echo $fid;?>" class="form-control"/>
    </div>
	</div>
    
 <div class="form-group">
 <label class="control-label col-sm-2">Food Name :</label>
 <div class="col-sm-8">
 	<input type="text" class="form-control" name="txtFname" value="<?php echo $fname;?>" />
 </div>
 </div>
 
 <div class="form-group">
 	<label class="control-label col-sm-2">Description :</label>
    <div class="col-sm-8">
    	<textarea class="ckeditor" class="form-control" name="fdesc"><?php echo$desc;?></textarea>
    </div>
 </div>
 
 <div class="form-group">
 <label class="control-label col-sm-2">Price :</label>
 <div class="col-sm-8">
 	<input type="text" class="form-control" name="txtprice"  value="<?php echo $price;?>"/>
 </div>
 </div>
 
     <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
      <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary  " />
   
      </div>
     </div>
</form>