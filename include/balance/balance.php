<div><h3 class="styl">Balance Report</h3></div>

<table class="table table-bordered table-hover">
	<thead>
    	<tr>
          <th colspan="2" style="text-align:center; background-color:#999; color:#FFF;">Income Report</th>
        </tr>
    </thead>
  
    
   <?php
   $income_table = $db->query("select sum(p_price) from b_income");
   while(list($price)=$income_table->fetch_row()){ ?>
	<tbody>
    	<tr>
        <th>Total Income =</th>
         <th><?php echo $price.' tk';?> </th>
        
        </tr>
    </tbody>   
	  
	 
   <?php } ?>
	
</table>
<!----------------Expenses area------------------------------>

<table class="table table-bordered table-hover">
  
  <thead>
  	`<tr>
    	<th colspan="2" style="background-color:#999; text-align:center; color:#FFF">Expense Report</th>
    </tr>
  </thead>
  
  <?php 
  $exp_table = $db->query("select sum(paidamount) from b_exp");
  while(list($exp)=$exp_table->fetch_row()){ ?>
	  <tr>
      <th>Total Expense =</th>
      <th><?php echo $exp." tk";?></th>
      </tr>
	 
  <?php } ?>
	
</table>

<!-----------balance area------------------------------->

<table class="table table-bordered table-hover">
	<thead>
      <tr>
      <th colspan="2" style="background-color:#999; text-align:center; color:#FFF">  Balance Report</th>
    
    </tr>
    </thead>
    
    <tbody>
    	<tr>
          <th>Total Balance =</th>
          <th>
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
			echo $balance ." tk";
		  ?>
          </th>
        </tr>
    </tbody>
	
</table>