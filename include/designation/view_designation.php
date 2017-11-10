<div class="topstyl"><h3 class="styl">Designation List</h3></div>

<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="4" style="background-color:#F8F8F8; padding:2px"><a class="btn btn-info" style="float:right" href="home.php?item=31"><i class="glyphicon glyphicon-plus-sign"> Add New</i></a></th>
        </tr>
    	<tr>
        	<th>Designation Name</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    
 		<?php
        $desig_table = $db->query("select id,name,salary from b_designation");
		while(list($id,$desig_name,$salary)=$desig_table->fetch_row()){ ?>
		<tbody>
        	<tr>
            
                <td><?php echo $desig_name;?></td>
                <td><?php echo $salary;?></td>
                <td>
                	<form method="post" action="home.php?item=33">
                    	<input type="hidden" name="txtDesigId" value="<?php echo $id;?>"/>
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>	
			
	<?php }	?>
	
</table>