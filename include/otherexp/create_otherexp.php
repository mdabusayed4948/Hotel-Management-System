<div class="topstyl"><h3 class='styl'>Create Other Expense</h3></div>

<?php
	if(isset($_POST["btnSubmit"])){
		
		$source = validate($_POST["txtSource"]);
		$amount = validate($_POST["txtAmount"]);
		$date   = validate($_POST["txtDate"]);
		$status = validate($_POST["cmbStatus"]);
		
		$errors = array();
		
		if($source==""){
			array_push($errors,"Source field is Empty !!");	
		}
		
		if($amount==""){
			array_push($errors,"Amount field is Empty !!");	
		}
		
		if($date==""){
			array_push($errors,"Date field is Empty !!");	
		}
		
		
		
		if(count($errors)==0){
			$db->query("insert into b_exp(source_id,paidamount,billdate,status)values('$source','$amount','$date','$status')");
			
			
			echo "<div class='alert alert-success alter-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Success !</strong> Successfully Inserted.
			</div>";
			
			$source=$amount=$date=$status="";
		}else{
		echo "<div class='alert alert-danger alter-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Error :</strong>".implode("<br/>",$errors)."
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

<div style="float:right">
<a class="btn btn-success" href="home.php?item=45"> <i class="glyphicon glyphicon-list"></i> Other Expense List</a>
</div>

<form class="form-horizontal" method="post" action="home.php?item=44">

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
	<label class="control-label col-sm-4">Amount :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtAmount" placeholder="Amount"/>
    </div>
</div>

<div class="form-group">
	<label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    <input type="text" id="Date" class="form-control" name="txtDate" placeholder="yyyy-mm-dd"/>
    </div>
</div>

<div class="form-group" hidden="">
	<label class="control-label col-sm-4">Status :</label>
    <div class="col-sm-5">
    <select class="form-control" name="cmbStatus">
    	<option value="otherexp">otherexp</option>
    </select>
    </div>
</div>

<div class="form-group">
<div class="col-sm-offset-4 col-sm-5">
<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"/>
<input type="reset" name="" value="Refresh" class="btn btn-success"/>
</div>
</div>

</form>