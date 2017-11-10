<div class="topstyle"><h3 class="styl">Guest List</h3></div>

<?php
if(isset($_POST["btnSearch"])){ ?>
<table class="table table-bordered table-hover">

	<thead>
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
    $guest = validate($_POST["txtSearch"]);
	
	$guest_table = $db->query("select id,name,gender,email,contact_no,address,status from b_guest where email like '%".$guest."%' or contact_no like '%".$guest."%' ");
	
	while(list($id,$name,$gender,$email,$contact,$address,$status)=$guest_table->fetch_row()){ ?>
		
        <tbody>
         <tr>
          <td><?php echo $id;?></td>
          <td><?php echo $name;?></td>
          <td><?php echo $gender;?></td>
          <td><?php echo $email;?></td>
          <td><?php echo $contact;?></td>
          <td><?php echo $address;?></td>
          <td><?php echo $status;?></td>
         </tr>
        </tbody>
		
<?php }}

function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
</table>	
	
	


<table class="table table-bordered table-hover">

	<thead>
    	<tr>
          <th colspan="8" style="background-color:#F8F8F8; padding:2px">
          <span style="float:left">
          <form action="home.php?item=14" method="post">
          <input type="text" placeholder="contact no / Email" name="txtSearch"/>
          <button type="submit" class="btn btn-info" name="btnSearch"><i class="glyphicon glyphicon-search"></i></button>
          <button  class="btn btn-primary" onClick="myFunction()"><i class="glyphicon glyphicon-search"></i></button>
          </form>
          </span>
          <span style="float:right">
          <a href="home.php?item=11"  text-decoration:none" class="btn btn-primary">
          <i class="glyphicon glyphicon-plus-sign"></i> Add New</a>
          </span>
          </th>
        </tr>
      <tr>
        <th>Guest ID</th>
        <th>Guest Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
      
      </tr>
      
      <?php
      $guest_table = $db->query("select id,name,gender,email,contact_no,address,status from b_guest order by id");
	  while(list($id,$name,$gender,$email,$contact,$address,$status)=$guest_table->fetch_row()){ ?>
		<tr>
        	<td><?php echo $id;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $gender;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $contact;?></td>
            <td><?php echo $address;?></td>
            <td><?php echo $status;?></td>
             <td>
              <form action='home.php?item=12' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtGuestId'/>
                <button type="submit" name="btnEdit" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> </button>    
                  
                </form>
             
            </td>
            
        </tr>  
		
	  <?php }?>
    </thead>

</table>
