<?php include("main_header.php"); ?>

<!-- Afisare ce angajati au facut rezervarea pe un nume la o anumita data -->

<h1>Evidenta rezervari</h1>
<style>
p {
  display: block;
  margin-top: 1em;
  margin-bottom: 1em;
  margin-left: 0;
  margin-right: 0;
  color: #B60000;
  font-size: 12px;
}
</style>
<p>Afisati ce angajat a facut rezervarea cu datele: </p>
	<form id="afisare_eveniment" name="afisare_eveniment" action="search_angajati.php" method="post">
	<table>
		<tr>
			<td align="right">
				<label for="date">Data: </label> 
			</td>
			<td align="left">
				<input type="text" id="date" name="date" size="8" maxlength="10" />
				<script type="text/javascript">
	 				calendar.set("date");
				</script>	
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="client">Mailul clientului: </label> 
			</td>
			<td align="left">
				<input type="text" id="mailC" name="mailC" size="10" maxlength="20" />	
			</td>
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
		</tr>
	</table>
	<?php
	if(isset($_POST['date']) && isset($_POST['mailC']))
	{
	$date=$_POST['date'];
	$mailC=$_POST['mailC'];
	$a=0;
	
	$query1="Select distinct U.nume, U.prenume, U.mail, A.AddressName from utilizator U join Rezervari R on U.id=R.UserID join DateClient D on R.ClientID=D.ClientID
				join Adresa A on R.AdresaID=A.AdresaID
				where R.Data='$date' and D.Mail='$mailC'";
	$result1 = sqlsrv_query($conn, $query1);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume</th>
			<th>Prenume</th>
			<th>Mail</th>
			<th>Locatia rezervarii</th>
		</tr>
		<?php
		while($row1 = sqlsrv_fetch_object($result1)) {?>
		<tr>
			<td><?php echo $row1->nume; ?></td>
			<td><?php echo $row1->prenume; ?></td>
			<td><?php echo $row1->mail; ?></td>
			<td><?php echo $row1->AddressName; ?></td>
		</tr>
		<?php $a++; }	?>
	</table>
<?php

	if($a === 0)
			echo "Nu exista rezervari la aceasta data, pentru persoana cautata.";
}


?>
	</form>	
	
<!-- Afisare ce angajati au facut cele mai multe rezervari -->

<h1>Evidenta angajati</h1>
<p>Afisati ce angajati au facut cele mai multe rezervari pentru anul: </p>
	<form id="afisare_eveniment" name="afisare_eveniment" action="search_angajati.php" method="post">
	<table>
		<tr>
			<td align="right">
				<label for="an">An: </label> 
			</td>
			<td align="left">
				<input type="text" id="an" name="an" size="5" maxlength="4" />	
			</td>
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>

		</tr>
	</table>
	<?php
	if(isset($_POST['an']))
	{
	$year=$_POST['an'];
	$a=0;
	
	$query1="select top 3 U.nume, U.prenume,U.mail, count(RezervareID) as NrRezervari from utilizator U join Rezervari R on U.id=R.UserID
				where U.id=R.UserID and year(R.Data)='$year'
				group by U.nume, U.prenume,U.mail
				order by NrRezervari desc";
	$result1 = sqlsrv_query($conn, $query1);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume</th>
			<th>Prenume</th>
			<th>Mail</th>
			<th>Numar rezervari</th>
		</tr>
		<?php
		while($row1 = sqlsrv_fetch_object($result1)) {?>
		<tr>
			<td><?php echo $row1->nume; ?></td>
			<td><?php echo $row1->prenume; ?></td>
			<td><?php echo $row1->mail; ?></td>
			<td><?php echo $row1->NrRezervari; ?></td>
		</tr>
		<?php $a++; }	?>
	</table>
<?php

	if($a === 0)
			echo "Nu exista rezervari facute pentru acest an.";
}


?>
	</form>	
<?php include("main_footer.php"); ?>