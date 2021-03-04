<?php include("main_header.php"); ?>

<h1>Adaugare tip eveniment nou </h1>
<form id="adaugare_eveniment" name="adaugare_eveniment" action="eveniment_insert.php" method="post">
	<table id="adaugare_eveniment">
		<tr>
			<td align="right">
				<label for="tipEveniment">Tip eveniment: </label>
			</td>
			<td align="left">
				<input type="text" id="tipEveniment" name="tipEveniment" size="15" maxlength="10" />
			</td>	
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="adaugaEv" id="adaugaEv" value="Adauga Eveniment" />
			</td>
		</tr>
	</table>
	<br> <br>
	<!-- Afisarea tuturor evenimentelor -->
	<?php 
	$sql  = "SELECT TipEveniment FROM Eveniment ORDER BY TipEveniment "; 
	$stmt = sqlsrv_query($conn,$sql);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Tipul evenimentului</th>
		</tr>
	<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->TipEveniment; ?></td>
		</tr>	
	<?php }	?>
	
	</table>
</form>

<?php include("main_footer.php"); ?>