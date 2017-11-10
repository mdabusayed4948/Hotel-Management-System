<div class="topstyl"><h3 class="styl">Delete Food Delivery</h3></div>

<?php
	error_reporting(0);
	if(isset($_POST["btnDelete"])){
	
		$ids = $_POST["chkids"];
		
		foreach($ids as $id){
			
			$db->query("delete from b_income where id='$id' ");
			
			 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Deteted.
  </div>";
		}	
	}
?>

<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="8" style="padding:2px">
       <form method="post" action="home.php?item=34" onClick="return confirm('Are you sure Delete this Record ?')">
        <button type="submit" class="btn btn-danger" name="btnDelete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
       <a style="float:right" class="btn btn-info" href="home.php?item=32"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          
            </th>
        </tr>
    	<tr>
          <th>Action</th>
          <th>Id</th>
          <th>Guest Name</th>
          <th>Food Name</th>
          <th>Date</th>
          <th>Paid Amount</th>
          <th>Due Amount</th>
          <th>Status</th>
        </tr>
    </thead>
    
    <?php
    $fooddelivery_table = $db->query("select fd.id,g.name,f.name,fd.checkin_date,fd.p_price,fd.d_price,fd.status,fd.fstatus from b_income as fd, b_guest as g,b_food as f where g.id=fd.guest_id and f.id=fd.food_id and fd.fstatus='fstatus' ");
	while(list($fdid,$gid,$fid,$date,$pamount,$damount,$status,$fstatus)=$fooddelivery_table->fetch_row()){ ?>
	<tbody>
     	<tr>
        	
        	<td><?php echo "<input type='checkbox' name='chkids[]' value='$fdid'/>";?></td>
        	<td><?php echo $fdid;?></td>
            <td><?php echo $gid;?></td>
            <td><?php echo $fid;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $pamount;?></td>
            <td><?php echo $damount;?></td>
            <td><?php echo $fstatus;?></td>
        </tr>   
    </tbody>	

<?php }?>
      </form>
</table>