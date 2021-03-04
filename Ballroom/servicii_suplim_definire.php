<?php include("main_header.php"); ?>

<h1>Adaugare servicii suplimentare </h1>
<form id="adaugare_servicii_suplim" name="adaugare_servicii_suplim" action="servicii_suplim_insert.php" method="post">
	<table id="adaugare_servicii_suplim">
		<tr>
			<td align="right">
				<label for="tipServiciu">Tip Serviciu: </label>
			</td>
			<td align="left">
				<input type="text" id="tipServiciu" name="tipServiciu" size="8" maxlength="10" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="nrOre">Numar ore: </label>
			</td>
			<td align="left">
				<input type="text" id="nrOre" name="nrOre" size="2" maxlength="2" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="pret">Pret: </label>
			</td>
			<td align="left">
				<input type="text" id="pret" name="pret" size="5" maxlength="5" /> RON
			</td>	
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="adaugaServiciiSuplim" id="adaugaServiciiSuplim" value="Adauga Servicii Suplimentare" />
			</td>
		</tr>
	</table>
	<br> <br>
	<!-- Afisarea tuturor serviciilor suplimentare -->
	<?php 
	$sql  = "SELECT TipServiciu, NrOre, Pret FROM ServiciiSuplimentare ORDER BY TipServiciu "; 
	$stmt = sqlsrv_query($conn,$sql);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume serviciu</th>
			<th>Nr ore</th>
			<th>Pret</th>
		</tr>
	<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->TipServiciu; ?></td>
			<td><?php echo $row->NrOre; ?></td>
			<td><?php echo $row->Pret; ?></td>
		</tr>	
	<?php }	?>
	
	</table>
</form>

<?php include("main_footer.php"); ?>