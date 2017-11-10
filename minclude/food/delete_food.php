<div class="topstyl"><h3 class="styl">Delete Food</h3></div>

<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids=$_POST["chkids"];
	
	foreach($ids as $id){
		$db->query("delete from b_food where id='$id'");
		
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		 <strong>Success!</strong> Successfully Deteted.
		</div>";
	}
}
?>
 
<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="5" style="padding:2px">
            	<form method="post" action="home.php?item=30" style="padding:2px" onSubmit="return confirm('Are you sure Delete this record ?');">
                	<button type="submit" class="btn btn-danger" name="btnDelete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                    <a style="float:right" class="btn btn-info" href="home.php?item=28"><i class="glyphicon glyphicon-log-out"></i> Return</a>
              
            </th>
        </tr>
    	<tr>
        	<th>Action</th>
            <th>Food Id</th>
            <th>Food Name</th>
            <th>Price</th>
        </tr>
    </thead>
    
    <?php
    	$food_table=$db->query("select id,name,price from b_food");
		while(list($id,$name,$price)=$food_table->fetch_row()){ ?>
			<tbody>
            	<tr>
                	<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>" ;?></td>
                	<td><?php echo $id;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $price;?></td>
                </tr>
            </tbody>	

		<?php }?>
      </form>
</table>