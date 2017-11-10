<div class="topstyl"><h3 class="styl">Food List</h3></div>

<table class="table table-bordered table-hover">

	<thead>
    	<tr>
        	<th colspan="5" style="padding:2px"><a style="float:right;" class="btn btn-primary" href="home.php?item=34"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
        </tr>
		<tr>
        	<th>Food Id</th>
        	<th>Food Name</th>
            <th>Food Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
	</thead>
    
    <?php
    $food_table = $db->query("select id,name,description,price from b_food");
	while(list($id,$name,$desc,$price)=$food_table->fetch_row()){ ?>
		
		   <thead>
    	<tr>
        	<td><?php echo $id;?></td>
        	<td><?php echo $name;?></td>
            <td width="700"><?php echo $desc;?></td>
        	<td><?php echo $price;?></td>
            <td>
            <form method="post" action="home.php?item=36">
            	<input type="hidden" name="txtfid" value="<?php echo $id;?>"/>
                <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
            </form>
            </td>
         
       
        </tr>
    </thead>
		
		
	<?php } ?>
	
    
 

</table>