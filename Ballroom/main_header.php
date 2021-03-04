<?php session_start(); 
require_once("includes/_init.php");

$username=$_SESSION['username'];
$nume=$_SESSION['nume'];
$prenume=$_SESSION['prenume'];
$profil=$_SESSION['profil'];


if($_SESSION['username'] == '') {?>
	<meta http-equiv="refresh" content="0; url=index.php" />
<?php 
}?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/main-layout.css" />
	<link rel="stylesheet" type="text/css" href="style/calendar.css" />
	<script type="text/javascript" src="javascripts/calendar.js"></script>
	<title>Ballroom</title>
</head>
<body>
	<table width="1000" height="500" border="1" align="center" class="maintable">
		<tr>
			<td colspan="2">
				<table width="100%">
					<tr><td align="left"><a href="main.php"><img src="images/ballroom.png" border="0"></a></td>
						<td align="right" class="title" valign="bottom">Ballroom Event Planner</td>
					</tr>
				</table>
			</td>
	    </tr>
	    
	    <tr>
			<td width="200" valign="top">
				<table width="90%">
					<tr>
						<td>
						    <ul id="verticalmenu" class="glossymenu">
						    	<?php if ($profil == "admin"){ ?>
						    	<li><a href="#">Administrare tabele</a>
						    		<ul>
						    			<li><a href="adresa_definire.php">Adauga Locatie</a></li>
						    			<li><a href="eveniment_definire.php">Adauga Tip Eveniment</a></li>
						    			<li><a href="meniu_definire.php">Adauga Meniu</a></li>
						    			<li><a href="servicii_suplim_definire.php" style="white-space:nowrap;">Adauga Servicii Suplimentare</a></li>
						    			<li><a href="update.php">Actualizari</a></li>
						    		</ul>
						    	</li>
								<li><a href="#">Search</a>
									<ul>
						    			<li><a href="search_rezervari.php">Rezervari</a></li>
						    			<li><a href="search_clienti.php">Clienti</a></li>
										<li><a href="search_evenimente.php">Evenimente</a></li>
										<li><a href="search_angajati.php">Angajati</a></li>
						    		</ul>
								</li>
						
						    	<?php } else if ($profil == "standard"){ ?>
						    	<li><a href="#">Clienti</a>
						    		<ul>
						    			<li><a href="client_definire.php">Adauga Client</a></li>
						    			<li><a href="client_cautare.php">Gestiune Clienti</a></li>
						    		</ul>
						    	</li>
						    	
						    	<li><a href="#">Evenimente</a>
						    		<ul>
						    			<li><a href="rezervare_definire.php" style="white-space:nowrap;">Adaugare Rezervare</a></li>
						    			<li><a href="rezervare_cautare.php" style="white-space:nowrap;">Gestiune Rezervari</a></li>
						    		</ul>
						    	</li>
						    	
								<li><a href="#">Search</a>
									<ul>
						    			<li><a href="search_rezervari.php">Rezervari</a></li>
						    			<li><a href="search_clienti.php">Clienti</a></li>
										<li><a href="search_evenimente.php">Evenimente</a></li>
									
						    		</ul>
								</li>
								<?php }?>
						    	<li><a href="logout.php">Logout</a></li>
							</ul>
						</td>
			    	</tr>
			    	<tr><td><br></td></tr>
				    <tr>
						<td width="200" valign="bottom" >
							<div id="userbox" class="headofdiv">	
								<p><span><b>Informatii utilizator</b></span></p>
								<span class="customtext">Username: </span>&nbsp;<span><?php echo $username ?></span><br />
								<span class="customtext">Utilizator: </span>&nbsp;<span><?php echo $prenume." ".$nume ?></span><br />
								<span class="customtext">Profil: </span>&nbsp;<span><?php echo $profil ?></span><br />
							</div>
						</td>
				    </tr>
			    </table>
			</td>
			<td width="800" height="500" align="center" valign="top">
				

