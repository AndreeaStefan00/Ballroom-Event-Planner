<?php session_start();

require_once("includes/_init.php");

if (isset($_POST['submit'])) { // Form has been submitted.

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
  
	if ($username == '' || $password == '') {
		$message = "Completati Userul si Parola";
	} else {  
		$sql  = "SELECT nume, prenume, profil FROM utilizator WHERE alias = '{$username}' and password ='{$password}' ";
		$stmt = sqlsrv_query($conn,$sql);
		if( $stmt === false ) {
     		die( print_r( sqlsrv_errors(), true));
		}
		$has_values="";
		while( $obj = sqlsrv_fetch_object( $stmt)) {
      		echo $obj->nume.", ".$obj->prenume."<br />";

	  		$_SESSION['username']=$username;
		  	$_SESSION['nume']=$obj->nume;
		  	$_SESSION['prenume']=$obj->prenume;
		  	$_SESSION['profil']=$obj->profil;
		  	?>
		  	<meta http-equiv="refresh" content="0; url=main.php" />
		  	<?php 
			$has_values="da";
		}
		if($has_values!='da')
		$message = "Nu sunteti autorizat sa accesati aplicatia. Va rugam sa va creati cont.";  	
  	}
	//$username = "";
  	$password = "";
} else { 
  // Form has not been submitted.
  $username = "";
  $password = "";
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/main-layout.css" />
		<title>Event Planner</title>
	</head>
	<body>
		<table width="90%" height="80%" border="1" align="center" class="maintable">
			<tr>
				<td align="left" width="40%"><img src="images/ballroom.png" align="middle"></td>
				<td class="title" valign="bottom">Ballroom Event Planner</td>
			</tr>
			<tr>
				<td colspan="2" width="100%" height="100%" align="center" valign="top">
					<br /><br />
					<h2 class="unit">Login </h2>
					<p><?php echo $message ?></p>
					<br />
					<form action="login.php" method="post">
						<table>
					    	<tr>
							    <td>Username:</td>
								<td>
								  	<input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
							    </td>
						    </tr>
						    <tr>
							    <td>Password:</td>
							    <td>
							    	<input type="password" name="password" maxlength="30" value="" />
							    </td>
						    </tr>
						    <tr>
							    <td colspan="2" align="center">
								    <br />
								    <input type="submit" name="submit" value="Login" />
							    </td>
						    </tr>
						    <tr>
						    	<td colspan="2" align="center">
						    		<br /><br />
						    		<a href="new_user.php">Inregistrare Utilizator Nou</a>
						    	</td>
						    </tr>
					  	</table>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<div id="footer">Copyright &copy; Andreea Stefan - 2020 </div>
				</td>
			</tr>
		</table>
	</body>
</html>