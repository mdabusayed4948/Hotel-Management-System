<style>
	.dropdown:hover .dropdown-menu{
		
		display:block;
		
		}
</style>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#93CAD5">
    <div class="container-fluid">   
    
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><img src="img/logo.png" width="30" /></a>
    </div>
    
    
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">         
        <ul class="nav navbar-nav">
          <li><a href="home.php" style="color:#000">Dashboard</a></li>
         
       <li class="dropdown">
       		<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Employee<span class="caret"></span></a>
            <ul class="dropdown-menu">
               <div style="text-align:center">
            <li><a href="home.php?item=1" style="text-decoration:none; color:#333333; padding:2px">Create Employee</a></li>
               <li role="separator" class="divider"></li>
            <li><a href="home.php?item=2" style="text-decoration:none; color:#333333; padding:2px">Employee List</a></li>
               <li role="separator" class="divider"></li>
            <li><a href="home.php?item=4" style="text-decoration:none; color:#333333; padding:2px">Delete Employee</a></li>
            </div>
              <div style="text-align:center">
        <li style="background-color:#CCC; font-weight:bold; margin:4px">Designation </li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=6">Create Designation</a></li>
          <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=7">Designation List</a></li>
             <li role="separator" class="divider"></li>
        <li><a href="home.php?item=9" style="text-decoration:none; color:#333333; padding:2px">Delete Designation</a></li>
        </div>
            </ul>
       </li>
       
       <li class="dropdown">
       <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Guest<span class="caret"></span> </a>
       <ul class="dropdown-menu">
       <li><a href="home.php?item=10">Create Guest</a></li>
        <li><a href="home.php?item=11">All Guest List</a></li>
          <li><a href="home.php?item=14">Active Guest List</a></li>
          <li><a href="home.php?item=15">In Active Guest List</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="home.php?item=13"> Delete Guests</a></li>
        </ul>
      
       </li>
       
       <li class="dropdown">
       		<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Room<span class="caret"></span></a>
            <ul class="dropdown-menu">
            	<li><a href="home.php?item=16">Create Room</a></li>
                <li><a href="home.php?item=17">All Room List</a></li>
                <li><a href="home.php?item=20">Occupied Room List</a></li>
                <li><a href="home.php?item=21">Vacant Room List</a></li>
                <li><a href="home.php?item=22">Delete Room</a></li>
            </ul>
       	
       </li>
       
       <li class="dropdown">
       	<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Reservation<span class="caret"></span></a>
        <ul class="dropdown-menu">
        	<li><a href="home.php?item=23">Create Reservation</a></li>
            <li><a href="home.php?item=24">Reservation List</a></li>
            <li><a href="home.php?item=26">Delete Reservation</a></li>
        </ul>
       </li>
       
       <li class="dropdown">
       <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Food<span class="caret"></span></a>
       <ul class="dropdown-menu">
      
       
        <div style="text-align:center">
       	<li><a href="home.php?item=27"  style="text-decoration:none; color:#333333; padding:2px">Create Food</a></li>
          <li role="separator" class="divider"></li>
        <li><a href="home.php?item=28"  style="text-decoration:none; color:#333333; padding:2px">Food List</a></li>
          <li role="separator" class="divider"></li>
        <li><a href="home.php?item=30"  style="text-decoration:none; color:#333333; padding:2px">Delete Food</a></li>
       
         <li style="background-color:#CCC; font-weight:bold; margin:4px">Food Delivery </li>
         <li><a href="home.php?item=31" style="text-decoration:none; color:#333333; padding:2px">Create Food Delivery</a></li>
           <li role="separator" class="divider"></li>
         <li><a href="home.php?item=32" style="text-decoration:none; color:#333333; padding:2px">Food Delivery List</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="home.php?item=34" style="text-decoration:none; color:#333333; padding:2px">Delete Food Delivery</a></li>
        </div>
       
       </ul>
       </li>
       
       <li class="dropdown">
       	<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Account Depart<span class="caret"></span></a>
        <ul class="dropdown-menu">
        	<div style="text-align:center">
             <li style="background-color:#CCC; font-weight:bold; margin:4px">Employee Salary </li>
            	<li><a href="home.php?item=35" style="text-decoration:none; color:#333333; padding:2px">Create Employee Salary</a></li>
                  <li role="separator" class="divider"></li>
                <li><a href="home.php?item=36" style="text-decoration:none; color:#333333; padding:2px"> Employee Salary List</a></li>
                  <li role="separator" class="divider"></li>
                <li><a href="home.php?item=37" style="text-decoration:none; color:#333333; padding:2px">Delete Employee Salary</a></li>
            </div>
            
            <div style="text-align:center">
            <li style="background-color:#CCCCCC; font-weight:bold; margin:4px">Others Exp</li>
            <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=39">Create Others Exp</a></li>
        <li role="separator" class="divider"></li>
          <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=40"> Others Exp List</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="home.php?item=42" style="text-decoration:none; color:#333333; padding:2px">Delete Other Exp</a></li>
            
            </div>
        </ul>
       </li>
          
        </ul>
        
        <ul class="nav navbar-nav navbar-right" style="margin-right:1px">
          <li><a style="color:#000" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["s_username"]?></a></li> 
          <li><a style="color:#000" class="navbar-right" href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>       
        </ul>
       
      </div>        
        
    </div>
</nav>