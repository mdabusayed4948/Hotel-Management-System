<div class="nav">
   
     <?php 
	   if($_SESSION["s_role_id"]=="1"){
	     include("nav_admin.php");
	   }else if($_SESSION["s_role_id"]=="2"){
		 include("nav_manager.php");
	   }else if($_SESSION["s_role_id"]=="3"){
		 include("nav_general.php");
	   }
	 
	 ?>
</div><!--end nav-->

