<div class="topstyl"><h3 class="styl">Delete Food Delivery</h3></div>


<?php
error_reporting(0);
	if(isset($_POST["btnDelete"])){
		
		$ids = $_POST["chkids"];
		foreach($ids as $id){
			$db->query("delete from b_income where id='$id' ");
			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label=close>x</a>
			<strong>Success !</strong> Successfully Deleted.
			</div>";	
		}
	}
?>


<table class="table table-bordered table-hover">
	<thead>
    	<tr>
        	<th colspan="8" style="padding:2px; background-color:#F8F8F8">
           	<form action="home.php?item=43" method="post">
            <button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            <a href="home.php?item=41" style="float:right" class="btn btn-info"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          
            </th>
        </tr>
    	<tr>
        	<th>Action</th>
            <th>Guest Name</th>
            <th>Food Name</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    
    <?php
    $fddeli_table = $db->query("select fd.id,g.name,f.name,fd.checkin_date,fd.p_price,fd.d_price,fd.status from b_income as fd,b_food as f,b_guest as g where g.id=fd.guest_id and f.id=fd.food_id");
	
	while(list($id,$gname,$fname,$date,$pprice,$dprice,$status)=$fddeli_table->fetch_row()){ ?>
		<tbody>
        	<tr>
            	<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
                <td><?php echo $gname;?></td>
                <td><?php echo $fname;?></td>
                <td><?php echo $pprice;?></td>
                <td><?php echo $dprice;?></td>
                <td><?php echo $date;?></td>
                <td><?php echo $status;?></td>
            </tr>
        </tbody>
	
	<?php }?>
    
      </form>
</table>