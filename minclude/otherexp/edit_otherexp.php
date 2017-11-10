<div class="topstyl"><h3 class="styl">Edit Other Expense</h3></div>

<?php
	if(isset($_POST["txtOexp"])){
		
		$oexpid = $_POST["txtOexp"];
		
		$otherexp_table = $db->query("select id,source,paidamount,billdate from b_exp where id='$oexpid' ");	
		list($oexpid,$source,$amount,$date)=$otherexp_table->fetch_row();
	}
	
	if(isset($_POST["btnUpdate"])){
		
		$oexpid = $_POST["txtOexp"];
		$source = $_POST["txtSource"];
		$amount = $_POST["txtAmount"];
		$date   = $_POST["txtDate"];
		
		$db->query("update b_exp set source='$source',paidamount='$amount',billdate='$date' where id='$oexpid' ");
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Success!</strong> Successfully Updated.
		</div>";
	}

?>

<div style="float:right"><a class="btn btn-info" href="home.php?item=40"><i class="glyphicon glyphicon-log-out"></i> Return</a></div>

<form class="form-horizontal" method="post" action="home.php?item=41">
	
    <div class="form-group" hidden="">
    <label class="control-label col-sm-4">Source Id</label>
    <div class="col-sm-5">
    <input type="text" name="txtOexp" value="<?php echo $oexpid?>" class="form-control"/>
    </div>
    </div>
    
	<div class="form-group">
    <label class="control-label col-sm-4">Source Name :</label>
    <div class="col-sm-5">
    <input type="text" name="txtSource" class="form-control" placeholder="Source Name" value="<?php echo $source;?>"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Amount :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" placeholder="Amount" value="<?php echo $amount;?>" name="txtAmount"/>
    </div>
    </div>

	<div class="form-group">
    <label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    <input type="text" id="Date" name="txtDate" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $date?>"/>
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
    <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
    </div>
    </div>
    
</form>