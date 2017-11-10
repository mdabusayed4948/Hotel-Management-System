<div class="topstyl"><h3 class="styl">Delete Other Expense</h3></div>


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
        	<th colspan="5" style="padding:2px">
            	<form action="home.php?item=47" method="post" onSubmit="return confirm('Are you sure delete this Records ?')">
                <button class="btn btn-danger" type="submit" name="btnDelete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                <a class="btn btn-info" style="float:right" href="home.php?item=45"><i class="glyphicon glyphicon-log-out"></i> Return</a>
               
            </th>
        </tr>
    	<tr>
           <th>Action</th>
           <th>Source Name</th>
           <th>Amount</th>
           <th>Date</th>
        </tr>
    </thead>
	<?php
    $otherexp_table = $db->query("select id,source,paidamount,billdate from b_exp");
	while(list($id,$source,$amount,$date)=$otherexp_table->fetch_row()){?>
		<tbody>
        	<tr>
            	<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
                <td><?php echo $source;?></td>
                <td><?php echo $amount;?></td>
                <td><?php echo $date;?></td>
            </tr>
        </tbody>
		
	<?php }?>
     </form>
</table>