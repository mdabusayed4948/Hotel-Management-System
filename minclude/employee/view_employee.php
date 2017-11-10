<div class="topstyl"><h3 class="styl">Employee List</h3></div>

<table class="table table-bordered table-hover">
	<thead>
      <tr>
      	<th colspan="7" style="padding:2px; background-color:#F8F8F8"><span style="float:right;"><a class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Add New</span></a></th>
      </tr>
      <tr>
        <th>Employee Id</th>
        <th>Employee Name</th>
        <th>Designation</th>
        <th>Contact No</th>
        <th>E-mail</th>
        <th>Action</th>
      </tr>
    </thead>
    
    <?php
    $employee_table = $db->query("select e.id,e.name,e.f_name,e.m_name,e.gender,e.contact_no,e.email,e.dob,d.name,e.present_address,e.permanent_address,e.join_date from b_employee as e,b_designation as d where d.id=e.designation_id");
	
	while(list($id,$ename,$fname,$mname,$gender,$contact,$mail,$dob,$dname,$paddress,$peraddress,$join_date)=$employee_table->fetch_row()){ ?>
		<tbody>
        	<tr>
              <td><?php echo $id;?></td>
              <td><?php echo $ename;?></td>
              <td><?php echo $dname;?></td>	 
              <td><?php echo $contact;?></td>
              <td><?php echo $mail;?></td>
              <td>
             <div style="float:left; margin-right:5px;">
            	<form action="home.php?item=3" method="post">
                	<input type="hidden" value="<?php echo $id;?>" name="txtEmpId"/>
                    <button type="submit" name="btnEdit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                </form>
                
                </div>
                 <div style="float:left">
                	<form action="home.php?item=5" method="post">
                    <input type="hidden" value="<?php echo $id;?>" name="txtEmpId"/>
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-user" ></i></button>
                 
                    </form>
                </div>
              </td>
            </tr>
        </tbody>

		<?php } ?>
</table>