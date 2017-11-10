<div class="topstyl"><h3 class="styl">Source List</h3></div>

<table class="table table-bordered table-hover">
	
    <thead>
    	<tr>
        	<th colspan="4" style="background-color:#F8F8F8; padding:2px"><a class="btn btn-info" style="float:right" href="home.php?item=49"><i class="glyphicon glyphicon-plus-sign"> Add New</i></a></th>
        </tr>
    	<tr>
        	<th>Source Name</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    
 		<?php
        $desig_table = $db->query("select id,name,create_date from bf_source");
		while(list($id,$name,$source)=$desig_table->fetch_row()){ ?>
		<tbody>
        	<tr>
            
                <td><?php echo $name;?></td>
                <td><?php echo $source;?></td>
                <td>
                	<form method="post" action="home.php?item=52">
                    	<input type="hidden" name="txtSourceId" value="<?php echo $id;?>"/>
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>	
			
	<?php }	?>
	
</table>