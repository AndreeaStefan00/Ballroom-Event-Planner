<?php include("main_header.php"); ?>

	<h1>Afisati datele de contact ale clientilor care au rezervari la data de:</h1>
	<form id="afisare" name="afisare" action="search_rezervari.php" method="post">
	<table>
		<tr>
			<td align="left">
				<input type="text" id="Data" name="Data" size="8" maxlength="10" />
				<script type="text/javascript">
	 				calendar.set("Data");
				</script>
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
		</tr>
	</table>
	<br></br>
	<br></br>
	<?php

if(isset($_POST['Data']))
{
	$data=$_POST['Data'];
	$a=0;

	$query="SELECT DISTINCT D.Nume, D.Prenume, D.Telefon, D.Mail FROM DateClient D JOIN Rezervari R ON D.ClientID=R.ClientID 
			 WHERE R.Data='$data'";
	$result = sqlsrv_query($conn, $query);
?>
<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume</th>
			<th>Prenume</th>
			<th>Telefon</th>
			<th>Mail</th>
		</tr>
		<?php while($row = sqlsrv_fetch_object($result)){ ?>
		<tr>
			<td><?php echo $row->Nume; ?></td>
			<td><?php echo $row->Prenume; ?></td>
			<td><?php echo $row->Telefon; ?></td>
			<td><?php echo $row->Mail; ?></td>
		</tr>	
		<?php $a++; }	?>
	</table>
<?php

	if($a === 0)
			echo "Nu exista rezervari pentru aceasta data";
}


?>
	</form>


	<h1>Afisati numarul de rezervari pentru fiecare adresa pentru anul:</h1>
	<form id="afisare_nr" name="afisare_nr" action="search_rezervari.php" method="post">
	<table>
		<tr>
			<td align="left">
				<input type="text" id="An" name="An" size="5" maxlength="4" />
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
		</tr>
	</table>
	<br></br>
	<br></br>
	<?php

if(isset($_POST['An']))
{
	$an=$_POST['An'];
	$a=0;

	$query2="SELECT A.AddressName,A.Strada, A.Nr, A.Localitate, COUNT(R.RezervareID) AS NrRezervari
			FROM Adresa A join Rezervari R on A.AdresaID=R.AdresaID
			WHERE YEAR(R.Data)='$an'
			GROUP BY A.AddressName,A.Strada, A.Nr, A.Localitate";
	$result2 = sqlsrv_query($conn, $query2);
?>
<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume locatie</th>
			<th>Strada</th>
			<th>Nr</th>
			<th>Localitate</th>
			<th>Nr rezervari</th>
		</tr>
		<?php while($row = sqlsrv_fetch_object($result2)){ ?>
		<tr>
			<td><?php echo $row->AddressName; ?></td>
			<td><?php echo $row->Strada; ?></td>
			<td><?php echo $row->Nr; ?></td>
			<td><?php echo $row->Localitate; ?></td>
			<td><?php echo $row->NrRezervari; ?></td>
		</tr>	
		<?php $a++; }	?>
	</table>
	<br></br>
<?php

	if($a === 0)
			echo "Nu exista rezervari pentru nicio locatie in acest an.";
}


?>
	
	</form>	
<?php include("main_footer.php"); ?>