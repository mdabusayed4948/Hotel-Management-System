<?php session_start();
 require_once("db_config.php");
 
 if(!isset($_SESSION["s_username"])){
   header("location:index.php");	 
 }
 
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<?php 
//include("css_cdn.php")
 include("css_lib.php")
?>

<style>
.body{min-height:780px; margin-top:70px; min-width:400px }
</style>
</head>
<body>
<div class="col-md-12">
  
  <div class="row header">     
  <?php include("header.php");?>  
  </div><!--end header-->
  
  <div class="row body" style="margin-left:10px; margin-right:10px; ">     
    <?php 
	 if($_SESSION["s_role_id"]=="1"){//1 for admin
	   include("placeholder_admin.php");
	 }else if($_SESSION["s_role_id"]=="2"){ //2 for manager
	   include("placeholder_manager.php");
	 }else if($_SESSION["s_role_id"]=="3"){ // 3 for general
	   include("placeholder_general.php");
	 }
		
	?>
  </div><!--end body-->
  
  <div class="row footer">
    <?php include("footer.php");?>
  </div><!--end footer-->
  
</div><!--end container-->

<?php 
//include("js_cdn.php")
  include("js_lib.php")
?>
</body>
</html>