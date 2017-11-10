<div class="topstyl"><h3 class="styl">Delete Employee Salary</h3></div>

<?php
error_reporting(0);
	if(isset($_POST["btnDelete"])){
		
		$ids = $_POST["chkids"];
		
		foreach($ids as $id){
			$db->query("delete from b_exp where id='$id' ");
			
			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Success !</strong> Successfully Deleted.
			</div>";
		}
	}
?>

<table class="table table-bordered table-hover">
	<thead>
    	<tr>
        	<th colspan="9" style="padding:2px">
            <form method="post" action="home.php?item=38" onSubmit="return confirm('Are you sure delete this record ?');">
             <button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
             <a style="float:right" class="btn btn-info" href="home.php?item=29"><i class="glyphicon glyphicon-log-out"></i> Return</a>
           </th>
        </tr>
    	<tr>
        	<th>Action</th>
           
            <th>Employee Name</th>
          	<th>Contact No</th>
            <th>Source</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
			<th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    
    <?php
    $empsalary_table = $db->query("select ex.id,e.id,e.name,e.contact_no,s.id,s.name,ex.billdate,sum(ex.paidamount),sum(ex.dueamount),ex.status from b_exp as ex,b_employee as e, bf_source as s where e.id=ex.employee_id and s.id = ex.source_id");
	while(list($exid,$id,$ename,$contact,$sid,$sname,$date,$pamount,$damount,$status)=$empsalary_table->fetch_row()){?>
	<tbody>
    	<tr>
        	<td><?php echo "<input type='checkbox' value='$exid' name=chkids[]/>";?></td>
           
            
            <td>(id=<?php echo $id;?>) <?php echo $ename;?></td>
            <td><?PHP echo $contact;?></td>
            <td><?php echo $sname;?></td>
            <td><?php echo $pamount;?></td>
            <td><?php echo $damount;?></td>
            <td><?php echo $date;?></td>
			 <td><?php echo $status;?></td>
        </tr>
    </tbody>	
	
		<?php }?>
        
           </form>
</table>