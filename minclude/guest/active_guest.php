<div class="topstyl"><h3 class="styl">Active Guest List</h3></div>

<table class="table table-bordered table-hover">

	<thead>
    	<tr>
        	<th colspan="8" style="padding:2px"><a class="btn btn-info" style="float:right; text-decoration:none" href="home.php?item=10"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
        </tr>
        <tr>
          <th>Guest Id</th>
          <th>Guest Name</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Contact No</th>
          <th>Address</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
    </thead>
    <?php
    	$active_guest_table=$db->query("select id,name,gender,email,contact_no,address,status from b_guest where status='Active'");
		while(list($id,$name,$gender,$email,$contact,$address,$status)=$active_guest_table->fetch_row()){ ?>
		
        <tbody>
            <tr>
            	<td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $gender;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $contact;?></td>
                <td><?php echo $address;?></td>
                <td>
				
				<?php 
				if($status=='Active'){
				echo "<span class='glyphicon glyphicon-ok' style='color:green'></span>";	
				}else if($status=='In Active'){
				echo "<i  class='glyphicon glyphicon-remove' style='color:red'></i>";		
				}
			
				?>
                
                </td>
                <td>
                	<form method="post" action="home.php?item=12">
                    <input type="hidden" name="txtGuestId" value="<?php echo $id;?>"/>
                    <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                    
                    </form>
                </td>
            </tr>
        </tbody>	
		
		<?php }?>
</table>