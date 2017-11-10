<div><h3 class="styl">Food List</h3></div>

<table class="table table-bordered table-hover">

	<thead>
    	<th>Food Id</th>
        <th>Food Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </thead>
    
    <?php
    $food_table = $db->query("select id,name,description,price from b_food");
	
	while(list($id,$name,$desc,$price)=$food_table->fetch_row()){ ?>
		<tbody>
        	<tr>
            	<td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td width="700"><?php echo $desc;?></td>
                <td><?php echo $price;?></td>
                
                <td>
                	<form method="post" action="home.php?item=29">
                    <input type="hidden" name="txtfid" value="<?php echo $id;?>"/>
                    <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>

	<?php } ?>

</table>