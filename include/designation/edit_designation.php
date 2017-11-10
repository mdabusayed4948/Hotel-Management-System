<div class="topstyl"><h3 class="styl">Edit Designation</h3></div>

<?php
	if(isset($_POST["txtDesigId"])){
		
		$desig_id = $_POST["txtDesigId"];
		
		$desig_table = $db->query("select id,name,salary from b_designation where id='$desig_id'");
		list($desig_id,$desig,$salary)=$desig_table->fetch_row();
	}
	
	if(isset($_POST["btnSave"])){
		
		$desig_id = $_POST["txtDesigId"];
		$desig = $_POST["txtDesig"];
		$salary = $_POST["txtSalary"];	
		
		$db->query("update b_designation set name='$desig',salary='$salary' where id='$desig_id'");
		
			echo "<div class='alert alert-success alert-dismaiiable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success!</strong>Successfully Updated.
			</div>";
	}
?>

<div style="float:right">
	<a href="home.php?item=32" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Designation List</a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=33">
	
    <div class="form-group" hidden="">
    <label class="control-label col-sm-4">Designation Id :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtDesigId" value="<?php echo isset($desig_id)?$desig_id:""?>" placeholder="DesignationId"/>
    </div>
    </div>
    
	<div class="form-group">
    <label class="control-label col-sm-4">Designation :</label>
    <div class="col-sm-5">
  
    <input type="text" class="form-control" name="txtDesig" value="<?php echo isset($desig)?$desig:""?>" placeholder="Designation"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Salary :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtSalary" value="<?php echo isset($salary)?$salary:""?>" placeholder="Salary"/>
    </div>
    </div>
    
      <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSave" value="Update" class="btn btn-primary" />
     </div>
     </div>
     
</form>