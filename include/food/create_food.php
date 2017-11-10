<div class="topstyl"><h3 class="styl">Create Food</h3></div>

<?php 
if(isset($_POST["btnSubmit"])){

	$fname = $_POST["txtFname"];
	$desc  = $_POST["txtfdesc"];	
	$price = $_POST["txtPrice"];
	
	$errors = array();
	
	if($fname==""){
		array_push($errors,"Food name field is Empty !!");	
	}
	
	if($desc==""){
		array_push($errors,"Description field is Empty !!");	
	}
	
	if($price==""){
		array_push($errors,"Price field is Empty !!");	
	}
	
	if(count($errors)==0){
		$db->query("insert into b_food(name,description,price) values('$fname','$desc','$price')");
		
		echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";	
  $fname = $desc =$price="";
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

<div><a class="btn btn-info" style="float:right" href="home.php?item=35"><i class="glyphicon glyphicon-list"></i> Food List</a></div>

<form class="form-horizontal" method="post" action="home.php?item=34">

	<div class="form-group">
    <label class="control-label col-sm-2">Food Name :</label>
    <div class="col-sm-8">
    	<input type="text" name="txtFname" class="form-control"/>
    </div>
    </div>
    
      <div class="form-group">
      <label class="control-label col-sm-2" >Description:</label>
      <div class="col-sm-8">
      
        <textarea class="ckeditor"  name="txtfdesc" class="form-control"  value=" <?php echo isset($desc)?$desc:""?>"></textarea>
      </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-2">Price :</label>
    <div class="col-sm-8">
    	<input type="number" class="form-control" name="txtPrice"/>
    </div>
    </div>
    
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
    
</form>