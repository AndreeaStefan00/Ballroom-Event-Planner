<?php include("main_header.php"); ?>
<script type="text/javascript" src="javascripts/calendar.js"></script>
<script type="text/javascript">
	function intoarceMain(){
			location.href="main.php";
			return true;
		}
	function intoarceSearch(){
		location.href="rezervare_definire.php";
		return true;
	}
</script>	
	<h1>Afisati adresele disponibile pentru data:</h1>
	<form id="afisare_adresa" name="afisare_adresa" action="rezervare_definire.php" method="post">
	<table>
		<tr> 		
			<td align="left">
				<input type="text" id="Data1" name="Data1" size="8" maxlength="10" />
				<script type="text/javascript">
	 				calendar.set("Data1");
				</script>
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Search" />
			</td>
			<td valign="top" align="center">
				<br />
				<input type="button" name="back" value="Inapoi la main" onclick="intoarceMain()" />
			</td>
		</tr>
	</table>
	<br></br>
	<br></br>
	<?php
	if(isset($_POST['Data1']))
	{
	$data=$_POST['Data1'];
	$a=0;
	
	$query1="SELECT DISTINCT A1.Strada, A1.Nr, A1.Localitate, A1.AddressName FROM Adresa A1 
				WHERE A1.AdresaID NOT IN (SELECT R2.AdresaID FROM Rezervari R2 WHERE R2.Data='$data')";
	$result1 = sqlsrv_query($conn, $query1);
	?>
	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume locatie</th>
			<th>Strada</th>
			<th>Numar</th>
			<th>Localitate</th>
		</tr>
		<?php
		while($row1 = sqlsrv_fetch_object($result1)) {?>
		<tr>
			<td><?php echo $row1->AddressName; ?></td>
			<td><?php echo $row1->Strada; ?></td>
			<td><?php echo $row1->Nr; ?></td>
			<td><?php echo $row1->Localitate; ?></td>
		</tr>
		<?php $a++; }	?>
	</table>
<?php

	if($a === 0)
			echo "Nu exista locatii disponibile pentru aceasta data";
}


?>
	</form>	

<h1>Adaugare rezervare noua </h1> 
<form id="form_rezervare" name="form_rezervare" action="rezervare_insert.php" method="post" >
	<table id="formular_rezervare">
		<tr>
			<td align="right">
				<label for="Mail" >Client Mail:</label>
			</td>
			<td align="left">
				<input type="text" id="Mail" name="Mail" size="20" maxlength="50" />
			</td>
		</tr>
		<tr>
			<td align="right">				
				<label for="Data">Data evenimentului: </label>
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
				<label for="addr_sel">Selectati locatia: </label> 
			</td>
			<td>
				<?php $sql  = "SELECT AdresaID, AddressName FROM Adresa ORDER BY AddressName "; 
				$stmt = sqlsrv_query($conn,$sql);
				
				?>
				<select id="nomAdresa" name="nomAdresa" onchange="">
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->AdresaID; ?>"><?php echo $row->AddressName;?></option>
					<?php }	?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="Ora">Ora inceperii evenimentului:</label>
			</td>
			<td align="left">			
				<input type="text" name="Ora" id="Ora" size="5" maxlength="5" />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="NrInvitati">Numar invitati:</label>
			</td>
			<td align="left">
				<input type="NrInvitati" id="NrInvitati" name="NrInvitati" size="3" maxlength="4" />
			</td>							
		</tr>
		<!-- Tipuri de meniu -->
		<tr>
 			<td align="right">
				<label for="nomMeniu">Meniu: </label>
			</td>
			<td align="left">
				<?php $sql  = "SELECT MeniuID, TipMeniu FROM Meniu ORDER BY TipMeniu "; 
				$stmt = sqlsrv_query($conn,$sql);
				?>
				<select id="nomMeniu" name="nomMeniu" />
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->MeniuID; ?>"><?php echo $row->TipMeniu;?></option>
					<?php }	?>
				</select>
			</td>							
		</tr>
		<!-- Tipuri de eveniment. De exemplu: botez, nunta, etc -->
		<tr>
 			<td align="right">
				<label for="nomEvent">Tip eveniment: </label>
			</td>
			<td align="left">
				<?php $sql = "SELECT EventID, TipEveniment FROM Eveniment ORDER BY TipEveniment "; 
				$stmt = sqlsrv_query($conn,$sql);
				?>
				<select id="nomEvent" name="nomEvent" />
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->EventID; ?>"><?php echo $row->TipEveniment;?></option>
					<?php }	?>
				</select>
			</td>							
		</tr>
		<!-- Servicii suplimentare. Pot fi bifate(alese) mai multe sau niciunul -->
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
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="adaugaRezervare" id="adaugaRezervare" value="Insert" />
			</td>
			<td valign="top" align="center">
				<br />
				<input type="button" name="back" value="Inapoi la main" onclick="intoarceMain()" />
			</td>
		</tr>
 	</table>	
	<br></br>
</form>

<?php include("main_footer.php"); ?>