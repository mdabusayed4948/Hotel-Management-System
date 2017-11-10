<div class="topstyl"><h3 class="styl">Edit Source</h3></div>

<?php
	if(isset($_POST["txtSourceId"])){
		
		$source_id = $_POST["txtSourceId"];
		
		$desig_table = $db->query("select id,name,create_date from bf_source where id='$source_id'");
		list($source_id,$name,$date)=$desig_table->fetch_row();
	}
	
	if(isset($_POST["btnSave"])){
		
		$source_id = $_POST["txtSourceId"];
		$name      = $_POST["txtSource"];
		$date      = $_POST["txtDate"];	
		
		$db->query("update bf_source set name='$name',create_date='$date' where id='$source_id'");
		
			echo "<div class='alert alert-success alert-dismaiiable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success!</strong>Successfully Updated.
			</div>";
	}
?>

<div style="float:right">
	<a href="home.php?item=50" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Source List</a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=52">
	
    <div class="form-group" hidden="">
    <label class="control-label col-sm-4">Source Id :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtSourceId" value="<?php echo isset($source_id)?$source_id:""?>" placeholder="DesignationId"/>
    </div>
    </div>
    
	<div class="form-group">
    <label class="control-label col-sm-4">Source Name :</label>
    <div class="col-sm-5">
  
    <input type="text" class="form-control" name="txtSource" value="<?php echo isset($name)?$name:""?>" placeholder="Designation"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtDate" value="<?php echo isset($date)?$date:""?>" placeholder="Salary" id="Date"/>
    </div>
    </div>
    
      <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnSave" value="Update" class="btn btn-primary" />
     </div>
     </div>
     
</form>