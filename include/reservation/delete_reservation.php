<div class="topstyl"><h3 class="styl">Delete Reservation</h3></div>
<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];
	
	foreach($ids as $id){
		$db->query("delete from b_income where id='$id'");
		
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
         <th colspan="7" style="background-color:#F8F8F8; padding:2px">
         	<form action="home.php?item=25" method="post" onclick="return confirm('Are you sure delete this record?')">
            <button type="submit" name="btnDelete" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i> Delete</button>
            <a class="btn btn-info" style="float:right" href="home.php?item=23"><i class='glyphicon glyphicon-log-out'></i> Return</a>
          
         </th>
       </tr>
       <tr>
         <th>Action</th>
      
         <th>Guest Name</th>
         <th>Room No</th>
         <th>Checkin Date</th>
         <th>Checkout Date</th>
       </tr>
    </thead>
    <?php
   $reserv_table = $db->query("select re.id,g.name,g.id,r.room_no,re.checkin_date,checkout_date from b_income as re,b_guest as g,b_room as r where g.id=re.room_id and r.id=re.guest_id");
   while(list($id,$gname,$gid,$rno,$checkin_date,$checkout_date)=$reserv_table->fetch_row()){?>
   <tbody>
   		<tr>
          <td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
        
          <td>Id=<?php echo $gid;?> | <?php echo $gname;?></td>
          <td><?php echo $rno;?></td>
          <td><?php echo $checkin_date;?></td>
          <td><?php echo $checkout_date;?></td>
        </tr>
   </tbody>
	   
	
	<?php }?>
   
    
      </form>
</table>