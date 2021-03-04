<?php include("main_header.php"); ?>
<script type="text/javascript" src="javascripts/calendar.js"></script>
	
	<h1>Afisati clientii care au mai mult de o rezervare: </h1> 
	<form id="afisare_cl" name="afisare_cl" action="search_clienti.php" method="post">
	<table>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Afisati" />
			</td>
		</tr>
	</table>
	<br></br>
	<br></br>

	
		<?php 
		$a=0;
		if (!empty($_POST)){
		?>
		<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume</th>
			<th>Prenume</th>
			<th>Telefon</th>
			<th>Mail</th>
			<th>Numar rezervari </th>
		</tr>
		<?php
		$query="SELECT distinct D.Nume, D.Prenume, D.Telefon, D.Mail, COUNT(R.ClientID) as NrRez
			FROM DateClient D join Rezervari R on D.ClientID=R.ClientID
			GROUP BY D.Nume, D.Prenume,D.Telefon, D.Mail
			HAVING COUNT(R.ClientID) >1";
		$result = sqlsrv_query($conn, $query);
		while($row = sqlsrv_fetch_object($result)){ ?>
		<tr>
			<td><?php echo $row->Nume; ?></td>
			<td><?php echo $row->Prenume; ?></td>
			<td><?php echo $row->Telefon; ?></td>
			<td><?php echo $row->Mail; ?></td>
			<td><?php echo $row->NrRez; ?></td>
		</tr>	
		<?php $a++; }	?>
	</table>
	
<?php

	if($a === 0)
			echo "Nu exista clienti cu mai multe rezervari";

		}

?>
	</form> 

	<h1>Afisati suma pe care trebuie sa o plateasca un client pentru numarul meniurilor comandate:</h1>
	<form id="afisare_suma" name="afisare_suma" action="search_clienti.php" method="post">
	<table>
		<tr>
			<td align="right">
				<label for="Mail">Mailul clientului:</label>
			</td>
			<td align="left" >
				<input type="text" id="mailClient" name="mailClient" size="20" maxlength="50" />
			</td>							
		</tr>
		
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
		</tr>
		
	</table>
	<br></br>
	<br></br>
	
	<?php

	if(isset($_POST['mailClient']))
	{?>
		<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume</th>
			<th>Prenume</th>
			<th>Data</th>
			<th>Pret total meniuri</th>
		</tr>
	<?php	
	$m=$_POST['mailClient'];
	$a=0;
	
	$query1="SELECT D.Nume, D.Prenume,R.Data, COUNT(M.MeniuID)*R.NrInvitati*M.Pret AS TotalPlata
			FROM Meniu M join  Rezervari R on M.MeniuID=R.MeniuID join DateClient D on R.ClientID=D.ClientID
			where D.Mail='$m'
			GROUP BY D.Nume, D.Prenume,R.Data, R.NrInvitati, M.Pret";
	$result1 = sqlsrv_query($conn, $query1);
	?>
	
		<?php
		while($row1 = sqlsrv_fetch_object($result1)) {?>
		<tr>
			<td><?php echo $row1->Nume; ?></td>
			<td><?php echo $row1->Prenume; ?></td>
			<td><?php echo $row1->Data->format('d/m/Y'); ?></td>
			<td><?php echo $row1->TotalPlata; ?> RON</td>
		</tr>
	<?php $a++; } 	?>
	</table>
	
<?php

	if($a === 0)
			echo "Nu exista rezervari pentru acest client";
	}
?>
</form>	

<h1>Afisati serviciile suplimentare alese de un client pentru rezervarea facuta la o anumita data</h1>
	<form id="afisare_serv" name="afisare_serv" action="search_clienti.php" method="post">
	<table>
		<tr>
			<td align="right">
				<label for="Data">Data:</label>
			</td>
			<td align="left">
				<input type="text" id="Data" name="Data" size="8" maxlength="10" />
				<script type="text/javascript">
	 				calendar.set("Data");
				</script>
			</td>							
		</tr>
		<tr>
			<td align="right">
				<label for="Mail">Mailul clientului:</label>
			</td>
			<td align="left" >
				<input type="text" id="mail" name="mail" size="20" maxlength="50" />
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
		</tr>
	</table>
	<br></br>
	<br></br>
	
	<?php

	if(isset($_POST['Data']) && isset($_POST['mail']))
	{?>
		<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume serviciu</th>
			<th>Pret</th>
		</tr>
	<?php	
	$date=$_POST['Data'];
	$mail=$_POST['mail'];
	$a=0;
	
	$query2="SELECT DISTINCT S.TipServiciu, S.Pret from ServiciiSuplimentare S JOIN RezervariServicii RS ON S.ServID=RS.ServID 
				WHERE RS.RezervareID IN(SELECT R.RezervareID from Rezervari R WHERE R.Data='$date' AND
				R.ClientID = (SELECT ClientID FROM DateClient WHERE Mail='$mail'))";
	$result2 = sqlsrv_query($conn, $query2);
	?>
	
		<?php
		while($row2 = sqlsrv_fetch_object($result2)) {?>
		<tr>
			<td><?php echo $row2->TipServiciu; ?></td>
			<td><?php echo $row2->Pret; ?> RON</td>
		</tr>
	<?php $a++; } 	?>
	</table>

	
<?php

	if($a === 0)
			echo "Nu exista servicii suplimentare pentru aceasta rezervare.";
	}
?>
	<br></br>
	<br></br>
</form>	


<?php include("main_footer.php"); ?>		