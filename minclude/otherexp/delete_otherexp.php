<div class="topstyl"><h3 class="styl">Delete Otherexp </h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkids"];	
	
	foreach($ids as $id){
		$db->query("delete from b_exp where id='$id' ");
		
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Success!</strong> Successfully Deleted.
		</div>";
		}
}
?>

<table class="table table-bordered table-hover">

	<thead>
    	<tr>
        	<th colspan="4" style="padding:2px">
            <form method="post" action="home.php?item=42" onSubmit="return confirm('Are you sure delete this Record ?')">
            <button type="submit" class="btn btn-danger" name="btnDelete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
        <a class="btn btn-info" href="home.php?item=40" style="float:right"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          
            </th>
        </tr>
    	<tr>
        	<th>Action</th>
            <th>Source Name</th>
              <th>Date</th>
            <th>Amount</th>
          
        </tr>
    </thead>
    
    <?php
    $otherexp_table = $db->query("select id,source,billdate,paidamount from b_exp");
	
	while(list($id,$source,$date,$amount)=$otherexp_table->fetch_row()){?>
    <tbody>
    	<tr>
        	<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>" ?></td>
            <td><?php echo $source;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $amount;?></td>
        </tr>
    </tbody>
 
	 <?php }?>
	  </form>
</table>