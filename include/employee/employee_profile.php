<div class="topstyle"><h3 class="styl"> Employee's Profile</h3></div>

<table class="table table-bordered table-hover">
	<thead>
    	<tr>
        	<th colspan="2" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=9" style="float:right; text-decoration:none" class="btn btn-primary"><i class='glyphicon glyphicon-log-out'></i> Return</a></th>
        </tr>
    </thead>
    
    <?php
	date_default_timezone_set('Asia/Dhaka');
	
    if(isset($_POST["txtEmpId"])){
		
		$emp_id = $_POST["txtEmpId"];
		
		$employee_table = $db->query("select e.id,e.name,e.f_name,e.m_name,e.gender,e.contact_no,e.email,e.dob,d.name,e.present_address,e.permanent_address,e.join_date,e.image from b_employee as e,b_designation as d where d.id=e.designation_id and e.id='$emp_id'");	
		
		list($id,$name,$fname,$mname,$gender,$contact,$email,$dob,$name,$praddress,$peaddress,$join,$image)=$employee_table->fetch_row();
		
		$dob = date("d M Y",strtotime($dob));
		$join = date("d M Y",strtotime($join));
	}
	?>
    
    <tbody>
    	<tr>
        	<td colspan="2" style="text-align:center"><img src="<?php echo isset($image)?$image:" "?>" width="100"/></td>
        </tr>
    
    	<tr>
        	<td>Employee Name : </td>
            <td><?php echo isset($name)?$name:" "?></td>
        </tr>
        
        <tr>
        	<td>Father's Name :</td>
            <td><?php echo isset($fname)?$fname:" "?></td>
        </tr>
        
         <tr>
        	<td>Mother's Name :</td>
            <td><?php echo isset($mname)?$mname:" "?></td>
        </tr>
        
         <tr>
        	<td>Gender :</td>
            <td><?php echo isset($gender)?$gender:" "?></td>
        </tr>
        
         <tr>
        	<td>Contact No :</td>
            <td><?php echo isset($contact)?$contact:" "?></td>
        </tr>
        
          <tr>
        	<td>E-mail-address :</td>
            <td><?php echo isset($email)?$email:" "?></td>
        </tr>
        
          <tr>
        	<td>Designation:</td>
            <td><?php echo isset($name)?$name:" "?></td>
        </tr>
        
          <tr>
        	<td>Dath of Birth :</td>
            <td><?php echo isset($dob)?$dob:" "?></td>
        </tr>
        
          <tr>
        	<td>Present Address :</td>
            <td><?php echo isset($praddress)?$praddress:" "?></td>
        </tr>
        
          <tr>
        	<td>Permanent Address :</td>
            <td><?php echo isset($peaddress)?$peaddress:" "?></td>
        </tr>
        
          <tr>
        	<td>Join Date :</td>
            <td><?php echo isset($join)?$join:" "?></td>
        </tr>
    </tbody>

</table>