<div class="topstyl"><h3 class="styl">Delete Designation</h3></div>

<?php
	if(isset($_POST["btnDelete"])){
		
		$ids = $_POST["chkids"];
		foreach($ids as $id){
			$db->query("delete from b_designation where id='$id' ");
			
			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Success !</strong> Successfuly Deleted
			</div>";	
		}
	}
?>

<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="4" style="padding:2px">
            	<form method="post" action="home.php?item=39" onSubmit="return confirm('Are you sure delete this records ?')">
                
                <button type="submit" class="btn btn-danger" name="btnDelete" ><i class="glyphicon glyphicon-trash"></i> Delete</button>
             <a class="btn btn-info" style="float:right" href="home.php?item=32"><i class="glyphicon glyphicon-log-out"></i> Return</a>
            
            </th>
        </tr>
    	<tr>
        	<th>Action</th>
        	<th>Designation Id</th>
            <th>Designation Name</th>
            <th>Salary</th>
        </tr>
    </thead>
    
    <?php
    $desig_table=$db->query("select id,name,salary from b_designation");
	while(list($id,$name,$salary)=$desig_table->fetch_row()){ ?>
	
    <tbody>
    	<tr>
        	<td><?php echo "<input type='checkbox' value='$id' name='chkids[]'/>";?></td>
            <td><?php echo $id;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $salary;?></td>
        </tr>
    </tbody>	

	
	<?php }?>
        </form>
</table>