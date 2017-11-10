<div class="topstyl"><h3 class="styl">Food Delivery List</h3></div>

<table class="table table-bordered table-hover">

	<thead>
    	<tr>
        	<th colspan="7" style="padding:2px">
            <a href="home.php?item=40" style="float:right" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a>
            </th>
        </tr>
    	<tr>
        	
            <th>Guest Name</th>
            <th>Food Name</th>
             <th>Date</th>
            <th>Paid Price</th>
            <th>Due Price</th>
        	<th>Status</th>
            <th>Action</th>
            
        </tr>
    </thead>
	<?php
    $fooddel_table=$db->query("select fd.id,g.name,f.name,fd.checkin_date,fd.p_price,fd.d_price,fd.status,fd.fstatus from b_income as fd, b_guest as g,b_food as f where g.id=fd.guest_id and f.id=fd.food_id and fd.fstatus='fstatus' ");
	
	while(list($fdid,$gid,$fid,$date,$pamount,$damount,$status,$fstatus)=$fooddel_table->fetch_row()){ ?>
		<tbody>
        	<tr>
            	<td><?php echo $gid;?></td>
                <td><?php echo $fid;?></td>
                <td><?php echo $date;?></td>
                <td><?php echo $pamount;?></td>
                <td><?php echo $damount;?></td>
                <td><?php echo $status;?></td>
                <td>
                <form method="post" action="home.php?item=42">
                <input type="hidden" name="txtfdid" value="<?php echo $fdid;?>"/>
                <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                </form>
                </td>
            </tr>
        </tbody>

		<?php }?>
        
        <?php
         $fooddel_table=$db->query("select fd.id,g.name,f.name,fd.checkin_date,sum(fd.p_price),fd.d_price,fd.status,fd.fstatus from b_income as fd, b_guest as g,b_food as f where g.id=fd.guest_id and f.id=fd.food_id and fd.fstatus='fstatus'  ");
		 while(list($fdid,$gid,$fid,$date,$pamount,$damount,$status,$fstatus)=$fooddel_table->fetch_row()){ ?>
		<tfoot>
           <tr>
              <th colspan="10" style="background-color:#CCC"></th>
           </tr>
           
           <tr>
           	  <th colspan="3">Total Amount</th>
              <th><?php echo $pamount;?></th>
             <th><?php echo $damount;?></th>
             <th colspan="9"></th>
           </tr>
        </tfoot>	 
		
		<?php }?>
</table>