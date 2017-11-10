<style>
	.dropdown:hover .dropdown-menu{
		
		display:block;
		
		}
</style>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#82B7D7; ">
   
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
    
    
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >         
        <ul class="nav navbar-nav">
          <li><a href="home.php" style="color:#000" >Dashboard</a></li>
         
         <li class="dropdown">
           <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" >User Manager <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="home.php?item=1"  >Create User</a></li>
             <li><a href="home.php?item=4" >View User</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="home.php?item=3" >Delete User</a></li>
          </ul>
          </li>
          
 	<li class="dropdown">
      <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Employee<span class="caret"></span></a>
      <ul class="dropdown-menu">
    
      	<li><a href="home.php?item=6" >Create Employee</a></li>
        <li><a href="home.php?item=9"> Employee List</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="home.php?item=8">Delete Employee</a></li>
      
      
        
         <div style="text-align:center">
        <li style="background-color:#CCC; font-weight:bold; margin:4px">Designation </li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=31">Create Designation</a></li>
          <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=32">Designation List</a></li>
             <li role="separator" class="divider"></li>
        <li><a href="home.php?item=39" style="text-decoration:none; color:#333333; padding:2px">Delete Designation</a></li>
        </div>
      </ul>
      
    </li>
    
    <li class="dropdown">
    	<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Guest<span class="caret"></span></a>
        
        <ul class="dropdown-menu">
        	<li><a href="home.php?item=11">Create Guest</a></li>
        	<li><a href="home.php?item=14">All Guest List</a></li>
            <li><a href="home.php?item=26">Active Guest List</a></li>
            <li><a href="home.php?item=27">In Active Guest List</a></li>
            <li role="separator" class="divider"></li>
        	<li><a href="home.php?item=13">Delete Guests</a></li>
        </ul>
    
    </li>
    
    <li class="dropdown">
    	<a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Room<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="home.php?item=15">Create Room</a></li>
          <li><a href="home.php?item=16">All Room List</a></li>
          <li><a href="home.php?item=21">Vacant Room List</a></li>
          <li><a href="home.php?item=20">Occupied Room List</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="home.php?item=19">Delete Rooms</a></li>
        </ul>
    </li>
    
    <li class="dropdown">
      <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Reservation<span class="caret"></span></a>
      
      <ul class="dropdown-menu">
      	<li><a href="home.php?item=22">Create Reservation</a></li>
        <li><a href="home.php?item=23">Reservation List</a></li>
        <li><a href="home.php?item=25">Delete Reservation</a></li>
      </ul>
    </li>
    
    <li class="dropdown">
    <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Food<span class="caret" ></span></a>
    <ul class="dropdown-menu">
    	<li><a href="home.php?item=34">Create Food Item</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="home.php?item=35">Food List</a></li>
            <li role="separator" class="divider"></li>
        <li><a href="home.php?item=37">Delete Food</a></li>
        
        <div style="text-align:center">
        <li style="background-color:#CCC; font-weight:bold; margin:4px">Food Delivery</li>
        <li><a style="text-decoration:none; color:#333333; padding:2px;" href="home.php?item=40">Create Food Delivery</a></li>
        <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px;" href="home.php?item=41">Food Delivery List</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="home.php?item=43" style="text-decoration:none; color:#333333; padding:2px">Delete Food Delivery</a></li>
        </div>
    </ul>
    </li>
    
    <li class="dropdown">
    <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Account Dept<span class="caret"></span></a>
    <ul class="dropdown-menu">
    	<div style="text-align:center">
        <li style="background-color:#CCC; font-weight:bold; margin:4px">Employee Salary</li>
      <li><a  style="text-decoration:none; color:#333333; margin:2px; margin-bottom:5px" href="home.php?item=28">Create Employee Salary</a></li>
       <li class="divider" role="separator"></li>
         <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=29">Employee Salary List</a></li>
             <li role="separator" class="divider"></li>
         <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=38">Delete Employee Salary</a></li>
         
        </div>
		
		<div style="text-align:center">
        <li style="background-color:#CCC; font-weight:bold; margin:4px">Source</li>
      <li><a  style="text-decoration:none; color:#333333; margin:2px; margin-bottom:5px" href="home.php?item=49">Create Source</a></li>
       <li class="divider" role="separator"></li>
         <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=50">Source List info</a></li>
             <li role="separator" class="divider"></li>
         <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=51">Delete Source Info</a></li>
         
        </div>
        
        <div style="text-align:center">
        <li style="background-color:#CCCCCC; font-weight:bold; margin:4px">Others Exp</li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=44">Create Others Exp</a></li>
        <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=45">Others Expense list</a></li>
        <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=47">Delete Expense</a></li>
        <li role="separator" class="divider"></li>
        <li style="background-color:#CCCCCC">Income Expense Report</li>
        <li role="separator" class="divider"></li>
        <li><a style="text-decoration:none; color:#333333; padding:2px" href="home.php?item=48">Balance Report</a></li>
        </div>
      
    </ul>
    </li>
       </ul>
      
        
        <ul class="nav navbar-nav navbar-right" style="margin-right:1px">
          <li><a style="color:#000" href="#">  <i class='glyphicon glyphicon-user'></i> <?php echo $_SESSION["s_username"]?></a></li> 
          <li><a style="color:#000" class="navbar-right" href="logout.php"> <i class='glyphicon glyphicon-log-out'></i> Logout</a></li>       
        </ul>
       
      </div>        
        
    </div>
</nav>