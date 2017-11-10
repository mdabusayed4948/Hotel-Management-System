<div class="topstyle">
	<h3 class="styl">Vacant Room List </h3>
</div>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
          <th colspan="7" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=15" style="float:right; text-decoration:none" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
        </tr>
        <tr>
           <th>Room ID</th>
           <th>Room No</th>
           <th>Room type</th>
           <th>Price</th>
           <th>Status</th>
           <th>Action</th>
       </tr>
    </thead>
    <?php
    $room_table = $db->query("select id,room_name,room_no,room_type,description,price,status,image from b_room where status='Vacant' order by id");
	
	while(list($id,$name,$rno,$rtype,$desc,$price,$status,$image)=$room_table->fetch_row()){ ?>
		
	 <tbody>
       <tr>
         <td><?php echo $id;?></td>
         <td><?php echo $rno;?></td>
         <td><?php echo $rtype;?></td>
         <td><?php echo $price;?></td>
         <td><?php echo $status;?></td>
         	 <td>
             	<div style="float:left; margin-right:5px">
               
			   <form action='home.php?item=18' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtroomId'/>
                <button type="submit" name="btnEdit" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> </button>    
                  
                </form>
                </div> 
                <div style="float:left">
        	   <form action='home.php?item=17' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtroomId'/>
         	  <button type="submit" name="btnEdit" class="btn btn-primary"><i class='glyphicon glyphicon-th-list'></i> </button>    
                  
			</form>	
				</div>
            </td>
       </tr>
    	
    </tbody>	
	<?php }?>
   
</table>