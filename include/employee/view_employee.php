<div class="topstyle"><h3 class="styl">Employee List</h3></div>

<?php
if(isset($_POST["btnSearch"])){ ?>
	<table class="table table-bordered table-hover">
      	<thead>
        	<tr>
            	<th colspan="7" style="background-color:#F8F8F8; padding:2px" >
                <a class="btn btn-info" style="float:right" href="home.php?item=6"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a>
                </th>
            </tr>
            <tr>
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Gender</th>
                <th>Contact No</th>
                <th>E-Mail</th>
                <th>Action</th>
            </tr>  
        </thead>
       
   
    <?php
    $empid=validate($_POST["cmbempid"]);
	
	$emp_table=$db->query("select id,name,gender,contact_no,email from b_employee where email like '%".$empid."%' or contact_no like '%".$empid."%' ");
	while(list($id,$name,$gender,$contact,$email)=$emp_table->fetch_row()){ ?>
	
    <tbody>
    	<tr>
        	<td><?php echo $id;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $gender;?></td>
            <td><?php echo $contact;?></td>
            <td><?php echo $email;?></td>
           	<td>
            <div style="float:left; margin-right:5px;">
            	<form action="home.php?item=7" method="post">
                	<input type="hidden" value="<?php echo $id;?>" name="txtEmpId"/>
                    <button type="submit" name="btnEdit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                </form>
                
                </div>
                 <div style="float:left">
                	<form action="home.php?item=10" method="post">
                    <input type="hidden" value="<?php echo $id;?>" name="txtEmpId"/>
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-user" ></i></button>
                 
                    </form>
                </div>
            </td> 
           
        </tr>
    </tbody>	
	
	
    
<?php } } 

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
        
    	<th colspan="7" style="background-color:#F8F8F8; padding:2px">
        <span style="float:left">
        <form action="home.php?item=9" method="post">
        <input type="text" name="cmbempid" placeholder="contact no / Email"/>
        	 
        <button type="submit" name="btnSearch" class="btn btn-info" ><i class="glyphicon glyphicon-search"></i></button>
         <button class="btn btn-primary" onClick="myFunction()"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>
      
        </span>
        
        <span style="float:right;">
        <a href="home.php?item=6"  style="text-decoration:none" class="btn btn-info"> <i class=' glyphicon glyphicon-plus-sign'></i> Add New</a>
        
        </span>
        </th>
    </tr>
    	<tr>
          	<th>Employee ID</th>
            <th>Employee Name</th>
            <th>Designation</th>
            <th>Contact</th>
            <th>E-mail</th>
            <th>Action</th>
        </tr>
    
    </thead>
    <?php
    	$employee_table = $db->query("select e.id,e.name,e.f_name,e.m_name,e.gender,e.contact_no,e.email,e.dob,d.name,e.present_address,e.permanent_address,e.join_date from b_employee as e,b_designation as d where d.id=e.designation_id");
		
		while(list($id,$name,$fname,$mname,$gender,$contact,$mail,$dob,$desig,$paddress,$peraddress,$jdate)=$employee_table->fetch_row()){?>
		<tbody>
        	
        	<tr>
            	<td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $desig;?></td>
                <td><?php echo $contact;?></td>
                <td><?php echo $mail;?></td>
              	 <td>
             	<div style="float:left; margin-right:5px">
               
			   <form action='home.php?item=7' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtEmpId'/>
                <button type="submit" name="btnEdit" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> </button>    
                  
                </form>
                </div> 
                <div style="float:left">
        	   <form action='home.php?item=10' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtEmpId'/>
         	  <button type="submit" name="btnDetails" class="btn btn-primary"><i class='glyphicon glyphicon-user'></i> </button>    
                  
			</form>	
				</div>
            </td>
            </tr>
        </tbody>	
		
		<?php }?>
  
</table>