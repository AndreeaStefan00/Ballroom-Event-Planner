<?php   
require_once("includes/_init.php");

$username = $_POST['username'];
$parola = $_POST['parola'];
$prenume = $_POST['prenume'];
$nume = $_POST['nume'];
$mail = $_POST['mail'];

$errors = array();
?>
<script type="text/javascript">
	function intoarceMain(){
		location.href="login.php";
		return true;
	}
	function intoarceRegister(){
		location.href="new_user.php";
		return true;
	}
</script>

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

					<h1>Inregistrare utilizator</h1>
					<table>
						<tr>
							<td>
								<?php
								// verificare daca userul exista deja in baza de date
								$user_check_query = "SELECT * FROM utilizator WHERE alias = '{$username}' or mail ='{$mail}' ";
								$result = sqlsrv_query($conn, $user_check_query);
								
								while ($user = sqlsrv_fetch_object($result)) { // daca userul exista
								    if ($user->alias === $username) {
								    	echo "Numele de utilizator exista deja";
								    }elseif ($user->mail === $mail) {
								    	echo "mailul exista deja";
								    }
								    ?>
								<br />
								<input type="button" name="back" value="Inapoi la login" onclick="intoarceMain()" />
								<input type="button" name="back" value="Inapoi la formularul de inregistrare" onclick="intoarceRegister()" />
								    <?php 
								    return;
								}
					
								$query = "INSERT INTO utilizator (alias, password, mail, nume, prenume, profil) VALUES ('$username','$parola','$mail','$nume','$prenume','standard')";
								$result = sqlsrv_query($conn,$query) or die(print_r( sqlsrv_errors(), true));
								echo "Ati fost inregistrat cu succes";
								?>
								<br /><br />
								<input type="button" name="back" value="Inapoi la login" onclick="intoarceMain()" />
								<input type="button" name="back" value="Inapoi la formularul de inregistrare" onclick="intoarceRegister()" />
							</td>
						</tr>
					</table>
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
				
