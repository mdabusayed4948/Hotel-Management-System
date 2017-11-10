<div class="topstyle"><h3 class="styl"> User List</h3></div>

<table class="table table-bordered table-hover">
	<thead>
    <tr>
    	<th colspan="7" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=1" style="float:right; text-decoration:none" class="btn btn-info"> <i class=' glyphicon glyphicon-plus-sign'></i> Add New</a></th>
    </tr>
    	<tr>
        	<th>User ID</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Contact No</th>
             <th>E-mail</th>
            <th>Action</th>
        </tr>
    </thead>

<?php

	$user_table = $db->query("select u.id,u.username,u.contact_no,r.name,u.email from b_user as u,b_role as r where r.id=u.role_id order by id");
	while(list($id,$u_name,$contact,$role,$email)=$user_table->fetch_row()){?>
		
	   <tbody>
          <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $u_name; ?></td>
            <td><?php echo $role; ?></td>
             <td><?php echo $contact; ?></td>
            <td><?php echo $email; ?></td>
             <td>
             	<div style="float:left; margin-right:5px">
               
			   <form action='home.php?item=2' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtUserId'/>
                <button type="submit" name="btnEdit" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> </button>    
                  
                </form>
                </div> 
                <div style="float:left">
        	   <form action='home.php?item=5' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtUserId'/>
                 
      
     		  <button type="submit" name="btnEdit" class="btn btn-primary"><i class='glyphicon glyphicon-user'></i> </button>    
                  
			</form>	
				</div>
            </td>
          </tr>
       </tbody>
<?php }?>

 
</table>