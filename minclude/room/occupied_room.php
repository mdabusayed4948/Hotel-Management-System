<div class="topstyl"><h3 class="styl">Occupied Room List</h3></div>

<table class="table table-bordered table-hover">
	<thead>
    	<tr>
          <th>Room Id</th>
          <th>Room No</th>
          <th>Room Name</th>
          <th>Room Type</th>
          <th>Room Rate</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
    </thead>
    <?php
    $room_table = $db->query("select id,room_name,room_no,room_type,description, price,status,image from b_room where status='Occupied' ");
	while(list($id,$rname,$rno,$rtype,$desc,$price,$status,$image)=$room_table->fetch_row()){ ?>
		
        <tbody>
        	<td><?php echo $id;?></td>
             <td><?php echo $rno;?></td>
            <td><?php echo $rname;?></td>
            <td><?php echo $rtype;?></td>
            <td><?php echo $price;?></td>
            <td><?php echo $status;?></td>
            <td>
            	<div style="float:left; margin-right:5px;">
                   <form method="post" action="home.php?item=18">
                	<input type="hidden" name="txtroomId" value="<?php echo $id;?>"/>
                    <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                </form>
                </div>
                
                <div style="float:left">
                	<form method="post" action="home.php?item=19">
                    	<input type="hidden" name="txtroomId" value="<?php echo $id;?>"/>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-list"></i></button>
                    </form>
                </div>
            	
            </td>
           
        </tbody>
	
		<?php }?>
</table>