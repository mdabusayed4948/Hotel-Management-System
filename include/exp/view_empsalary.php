<div class="topstyl"><h3 class="styl">Employee Salary List</h3></div>

<table class="table table-bordered table-hover">

	<thead>
    	<tr>
        	<th>Employee Id</th>
        	<th>Employee Name</th>
            <th>Contact No</th>
            <th>Source</th>
            <th>Date</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <?php
    	$income_table = $db->query("select ex.id,e.id,e.name,e.contact_no,s.id,s.name,ex.billdate,ex.paidamount,ex.dueamount,ex.status from b_exp as ex,b_employee as e, bf_source as s where e.id=ex.employee_id and s.id = ex.source_id");
		while(list($exid,$id,$ename,$contact,$sid,$sname,$date,$pamount,$damount,$status)=$income_table->fetch_row()){?>
        <tbody>
        	<tr>
            	<td><?php echo $id;?></td>
            	<td><?php echo $ename;?></td>
                <td><?php echo $contact;?></td>
                <td><?php echo $sname;?></td>
                <td><?php echo $date;?></td>
                <td><?php echo $pamount;?></td>
                <td><?php echo $damount;?></td>
                <td><?php echo $status;?></td>
                <td>
                	<form method="post" action="home.php?item=30">
                    	<input type="hidden" value="<?php echo $exid;?>" name="txtInid"/>
                        <button type="submit" name="btnEdit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>
       
	 <?php } ?>
     
     <?php
     $income_table=$db->query("select ex.id,e.id,e.name,e.contact_no,s.id,s.name,ex.billdate,sum(ex.paidamount),sum(ex.dueamount),ex.status from b_exp as ex,b_employee as e, bf_source as s where e.id=ex.employee_id and s.id = ex.source_id");
	 while(list($exid,$id,$ename,$contact,$sid,$sname,$date,$pamount,$damount,$status)=$income_table->fetch_row()){ ?>
		<tfoot>
        	<tr>
              <th style="background-color:#CCC" colspan="9"></th>
            </tr>
            <tr>
            <th colspan="5">Total Amount =</th>
            <th><?php echo $pamount." tk";?></th>
            <th><?php echo $damount." tk";?></th>
            <th colspan="10"></th>
            </tr>
        </tfoot> 
	
	 <?php }?>
     
</table>