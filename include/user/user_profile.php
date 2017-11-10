<div class="topstyle"><h3 class="styl"> User's Profile</h3></div>

<table class="table table-bordered table-hover">
	<thead>
    	<tr>
        	<th colspan="2" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=4" style="float:right; text-decoration:none" class="btn btn-primary"><i class='glyphicon glyphicon-log-out'></i> Return</a></th>
        </tr>
    </thead>

<?php
date_default_timezone_set("Asia/Dhaka");
	if(isset($_POST["txtUserId"])){
		$user_id = $_POST["txtUserId"];	
		
		$user_table = $db->query("select u.id,u.username,u.contact_no,r.name,u.email,u.gender,u.address,u.join_date,u.image from b_user as u,b_role as r        where r.id=u.role_id and u.id = $user_id");
		
		list($_id,$username,$contact,$role,$email,$gender,$address,$join_date,$image) = $user_table->fetch_row();
		
		$join_date = date("d M Y",strtotime($join_date));
	}
?>
<tbody>
     <tr>
       <td colspan="2" style="text-align:center"><img src="<?php echo isset($image)?$image:"";?>" width="100" height="100"/></td>
     </tr>
    <tr>
        <td>User Name : </td>
        <td><?php echo isset($username)?$username:"";?></td>
    </tr>
    
    <tr>
    	<td>User's Role : </td>
        <td><?php echo isset($role)?$role:"";?></td>
    </tr>
    
    <tr>
    	<td>Gender : </td>
        <td><?php echo isset($gender)?$gender:"";?></td>
    </tr>
    
    <tr>
    	<td>Contact No : </td>
        <td><?php echo isset($contact)?$contact:"";?></td>
    </tr>
    
    <tr>
    	<td>E-Mail :</td>
        <td><?php echo isset($email)?$email:"";?></td>
    </tr>
    
    <tr>
    	<td>Address :</td>
        <td><?php echo isset($address)?$address:"";?></td>
    </tr>
    
    <tr>
    	<td>Join Date :</td>
        <td><?php echo isset($join_date)?$join_date:"";?></td>
    </tr>

</tbody>

<tfoot>
	<tr>
    	<td colspan="2" style="background-color:#F8F8F8"></td>
    </tr>
</tfoot>

</table>