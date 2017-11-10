<div class="topstyle"><h3 class="styl">Delete Guests</h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];
	
	foreach($ids as $id){
	 $msg = $db->query("delete from b_guest where id ='$id'");
	
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
        <th colspan="8" style="background-color:#F8F8F8; padding:2px">
          <form action="home.php?item=13" method="post" onclick="return conform('Are you sure delete this Record ?');">
          	<button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            <a style="float:right" class="btn btn-info" href="home.php?item=14"><i class='glyphicon glyphicon-log-out'></i> Return</a>
        
        </th>
      </tr>
      
      <tr>
        <th>Action</th>
        <th>Guest ID</th>
        <th>Guest Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Address</th>
      </tr>
    </thead>
    
    <?php
    	$guest_table = $db->query("select id,name,gender,email,contact_no,address from b_guest order by id");
		while(list($id,$name,$gender,$email,$contact,$address)=$guest_table->fetch_row()){ ?>
        <tbody>
          <tr>
            <td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
            <td><?php echo $id;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $gender;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $contact;?></td>
            <td><?php echo $address;?></td>
          </tr>
        </tbody>
	<?php }?>
  </form>
</table>
