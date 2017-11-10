<div class="topstyl"><h3 class="styl">Create Designation</h3></div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$designation = validate($_POST["txtDesignation"]);
		$salary = validate($_POST["txtSalary"]);
		
		$errors = array();
		
		if($designation==""){
			array_push($errors, "Designation field is Empty !!");	
		}	
		
		if($salary==""){
			array_push($errors, "Salary field is Empty !!");	
		}
		
		if(count($errors)==0){
			$db->query("insert into b_designation(name,salary) values('$designation','$salary')");
			
			echo "<div class='alert alert-success alert-dismaiiable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success!</strong>Successfully Created.
			</div>";
			
			$designation=$salary="";
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
	<a class="btn btn-success" href="home.php?item=7"><i class="glyphicon glyphicon-list"> Designation List</i></a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=6">

	<div class="form-group">
    <label class="control-label col-sm-4">Designation Name :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtDesignation" class="form-control"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Salary :</label>
    <div class="col-sm-5">
    <input type="text" name="txtSalary" class="form-control"/>
    </div>
    </div>
    
     <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset" name="" value="Reset" class="btn btn-success" />
      </div>
     </div>
    
</form>