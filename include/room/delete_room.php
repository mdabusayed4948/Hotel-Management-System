<div class="topstyle"><h3 class="styl">Delete Rooms</h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];
	
	foreach($ids as $id){
		$db->query("delete from b_room where id='$id'");
		
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
        <form action="home.php?item=19" method="post" onSubmit="return confirm('Are you sure Delete this record?');">
<button type="submit" name="btnDelete" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i> Delete</button>
<a style="float:right" class="btn btn-info" href="home.php?item=16"><i class='glyphicon glyphicon-log-out'></i> Return</a>

        </th>
    </tr>
    <tr>
      <th>Action</th>
      <th>Room Id</th>
      <th>Room No</th>
      <th>Room Type</th>
      <th>Price for per night (tk)</th>
      <th>Status</th>
    </tr>
</thead>

<?php 
$room_table=$db->query("select id,room_no,room_type,price,status from b_room order by id");
while(list($id,$rno,$rtype,$price,$status)=$room_table->fetch_row()){?>
	<tbody>
    	<tr>
        <td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>"?></td>
        <td><?php echo $id;?></td>
        <td><?php echo $rno;?></td>
        <td><?php echo $rtype;?></td>
        <td><?php echo $price;?></td>
        <td><?php echo $status;?></td>
        </tr>
    </tbody>
	
<?php }?>
</form>
</table>