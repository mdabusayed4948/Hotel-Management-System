
<?php session_start();
	require_once("db_config.php");
	
	if(isset($_POST["btnLogin"])){
		$username = trim($_POST["txtName"]);
		$password = md5(trim($_POST["txtPass"]));
		
		$user_table = $db->query("select id,username,role_id from b_user where username='$username' and password='$password'");	
		list($uid,$uname,$role_id)=$user_table->fetch_row();
		
		if(isset($uname)){
			$_SESSION["s_id"]=$uid;
			$_SESSION["s_username"]=$uname;
			$_SESSION["s_role_id"]=$role_id;
			header("location:home.php");
		}else{
			$msg = "Incorrect email or Password !!";
			echo $msg;	
		}	
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

    <div>
       <form action="index.php" method="post" >
       	<div>Username:<br/>
        	<input type="text" name="txtName"/>
        </div>
        
        <div>Password:<br/>
        	<input type="password" name="txtPass"/>
        </div>
        
        <div><br/>
        	<input type="submit" name="btnLogin" value="Login"/>
        </div>
       </form>
    </div>
</body>
</html>