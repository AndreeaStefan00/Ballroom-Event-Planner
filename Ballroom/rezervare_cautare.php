<?php include("main_header.php"); ?>
<script type="text/javascript">

	function intoarceSearch(){
		location.href="rezervare_cautare.php";
		return true;
	}
</script>
<h1> Afisare rezervari </h1>
<form id="form_afisare_rezervare" name="form_afisare_rezervare" action="rezervare_cautare.php" method="post">
	<table id="formular_cautare_rezervare">
		<tr>
			<td align="right">
				<label for="Mail" >Mailul clientului:</label>
			</td>
			<td align="left">
				<input type="text" id="Mail" name="Mail" size="20" maxlength="50" />
			</td>
		</tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="cautaRezervare" id="cautaRezervare" value="Cauta" />
			</td>
			<td valign="top" align="center">
				<br />
				<input type="button" name="back" value="Inapoi" onclick="intoarceSearch()" />
			</td>
		<tr>
		</tr>
	</table>

<?php 
	//default se face selectul pt toate rezervarile. Dar daca se doreste cautarea pt un anume client, se triaza dupa mail
	$sql="select D.Nume, D.Prenume, R.Data, A.AddressName as Locatie from DateClient D join Rezervari R on D.ClientID=R.ClientID 
			join Adresa A on R.AdresaID=A.AdresaID order by R.Data";
	if(isset($_POST['Mail']))
	{	$mail=$_POST['Mail'];
		$sql  = "select D.Nume, D.Prenume, R.Data, A.AddressName as Locatie from DateClient D join Rezervari R on D.ClientID=R.ClientID 
				join Adresa A on R.AdresaID=A.AdresaID where D.Mail='$mail'"; 
	}
	$stmt = sqlsrv_query($conn,$sql);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume Client</th>
			<th>Prenume Client</th>
			<th>Data rezervare</th>
			<th>Locatie</th>
		</tr>
	<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->Nume; ?></td>
			<td><?php echo $row->Prenume; ?></td>
			<td><?php echo $row->Data->format('d/m/Y'); ?></td>
			<td><?php echo $row->Locatie; ?></td>
		</tr>	

	<?php }	?>
	</table>	
	<br></br>
	<br></br>
	<br></br>
</form>
<?php include("main_footer.php"); ?>