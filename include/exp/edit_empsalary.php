
<div class="topstyl"><h3 class="styl">Edit Employee Salary</h3></div>

<?php
	if(isset($_POST["txtInid"])){
		
		$in_id = $_POST["txtInid"];	
		
		$income_table = $db->query("select id,employee_id,source_id,billdate,paidamount,dueamount,status from b_exp where id='$in_id'");
		
		list($in_id,$empid,$source,$date,$pamount,$damount,$status)=$income_table->fetch_row();
	}
	
	if(isset($_POST["btnUpdate"])){
		
		$in_id   = validate($_POST["txtInid"]);	
		$empid   = validate($_POST["cmbEmpid"]);
		$source  = validate($_POST["txtSource"]);	
		$date    = validate($_POST["txtDate"]);	
		$pamount = validate($_POST["txtpAmount"]);
		$damount = validate($_POST["txtdAmount"]);	
		$status  = validate($_POST["txtStatus"]);	
		
		$db->query("update b_exp set employee_id='$empid', source_id='$source',billdate='$date',paidamount='$pamount',dueamount='$damount',status='$status' where id='$in_id'");
		
        echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";	
	}
	
	 function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data); 
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<div><a style="text-decoration:none; float:right" href="home.php?item=29" class="btn btn-success"><i class="glyphicon glyphicon-list"></i> Employee Salary List</a></div>

<form method="post" action="home.php?item=30" class="form-horizontal">

	<div class="form-group" hidden="">
    <label class="control-label col-sm-4">Income Id :</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="txtInid" value="<?php echo isset($in_id)?$in_id:"";?>"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Employee Id :</label>
    <div class="col-sm-5">
    	<select class="form-control" name="cmbEmpid">
        <?php
        $emp_table=$db->query("select e.id,e.name,e.contact_no,d.name,d.salary from b_employee as e, b_designation as d where d.id=e.designation_id");
		while(list($id,$name,$contact,$designation,$salary)=$emp_table->fetch_row()){
			if($empid==$id){
				echo "<option value='$id' selected>Id=$id | $name | $contact | $designation | $salary</option>";
				}else{
				echo "<option value='$id'>Id=$id | $name | $contact | $designation | $salary</option>";	
				}
			}
		?>
        </select>
    </div>
    </div>
    
       <div class="form-group">
    <label class="control-label col-sm-4">Source Name :</label>
    <div class="col-sm-5">
        <select class="form-control" name="txtSource" value="<?php echo isset($source)?$source:""?>">
            <?php
              $guest_table = $db->query("select id,name from bf_source");
              while(list($id,$name)=$guest_table->fetch_row()){

                if($source == $id){
                    echo "<option value='$id' selected>Id= $id | $name </option>";
                }else{
                     echo "<option value='$id'>Id= $id | $name </option>";
                }
                }  
                
            ?>
        </select>
    </div>
    
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Date :</label>
    <div class="col-sm-5">
    <input type="text" id="Date" name="txtDate" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo isset($date)?$date:""?>"/>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">Paid Amount :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtpAmount" class="form-control" placeholder="Paid Amount" value="<?php echo isset($pamount)?$pamount:""?>"/>
    </div>
    </div>
    
      <div class="form-group">
    <label class="control-label col-sm-4">Due Amount :</label>
    <div class="col-sm-5">
    	<input type="text" name="txtdAmount" class="form-control" placeholder="Due Amount" value="<?php echo isset($damount)?$damount:""?>"/>
    </div>
    </div>
    
     <div class="form-group">
    <label class="control-label col-sm-4">Status  :</label>
    <div class="col-sm-5">
    	<select class="form-control" name="txtStatus">
        	<option><?php echo isset($status)?$status:""?></option>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Due">Due</option>
        </select>
    </div>
    </div>
    
      <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" name="btnUpdate" value="Submit" class="btn btn-primary  " />
  
      </div>
     </div>
   
    

</form>