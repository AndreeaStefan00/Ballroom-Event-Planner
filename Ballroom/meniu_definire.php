<?php include("main_header.php"); ?>

<h1>Adaugare meniu nou </h1>
<form id="adaugare_meniu" name="adaugare_meniu" action="meniu_insert.php" method="post">
	<table id="adaugare_meniu">
		<tr>
			<td align="right">
				<label for="tipmeniu">Tip meniu: </label>
			</td>
			<td align="left">
				<input type="text" id="tipmeniu" name="tipmeniu" size="15" maxlength="20" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="pret">Pret: </label>
			</td>
			<td align="left">
				<input type="text" id="pret" name="pret" size="5" maxlength="10" /> RON
			</td>
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="adaugaMeniu" id="adaugaMeniu" value="Adauga Meniu" />
			</td>
		</tr>		
	</table>
	<br> <br>
	<!-- Afisarea tuturor meniurilor -->
	<?php 
	$sql  = "SELECT TipMeniu, Pret FROM Meniu ORDER BY TipMeniu "; 
	$stmt = sqlsrv_query($conn,$sql);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume Meniu</th>
			<th>Pret(RON)</th>
		</tr>
	<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->TipMeniu; ?></td>
			<td><?php echo $row->Pret; ?></td>
		</tr>	
	<?php }	?>
	
	</table>
</form>

<?php include("main_footer.php"); ?>