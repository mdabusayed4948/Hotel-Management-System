<div class="topstyle"><h3 class="styl">Room Details</h3></div>

<table class="table table-bordered table-hover">
	<thead>
   <tr>
        	<th colspan="2" style="background-color:#F8F8F8; padding:2px"><a href="home.php?item=16" style="float:right; text-decoration:none" class="btn btn-primary"><i class='glyphicon glyphicon-log-out'></i> Return</a></th>
        </tr>
    </thead>

<?php
if(isset($_POST["txtroomId"])){
	
	$room_id = $_POST["txtroomId"];
	
	$room_table = $db->query("select id,room_name,room_no,room_type,description,price,status,image from b_room where id='$room_id'");
	
	list($id,$name,$rno,$rtype,$desc,$price,$status,$image)=$room_table->fetch_row();
	
	}
?>

	<tbody>
    <tr>
        	<td colspan="2" style="text-align:center"><img src="<?php echo isset($image)?$image:" "?>" width="700" height="300"/></td>
        </tr>
      <tr>
        <td>Room Name :</td>
        <td>
			<?php echo isset($name)?$name:" "; ?>
       
        </td>
      </tr>
      
      <tr>
         <td>Room No:</td>
         <td><?php echo isset($rno)?$rno:""?></td>
      </tr>
      
        <tr>
        <td>Room Type :</td>
        <td>
			<?php echo isset($rtype)?$rtype:" "; ?>
		  
        </td>
      </tr>
      
      <tr>
      	<td>Price for per Night (tk):</td>
        <td>
          <?php echo isset($price)?$price:"";?> 
        </td>
      </tr>
      
      <tr>
      <td>Room Description :</td>
      	<td width="800">
             <?php
                 $desc = htmlspecialchars_decode($desc);
                   echo $desc;
			?>
                              
                                
         </td>
      </tr>
      
      <tr>
        <td>Status :</td>
        <td><?php echo isset($status)?$status:"";?></td>
      </tr>
       
    </tbody>
</table>