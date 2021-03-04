<?php include("main_header.php"); ?>

<h1>Adaugare adresa noua </h1>
<form id="adaugare_adresa" name="adaugare_adresa" action="adresa_insert.php" method="post">
	<table id="adaugare_adresa">
		<tr>
			<td align="right">
				<label for="addrName"> Nume Adresa: </label>
			</td>
			<td align="left">
				<input type="text" id="addrName" name="addrName" size="25" maxlength="50" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="str"> Strada: </label>
			</td>
			<td align="left">
				<input type="text" id="str" name="str" size="15" maxlength="20" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="nr"> Numar: </label>
			</td>
			<td align="left">
				<input type="text" id="nr" name="nr" size="5" maxlength="5" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="localitate"> Localitate: </label>
			</td>
			<td align="left">
				<input type="text" id="localitate" name="localitate" size="15" maxlength="20" />
			</td>	
		</tr>
		<tr>
			<td valign="top" align="center"  colspan="2">
				<br />
				<input type="submit" class="button" name="adaugaAdresa" id="adaugaAdresa" value="Adauga Adresa" />
			</td>
		</tr>
	</table>
	<br> <br>
	<!-- Afisarea tuturor adreselor existente in baza de date, sub forma de tabel -->
	<?php 
	$sql  = "SELECT AddressName, Strada, Nr, Localitate FROM Adresa ORDER BY AddressName "; 
	$stmt = sqlsrv_query($conn,$sql);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume Adresa</th>
			<th>Strada</th>
			<th>Numar</th>
			<th>Localitate</th>
		</tr>
	<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->AddressName; ?></td>
			<td><?php echo $row->Strada; ?></td>
			<td><?php echo $row->Nr; ?></td>
			<td><?php echo $row->Localitate; ?></td>
		</tr>	
	<?php }	?>
	
	</table>
</form>

<?php include("main_footer.php"); ?>