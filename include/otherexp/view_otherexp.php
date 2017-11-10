<div class="topstyl"><h3 class="styl">Others Expense List</h3></div>

<table class="table table-bordered table-hover">

 <thead>
 	<tr>
    	<th colspan="5" style="padding:2px"><a style="float:right" class="btn btn-primary" href="home.php?item=44"> <i class="glyphicon glyphicon-plus-sign"></i>Add New</a></th>
    </tr>
 	<tr>
      <th>Source Name</th>
      <th>Date</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
 </thead>
 
 <?php
 $otherexp_table = $db->query("select ex.id,s.id,s.name,ex.paidamount,ex.billdate from b_exp as ex, bf_source as s where s.id=ex.source_id and status='otherexp' ");
 while(list($exid,$sid,$source,$amount,$date)=$otherexp_table->fetch_row()){ ?>
	 
	<tbody>
    	<tr>
          <td><?php echo $source;?></td>
          <td><?php echo $date;?></td>
           <td><?php echo $amount;?></td>
          <td>
          <form method="post" action="home.php?item=46">
          	<input type="hidden" name="txtOexp" value="<?php echo $exid;?>"/>
            <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
          </form>
          </td>
        </tr>
    </tbody>
    
<?php } ?>

	<?php
    $otherexp_table = $db->query("select ex.id,s.id,s.name,sum(ex.paidamount),ex.billdate from b_exp as ex, bf_source as s where s.id=ex.source_id and status='otherexp' ");
	
	while(list($exid,$sid,$source,$amount,$date)=$otherexp_table->fetch_row()){ ?>
    
	<tfoot>
    	<tr>
          <th colspan="2">Total Exp =</th>
          <th><?php echo $amount;?></th>
          <th colspan="5"></th>
        </tr>
    </tfoot>	
	
	<?php }?>
 
</table>