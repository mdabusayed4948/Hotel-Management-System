<div class="topstyl"><h3 class="styl">Create Source</h3></div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$source    = validate($_POST["txtSource"]);
		$date      = validate($_POST["txtDate"]);
		
		$errors = array();
		
		if($source==""){
			array_push($errors, "Source field is Empty !!");	
		}	
		
		if($date==""){
			array_push($errors, "Date field is Empty !!");	
		}
		
		if(count($errors)==0){
			$db->query("insert into bf_source(name,create_date) values('$source','$date')");
			
			echo "<div class='alert alert-success alert-dismaiiable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success!</strong>Successfully Created.
			</div>";
			
			$source=$date="";
		}else{
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error: </strong>".implode("<br/>",$errors)."</div>";	
		
				
		}
	}
	
	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
?>

<div style="float:right">
	<a class="btn btn-success" href="home.php?item=50"><i class="glyphicon glyphicon-list"> Source List</i></a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=49">

	<div class="form-group">
    <label class="control-label col-sm-4">Source Name :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtSource" class="form-control"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    <input type="text" name="txtDate" class="form-control" id="Date"/>
    </div>
    </div>
    
     <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
    
</form>