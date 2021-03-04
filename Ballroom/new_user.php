<?php 
 require_once("includes/_init.php");
?>

<script type="text/javascript">
	function verificare(){
		var alerta ="";
		if(document.form_definire_utilizator.prenume.value==""){
			alerta += "Nu ati introdus prenumele! \n"; 
		}
		if(document.form_definire_utilizator.nume.value==""){
			alerta += "Nu ati introdus numele! \n"; 
		}
		if(document.form_definire_utilizator.username.value==""){
			alerta += "Nu ati introdus username! \n"; 
		}
		if(document.form_definire_utilizator.mail.value==""){
			alerta += "Nu ati introdus adresa de e-mail! \n"; 
		}
		if(document.form_definire_utilizator.parola.value==""){
			alerta += "Nu ati introdus parola! \n"; 
		}
		if (alerta != ""){
			alert(alerta);
			return false;
		}
		return true;
	}
	function intoarceMain(){
		location.href="login.php";
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
					<form id="form_definire_utilizator" name="form_definire_utilizator" action="user_insert.php" method="post" onsubmit="return verificare()">
						<table id="formular_utilizator">
							<tr>
					 			<td align="right">
									<label for="username">Username:</label>
								</td>
								<td align="left">
									<input type="text" id="username" name="username" size="50" maxlength="50" />
								</td>							
							</tr>
							<tr>
								<td align="right">
									<label for="parola">Parola:</label>
								</td>
								<td align="left">
									<input type="password" id="parola" name="parola" size="20" maxlength="20" />
								</td>							
							</tr>
							<tr>
								<td align="right">				
									<label for="prenume">Prenume:</label>
								</td>
								<td align="left">
									<input type="text" id="prenume" name="prenume" size="50" maxlength="50" />						
								</td>
							</tr>
							<tr>
								<td align="right">
									<label for="nume">Nume:</label>
								</td>
								<td align="left">			
									<input type="text" name="nume" id="nume" size="50" maxlength="50" />
								</td>
							</tr>
							<tr>
								<td align="right">
									<label for="mail" >e-mail:</label>
								</td>
								<td align="left">
									<input type="text" id="mail" name="mail" size="50" maxlength="50" />
								</td>							
							</tr>
							<tr>
								<td valign="top" align="center">
									<br />
									<input type="submit" class="button" name="adaugaUtilizator" id="adaugaUtilizator" value="Sign Up" />
								</td>
								<td valign="top" align="center">
									<br />
									<input type="button" name="back" value="Inapoi la login" onclick="intoarceMain()" />
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
