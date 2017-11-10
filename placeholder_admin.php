<?php    
  if(isset($_GET["item"])){
	  
		 $item=$_GET["item"]; 
		  
		 if($item==1){
			 include("include/user/add_user.php");
		 }else if($item==2){
			 include("include/user/edit_user.php");
		 }else if($item==3){
			 include("include/user/delete_user.php");
		 }else if($item==4){
			 include("include/user/view_user.php");
		 }else if($item==5){
			 include("include/user/user_profile.php");
		 }else if($item==6){
			include("include/employee/add_employee.php");	 
		}else if($item==7){
			include("include/employee/edit_employee.php");	 
		}else if($item==8){
			include("include/employee/delete_employee.php");	 
		}else if($item==9){
			include("include/employee/view_employee.php");	 
		}else if($item==10){
			include("include/employee/employee_profile.php");	 
		}else if($item==11){
			include("include/guest/add_guest.php");	 
		}else if($item==12){
			include("include/guest/edit_guest.php");	 
		}else if($item==13){
			include("include/guest/delete_guest.php");	 
		}else if($item==14){
			include("include/guest/view_guest.php");	 
		}else if($item==15){
			include("include/room/add_room.php");	 
		}else if($item==16){
			include("include/room/view_room.php");	 
		}else if($item==17){
			include("include/room/room_details.php");	 
		}else if($item==18){
			include("include/room/edit_room.php");	 
		}else if($item==19){
			include("include/room/delete_room.php");	 
		}else if($item==20){
			include("include/room/occupied_room.php");	 
		}else if($item==21){
			include("include/room/vacant_room.php");	 
		}else if($item==22){
			include("include/reservation/create_reservation.php");	 
		}else if($item==23){
			include("include/reservation/view_reservation.php");	 
		}else if($item==24){
			include("include/reservation/edit_reservation.php");	
		}else if($item==25){
			include("include/reservation/delete_reservation.php");
		}else if($item==26){
			include("include/guest/active_guest.php");	
		}else if($item==27){
			include("include/guest/inactive_guest.php");	
		}else if($item==28){
			include("include/exp/create_empsalary.php");	
		}else if($item==29){
			include("include/exp/view_empsalary.php");	
		}else if($item==30){
			include("include/exp/edit_empsalary.php");	
		}else if($item==31){
			include("include/designation/create_designation.php");	
		}else if($item==32){
			include("include/designation/view_designation.php");	
		}else if($item==33){
			include("include/designation/edit_designation.php");	
		}else if($item==34){
			include("include/food/create_food.php");	
		}else if($item==35){
			include("include/food/view_food.php");	
		}else if($item==36){
			include("include/food/edit_food.php");	
		}else if($item==37){
			include("include/food/delete_food.php");	
		}else if($item==38){
			include("include/exp/delete_empsalary.php");	
		}else if($item==39){
			include("include/designation/delete_designation.php");	
		}else if($item==40){
			include("include/fooddelivery/create_fooddelivery.php");	
		}else if($item==41){
			include("include/fooddelivery/view_fooddelivery.php");	
		}else if($item==42){
			include("include/fooddelivery/edit_fooddelivery.php");	
		}else if($item==43){
			include("include/fooddelivery/delete_fooddelivery.php");	
		}else if($item==44){
			include("include/otherexp/create_otherexp.php");	
		}else if($item==45){
			include("include/otherexp/view_otherexp.php");	
		}else if($item==46){
			include("include/otherexp/edit_otherexp.php");	
		}else if($item==47){
			include("include/otherexp/delete_otherexp.php");	
		}else if($item==48){
			include("include/balance/balance.php");	
		}else if($item==49){
      include("include/source/create_source.php"); 
    }else if($item==50){
      include("include/source/source_info.php"); 
    }else if($item==51){
      include("include/source/delete_source.php"); 
    }else if($item==52){
      include("include/source/edit_source.php"); 
    }
		 
		 
		 
	  
  }else{?>
	  
	   <h3 class="styl">Welcome to Hotel Management System</h3>	 
  		
<div class="row">
    <div class="col-md-4" >
     <div class="panel panel-primary">
     <div class="panel-heading" style="text-align:center; padding:5px">
    	  <a style="color:#FCFCFC; text-decoration:none" href="home.php?item=4"><span><i class="fa fa-users fa-2x" aria-hidden="true"></i> </span><span style="font-size:20px">
       Total Users =
		<?php 
		$total_user = $db->query("select count(*) from b_user");
		$count= $total_user->fetch_row();
		echo $count[0];
		?></span> </a>
    </div>
    <div class="panel-body" style="min-height:200px; padding:5px">
    <table class="table table-bordered table-hover">
    	<thead>
        	<tr>
            	<th>User Name</th>
                <th>Role</th>
                <th>Contact</th>
            </tr>
        </thead>
        <?php
        	$user_table = $db->query("select u.id,u.username,r.name,u.contact_no from b_user as u,b_role as r where r.id=u.role_id limit 3");
			
			while(list($id,$uname,$rname,$contact)=$user_table->fetch_row()){ ?>
			
            <tbody>
            	<tr>
                	<td><?php echo $uname;?></td>	
                    <td><?php echo $rname;?></td>
                    <td><?php echo $contact;?></td>
                </tr>
            </tbody>	
			
		<?php }?>
    </table>
    </div>
    </div> 
    </div><!-------end user area -------------->
    
    
    <div class="col-md-4">
       <div class="panel panel-primary">
       <div class="panel-heading" style="text-align:center; padding:5px">
       <a href="home.php?item=9" style="text-decoration:none; color:#FFFFFF"><span><i class="fa fa-users fa-2x"></i></span><span style="font-size:20px"> Total Employee =
       <?php
       $employee_table= $db->query("select count(*) from b_employee");
	   $count=$employee_table->fetch_row();
	   echo $count[0];
	   ?>
       </span></a>
       </div>
       
       <div class="panel-body" style="min-height:200px; padding:5px">
       <table class="table table-bordered table-hover">
       		<thead>
            	<tr>
                	<th>Employee Name</th>
                    <th>Contact no</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <?php
            $employee_table = $db->query("select id,name,contact_no,email from b_employee limit 3");
			while(list($id,$name,$contact,$email)=$employee_table->fetch_row()){ ?>
				<tbody>
                	<tr>
                    	<td><?php echo $name;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $email;?></td>
                    </tr>
                </tbody>
				
			<?php }?>
            
       </table>
       </div>
       </div>
    </div><!-----end Employee area---------------->
  
  <div class="col-md-4">
  <div class="panel panel-primary">
  <div class="panel-heading" style="text-align:center; padding:5px">
  	<a style="text-decoration:none; color:#FFFFFF" href="home.php?item=14" ><span><i class="fa fa-users fa-2x"></i></span><span style="font-size:20px"> Total Guest =
    <?php
    	$guest_table=$db->query("select count(*) from b_guest");
		$count= $guest_table->fetch_row();
		echo $count[0];
	?>
    </span></a>
  </div>
  
  <div class="panel-body" style="min-height:200px; ">
  	<div class="row">
    <div class="col-md-6">
    <div class="panel panel-success">
    <div class="panel-heading" style="min-height:150px">
    <div style="text-align:center; margin-top:35px; font-size:16px">
    	<a href="home.php?item=26" style="text-decoration:none"><div>
        <i class="fa fa-users"></i> Active Guest
        </div>
        <div>
        <?php
       $guest_table = $db->query("select count(*) from b_guest where status='Active' ");
	   
	   $count=$guest_table->fetch_row();
	   echo $count[0];
		?>
       
        </div></a>
    </div>
    
    </div>
    </div>
    </div>
    <div class="col-md-6">
  <div class="panel panel-danger">
    <div class="panel-heading" style="min-height:150px">
    <div style="text-align:center; margin-top:35px; font-size:16px">
    	 <a href="home.php?item=27" style="text-decoration:none">  <div>
     <i class="fa fa-users"></i> In Active Guest
    </div>
   	<div>
    <?php
    $guest_table = $db->query("select count(*) from b_guest where status='In Active'");
	$count = $guest_table->fetch_row();
	echo $count[0];
	?>
  
    </div></a>
    </div>
 
    </div>  
    </div>
    </div>
    </div>
  </div>
 
  </div>
  </div><!-----end Guest area---------------->
  
  
  
 
  
       
</div><!-----end row--------------->

<div class="row">
 <div class="col-md-5"><!--------Start Room area-------------->
  	<div class="panel panel-primary">
    <div class="panel-heading" style="text-align:center; padding:5px">
    <a href="home.php?item=16" style="color:#FFFFFF; text-decoration:none;"><span><i class="fa fa-bed fa-2x"></i></span><span style="font-size:20px"> Total room =
    <?php
    $room_table=$db->query("select count(*) from b_room");
	$count = $room_table->fetch_row();
	echo $count[0];
	?>
    </span></a> 
    </div>
    <div class="panel-body" style="min-height:200px">
    	<div class="row">
       <div class="col-md-6">
       <div class="panel panel-success">
       <div class="panel-heading" style="min-height:150px; padding:5px">
       <div style="text-align:center; margin-top:35px; font-size:16px">
       <a href="home.php?item=21" style="text-decoration:none;"><div> <i class="fa fa-bed" aria-hidden="true"></i> Available Room</div>
       <div>
		  <?php
          	$vacant_table = $db->query("select count(*) from b_room where status='Vacant' ");
			$count = $vacant_table->fetch_row();
			echo $count[0];
          ?>
       </div></a>
       </div>
       </div>
       </div>
       
       
       </div>
       <div class="col-md-6">
       <div class="panel panel-danger">
       <div class="panel-heading" style="min-height:150px">
       <div style="text-align:center; margin-top:35px; font-size:16px">
       <a href="home.php?item=20" style="text-decoration:none;"><div><i class="fa fa-bed" aria-hidden="true"></i> Occupied Room</div>
       <div>
    	<?php
        	$occupaid_table = $db->query("select count(*) from b_room where status='Occupied' ");
			$count = $occupaid_table->fetch_row();
			echo $count[0];
		?>
       </div>
       </div></a>
       
       </div>
      
       </div>
      </div>
        </div>
    </div><!----end panel body---------->
  
    </div>
 </div><!------end room area------------>
 
 <div class="col-md-7"><!-------start Reservation area-------------->
   <div class="panel panel-primary">
   <div class="panel-heading" style="text-align:center; padding:5px">
    <span style="font-size:20px;"> Total Reservation =
     <?php
     $reservation_table = $db->query("select count(*) from b_income where fstatus='reservation'");
	 $count = $reservation_table->fetch_row();
	 echo $count[0];
	 ?></span>
   </div>
   <div class="panel-body" style="min-height:200px">
   <table class="table table-bordered table-hover">
   		<thead>
        	<tr>
              <th>Guest Name</th>
              <th>Room Name</th>
              <th>Contact</th>
              <th>Check Out Date</th>
            </tr>
        </thead>
        
        <?php
        $reservation_table=$db->query("select re.id,r.id,r.room_name,g.id,g.name,g.contact_no,re.checkout_date from b_income as re, b_guest as g, b_room as r where r.id=re.room_id and g.id=re.guest_id order by checkout_date limit 3");
		while(list($reid,$rid,$rname,$gid,$gname,$contact,$checkout_date)=$reservation_table->fetch_row()){ ?>
	<tbody>
      <tr>
      	<td>( <?php echo $gid;?> ) <?php echo $gname;?></td>
        <td>( <?php echo $rid;?> ) <?php echo $rname;?></td>
        <td><?php echo $contact;?></td>
        <td><?php echo $checkout_date;?></td>
      </tr>      
    </tbody>
			
	<?php }	?>
   </table>
   </div>
   </div>
  
 </div>
 
 
 </div><!-------end row area------------------>
  
  <div class="row">
  
  	<div class="col-sm-4">
    	<div class="panel panel-primary">
       <div class="panel-heading" style="text-align:center; font-size:20px">
        <a href="home.php?item=48" style="text-decoration:none; color:#FFF"> Balance Report
        </div>
        <div class="panel-body" style="min-height:200px">
        <div class="row">
        <div class="col-sm-6">
        <div class="panel panel-success">
        <div class="panel-heading" style="min-height:100px; font-weight:bold; text-align:center">
        <div>Total Income </div>
        <div>
        	= <?php
            $income_table = $db->query("select sum(p_price) from b_income");
			while(list($income)=$income_table->fetch_row()){
			echo  $GLOBALS['income'] = $income;
			
				
			}
			?>
        </div>
        </div>
       
        </div>
        </div>
        <div class="col-sm-6">
        <div class="panel panel-info">
        <div class="panel-heading" style="min-height:100px; font-weight:bold; text-align:center">
        <div>Total Expense </div>
        <div>
        =  <?php
        $exp_table = $db->query("select sum(paidamount) from b_exp");
		while(list($exp)=$exp_table->fetch_row()){
		echo $GLOBALS['exp'] = $exp;	
		}
		?>
        </div>
        </div>
       
        </div>
        </div>
        </div>
		<div class="row">
		<div class="col-sm-12">
        <div class="panel panel-danger">
        <div class="panel-heading" style="font-weight:bold; text-align:center">
        Balance = 
			<?php
            	$income_table = $db->query("select sum(p_price) from b_income");
				while(list($income)=$income_table->fetch_row()){
					$GLOBALS['x']=$income;	
				}
				
				$exp_table = $db->query("select sum(paidamount) from b_exp");
				while(list($exp)=$exp_table->fetch_row()){
					$GLOBALS['y'] = $exp;	
				}
				
				$balance = $x-$y;
				echo $balance;
            ?>
        </div>
        </div>
        </div>
		</div>
        </div>
        </div>
    </div>
    
  </div>
      

<?php }?>