<?php include("main_header.php"); ?>

	<h1>Afisati ce evenimente au loc la fiecare adresa </h1>
	<form id="afisare_eveniment" name="afisare_eveniment" action="search_evenimente.php" method="post">
	<table>
		<tr>
			<td align="right">
				<label for="addr_sel">Selectati locatia: </label> 
			</td>
			<td>
				<?php $sql  = "SELECT AdresaID, AddressName FROM Adresa ORDER BY AddressName "; 
				$stmt = sqlsrv_query($conn,$sql);
				
				?>
				<select id="numAdresa" name="numAdresa" onchange="">
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->AdresaID; ?>"><?php echo $row->AddressName;?></option>
					<?php }	?>
				</select>
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
	if(isset($_POST['numAdresa']))
	{
	$addr=$_POST['numAdresa'];
	$a=0;
	
	$query1="SELECT E.TipEveniment, R.Data, R.Ora, R.NrInvitati FROM Eveniment E JOIN Rezervari R ON E.EventID=R.EventID join Adresa A ON R.AdresaID=A.AdresaID 
			WHERE A.AdresaID='$addr'";
	$result1 = sqlsrv_query($conn, $query1);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Eveniment</th>
			<th>Data</th>
			<th>Ora</th>
			<th>Nr invitati</th>
		</tr>
		<?php
		while($row1 = sqlsrv_fetch_object($result1)) {?>
		<tr>
			<td><?php echo $row1->TipEveniment; ?></td>
			<td><?php echo $row1->Data->format('d/m/Y'); ?></td>
			<td><?php echo $row1->Ora; ?></td>
			<td><?php echo $row1->NrInvitati; ?></td>
		</tr>
		<?php $a++; }	?>
	</table>
<?php

	if($a === 0)
			echo "Nu exista rezervari la aceasta locatie.";
}


?>
	</form>	

	<h1>Simulare cost eveniment</h1>
	<form id="afisare_event" name="afisare_event" action="simulare_eveniment.php" method="post">
	<table>
		<tr> 
			<td align="right">
				<label for="nrMeniuri">Numar meniuri: </label> 
			</td>
			<td align="left">
				<input type="text" id="nrMeniuri" name="nrMeniuri" size="5" maxlength="10" />
			</td>							
		</tr>
		<tr>
 			<td align="right">
				<label for="numMeniu">Meniu: </label>
			</td>
			<td align="left">
				<?php $sql  = "SELECT MeniuID, TipMeniu FROM Meniu ORDER BY TipMeniu "; 
				$stmt = sqlsrv_query($conn,$sql);
				?>
				<select id="numMeniu" name="numMeniu" />
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->MeniuID; ?>"><?php echo $row->TipMeniu;?></option>
					<?php }	?>
				</select>
			</td>							
		</tr>
		<tr>
 			<td align="right">
				<label>Servicii suplimentare: </label>
			</td>
			<td align="left">
				<?php $sql = "SELECT ServID,TipServiciu FROM ServiciiSuplimentare ORDER BY TipServiciu "; 
				$stmt = sqlsrv_query($conn,$sql);
				$nr=0;
				while($row = sqlsrv_fetch_object($stmt)){
					$nr=$nr+1;?>
					<input type="checkbox" id="checkbox_<?php echo $nr;?>" name="checkbox_<?php echo $nr;?>" value="<?php echo $row->ServID ?>"><?php echo $row->TipServiciu;?> &nbsp;
				<?php }	?>
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Calculeaza" />
			</td>
		</tr>
	</table>
	</form>	

<?php include("main_footer.php"); ?>