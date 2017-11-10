<div class="topstyl"><h3 class="styl">Delete Reservation</h3></div>

<?php
	error_reporting(0);
	
	if(isset($_POST["btnDelete"])){
		
		$ids = $_POST["chkids"];
		
		foreach($ids as $id){
			$db->query("delete from b_income where id='$id' ");	
			
			echo "<div class='alert alert-success alert-dismisable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Success !</strong> Successfully Deleted !
			</div>";
		}
	}
?>

<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="7" style="padding:2px">
            <form method="post" action="home.php?item=26" onclick="return confirm('Are you sure Delete this Record ?')">
            	<button type="submit" class="btn btn-danger" name="btnDelete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                <a style="float:right" class="btn btn-info" href="home.php?item=24"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          
            </th>
        </tr>
    	<tr>
        	<th>Action</th>
            <th>Room Id</th>
        	<th>Guest Name</th>
            <th>Room No</th>
            <th>Check In Date</th>
            <th>Chech Out Date</th>
        </tr>
    </thead>
    <?php
    $reservation_table = $db->query("select i.id,g.name,r.room_name,i.checkin_date,i.checkout_date from b_income as i,b_guest as g,b_room as r where g.id=i.guest_id and r.id=i.room_id");
	
	while(list($rid,$gname,$rname,$checkindate,$checkoutdate)=$reservation_table->fetch_row()){ ?>
		
	<tbody>
        <tr>
        	<td><?php echo "<input type='checkbox' name='chkids[]' value='$rid'/>";?></td>
        	<td><?php echo $rid;?></td>
            <td><?php echo $gname;?></td>
            <td><?php echo $rname;?></td>
            <td><?php echo $checkindate;?></td>
            <td><?php echo $checkoutdate;?></td>
        </tr>
        	
    </tbody>
	
	<?php } ?>
      </form>
</table>