<div class="topstyle"><h3 class="styl">Delete User</h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];	
	
	foreach($ids as $id){
		$db->query("delete from b_user where id='$id'");
		
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
        <form action="home.php?item=3" method="post" onSubmit="return confirm('Are you sure Delete this record?');">
<button type="submit" name="btnDelete" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i> Delete</button>
<a style="float:right" class="btn btn-info" href="home.php?item=4"><i class='glyphicon glyphicon-log-out'></i> Return</a>

        </th>
    </tr>
	<tr>
    	<th>Action</th>
        <th>User ID</th>
        <th>User Name</th>
         <th>User's Role </th>
        <th>Contact No</th>
        <th>E-Mail</th>
    </tr>
</thead>

<?php
	$user_table = $db->query("select u.id,u.username,u.contact_no,r.name,u.email from b_user as u,b_role as r where r.id=u.role_id order by id");
	
	while(list($id,$username,$contact,$role,$email)=$user_table->fetch_row()){?>
		
        <tbody>
        	<tr>
            	<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>"?></td>
                <td><?php echo $id;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $role;?></td>
                <td><?php echo $contact;?></td>
                <td><?php echo $email;?></td>
            </tr>
        </tbody>
		
		<?php }?>
		</form>
	
</table>


