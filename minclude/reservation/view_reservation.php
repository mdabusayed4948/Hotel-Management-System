<div class="topstyle">
 <h3 class="styl">Reservation List</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
    
    	<tr>
        	<th colspan="10" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=22" style="float:right" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
        </tr>
    	<tr>
      
          <th>Guest Name</th>
          <th>Room No</th>
          <th>Contact No</th>
          <th>E-mail</th>
          <th>Checkin Date</th>
          <th>Checkout Date</th>
          <th>Paid Amount</th>
           <th>Due Amount</th>
           <th>Status</th>
           <th>Action</th>
        
        </tr>
    </thead>
    <?php
      $reserv_table=$db->query("select re.id,g.name,g.id,g.contact_no,g.email,r.room_no,r.id,re.p_price,re.d_price,re.checkin_date,re.checkout_date,re.status from b_income as re,b_guest as g,b_room as r where g.id=re.room_id and  r.id=re.guest_id order by re.checkout_date");
	  while(list($id,$guest_name,$gid,$g_contact,$g_mail,$r_no,$rid,$r_pprice,$r_dprice,$checkin,$checkout,$status)=$reserv_table->fetch_row()){ ?>
		 <tbody>
         	<tr>
            
              <td>Id=<?php echo $gid;?> | <?php echo $guest_name;?></td>
              <td>Id=<?php echo $rid;?> | <?php echo $r_no;?></td>
              <td><?php echo $g_contact;?></td>
              <td><?php echo $g_mail;?></td>
              <td><?php echo $checkin;?></td>
              <td><?php echo $checkout;?></td>
              <td><?php echo $r_pprice;?></td>
              <td><?php echo $r_dprice;?></td>
              <td><?php echo $status;?></td>
           	  <td>
              	<div>
                  <form action="home.php?item=25" method="post">
                    <input type="hidden" value="<?php echo $id;?>" name="txtRid"/>
                    <button type="submit" name="btnEdit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                  </form>
                </div>
              </td>
              
            </tr>
         </tbody> 
         
      
				
	  <?php }?>
      
         <?php
         $reserv_table = $db->query("select re.id,g.name,g.id,g.contact_no,g.email,r.room_no,r.id,sum(re.p_price),sum(re.d_price),re.checkin_date,re.checkout_date,re.status from b_income as re,b_guest as g,b_room as r where g.id=re.room_id and r.id=re.guest_id order by re.checkout_date");
		 
 while(list($id,$guest_name,$gid,$g_contact,$g_mail,$r_no,$rid,$r_pprice,$r_dprice,$checkin,$checkout,$status)=$reserv_table->fetch_row()){?>
			 
	<tfoot>
    	<tr>
          <th colspan="10" style="background-color:#CCC"></th>
        </tr>
      <tr>
        <th colspan="6">Total Amount =</th>
        <th><?php echo $r_pprice." tk";?></th>
        <th><?php echo $r_dprice." tk";?></th>
        <th colspan="10"></th>
      </tr>
    </tfoot>		
		<?php }?>
       
  
</table>