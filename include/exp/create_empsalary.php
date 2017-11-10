<div class="topstyle">
 <h3 class="styl">Create Employee Salary</h3>
</div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$empid     = validate($_POST["cmbEmployeeid"]);
		$source    = validate($_POST["txtSource"]);
		$date      = validate($_POST["txtDate"]);
		$pamount   = validate($_POST["txtPamount"]);
		$damount   = validate($_POST["txtDamount"]);
		$status    = validate($_POST["cmbStatus"]);
		
		
		$errors =array();
		
		if($empid==""){
		  array_push($errots,"Employee Id Field is Empty !!");	
		}
		
		if($source==""){
			array_push($errors, "Source field is Empty !!");	
		}
		
		if($date==""){
			array_push($errors, "Date Field is Empty !!");	
		}
		
		if($pamount==""){
			array_push($errors, "Paid Amount Field is Empty !!");	
		}
		
		if($damount==""){
			array_push($errors,"Due Amount field is empty !!");	
		}
		
		if($status==""){
		 	array_push($errors,"Status field is empty !!");	
		}
		
		if(count($errors)==0){
			$db->query("insert into b_exp(employee_id,source_id,billdate,paidamount,dueamount,status) values('$empid','$source','$date','$pamount','$damount','$status')");
			
			
			echo "<div class='alert alert-success alert-dismissable'>
  	 		 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   			 <strong>Success!</strong> Successfully Created.
  			</div>";
			
			
		}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
  
			}
		
		
	}
	
	function validate($data) {
 		 $data = trim($data);
 		 $data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>

<div><a class="btn btn-success" style="text-decoration:none; float:right" href="home.php?item=29"><i class='glyphicon glyphicon-list'></i>  Employee Salary List</a></div>

<form class="form-horizontal" method="post" action="home.php?item=28">


    
    <div class="form-group">
    <label class="control-label col-sm-4">Employee ID :</label>
    <div class="col-sm-5">
    	<select class="form-control" name="cmbEmployeeid" value="<?php echo isset($empid)?$empid:""?>">
        	<?php
              $guest_table = $db->query("select e.id,e.name,e.contact_no,d.name,d.salary from b_employee as e, b_designation as d where d.id=e.designation_id ");
			  while(list($id,$name,$contact,$designation,$salary)=$guest_table->fetch_row()){
				  echo "<option value='$id'>Id= $id | $name | $contact | $designation | $salary</option>";
				  }
			?>
        </select>
    </div>
    
    </div>

     <div class="form-group">
    <label class="control-label col-sm-4">Source Name :</label>
    <div class="col-sm-5">
    	<select class="form-control" name="txtSource" value="<?php echo isset($source)?$source:""?>">
        	<?php
              $guest_table = $db->query("select id,name from bf_source");
			  while(list($id,$name)=$guest_table->fetch_row()){
				  echo "<option value='$id'>Id= $id | $name </option>";
				  }
			?>
        </select>
    </div>
    
    </div>

    
    <div class="form-group">
    <label class="control-label col-sm-4"> Date :</label>
     <div class="col-sm-5">
      <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd"  value="<?php echo isset($date)?$date:""?>"/>
      </div>
    </div>
    
       <div class="form-group">
    <label class="control-label col-sm-4"> Paid Amount :</label>
     <div class="col-sm-5">
      <input type='number' class="form-control"  name="txtPamount"  placeholder=""   value="<?php echo isset($pamount)?$pamount:""?>"/>
      </div>
    </div>
    
      <div class="form-group">
    <label class="control-label col-sm-4">Due Amount :</label>
     <div class="col-sm-5">
      <input type='number' class="form-control" name="txtDamount"  class="form-control"  value="<?php echo isset($damount)?$damount:""?>"/>
      </div>
    </div>
     <div class="form-group">
    <label class="control-label col-sm-4">Status  :</label>
     <div class="col-sm-5">
     <select class="form-control" name="cmbStatus" value="<?php echo isset($status)?$status:""?>">
     		<option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Due">Due</option>
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