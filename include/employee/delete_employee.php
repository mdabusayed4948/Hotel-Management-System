<div class="topstyle"><h3 class="styl">Delete Employee</h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];
	
	foreach($ids as $id){
		$db->query("delete from b_employee where id ='$id'");
		
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
            	<form action="home.php?item=8" method="post" onSubmit="return confirm('Are you sure Delete this record');">
                	<button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                    <a style="float:right" class="btn btn-info" href="home.php?item=9"><i class='glyphicon glyphicon-log-out'></i> Return</a>
              
            </th>
        </tr>
      <tr>
      	<th>Action</th>
        <th>Employee ID</th>
        <th>Employee Name </th>
        <th>Contact No</th>
        <th>E-mail</th>
      </tr>
    </thead>
    
    <?php
    	$employee_table = $db->query("select id,name,contact_no,email from b_employee order by id");
		while(list($id,$name,$contact,$email)=$employee_table->fetch_row()){ ?>
        
        <tbody>
           <tr>
           	 <td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
             <td><?php echo $id;?></td>
             <td><?php echo $name;?></td>
             <td><?php echo $contact;?></td>
             <td><?php echo $email;?></td>
           </tr>
        </tbody>
			
			
	<?php }?>
    
      </form>	
</table>