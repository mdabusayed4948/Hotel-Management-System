<div class="topstyl"><h3 class="styl">In Active Guest List</h3></div>

<table class="table table-bordered table-hover">
   <thead>
	 <tr>
       <th colspan="8" style="padding:2px"><a class="btn btn-info" style="float:right" href="home.php?item=11"><i class="glyphicon glyphicon-plus-sign"></i>Add New</a></th>
     </tr>
     <tr>
       <th>Guest Id</th>
       <th>Guest Name</th>
       <th>Gender</th>
       <th>E-mail</th>
       <th>Contact No</th>
       <th>Address</th>
       <th>Status</th>
       <th>Action</th>
     </tr>
   </thead>
   <?php
   		$inactive_guest_table=$db->query("select id,name,gender,email,contact_no,address,status from b_guest where status='In Active'");
		
		while(list($id,$name,$gender,$email,$contact,$address,$status)=$inactive_guest_table->fetch_row()){?>
        <thead>
        	<tr>
              <td><?php echo $id;?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $gender;?></td>
              <td><?php echo $email;?></td>
              <td><?php echo $contact;?></td>
              <td><?php echo $address;?></td>
              <td><?php echo $status;?></td>
              <td>
              	<form method="post" action="home.php?item=12">
                	<input type="hidden" name="txtGuestId" value="<?php echo $id;?>"/>
                    <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                
                </form>
              </td>
            </tr>
        </thead>
       
   <?php } ?>
</table>