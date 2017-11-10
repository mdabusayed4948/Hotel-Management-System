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
      <a class="navbar-brand" href="#"><img src="img/logo.png" width="30" /></a>
    </div>
    
    
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">         
        <ul class="nav navbar-nav" >
          <li><a href="#" style="color:#000">Dashboard</a></li>
         
      <li class="dropdown" >
      <a style="color:#000" href="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-haspopup="false">Empployee<span class="caret"></span></a>
      
      <ul class="dropdown-menu">
      <div style="text-align:center">
      	<li><a style="color:#000; text-decoration:none">Create Employee</a></li>
         <li role="separator" class="divider"></li>
         <li><a href="home.php?item=9" style="color:#000; text-decoration:none"> Employee List</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="home.php?item=8" style="color:#000; text-decoration:none">Delete Employee</a></li>
      
      </div>
      	
      
      </ul>
      
      </li>
          
        
          
        </ul>
        
        <ul class="nav navbar-nav navbar-right" style="margin-right:1px">
          <li><a href="#" style="color:#000"><?php echo $_SESSION["s_username"]?></a></li> 
          <li><a style="color:#000" class="navbar-right" href="logout.php">Logout</a></li>       
        </ul>
       
      </div>        
        
    </div>
</nav>