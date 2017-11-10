<?php    
  if(isset($_GET["item"])){
	  
		 $item=$_GET["item"]; 
		  
		 if($item==1){
			 include("ginclude/user/add_user.php");
		 }else if($item==2){
			 include("ginclude/user/edit_user.php");
		 }else if($item==3){
			 include("ginclude/user/delete_user.php");
		 }else if($item==4){
			 include("ginclude/user/view_user.php");
		 }
		 
	  
  }else{
	    echo "<h2>Welcome to Hotel Management System</h2>";	 
  }

?>