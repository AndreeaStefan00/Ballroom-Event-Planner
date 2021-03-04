<?php include("main_header.php"); ?>

<script type="text/javascript">
	function intoarceMain(){
			location.href="main.php";
			return true;
	}
	
</script>


<h1>Modificarea pretului unui meniu </h1>
<form id="modificare_pret" name="modificare_pret" action="update_pret.php" method="post"  >
	<table id="modificare_pret">
		<tr>
			<td align="right">
				<label for="meniu" style="white-space:nowrap;">Meniul pentru care se modifica:</label>
			</td>
			<td align="left">
				<?php $sql  = "SELECT MeniuID, TipMeniu, Pret FROM Meniu ORDER BY TipMeniu "; 
				$stmt = sqlsrv_query($conn,$sql);
				?>
				<select id="meniu" name="meniu" />
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->MeniuID; ?>"><?php echo $row->TipMeniu;?>_<?php echo $row->Pret;?>_RON</option>
					<?php }	?>
				</select>
			</td>				
		</tr>
		
		<tr>
 			<td align="right">
				<label for="pret">Pretul nou:</label>
			</td>
			<td align="left">
				<input type="text" id="pret" name="pret" size="3" maxlength="5" /> RON
			</td>
		</tr>
		
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="modificarePret" id="modificarePret" value="Update" />
			</td>
		</tr>
		
	</table>
</form>



<h1>Actualizare servicii suplimentare </h1>


<form id="modificare_nr" name="modificare_nr" action="update_serviciu.php" method="post"  >
	<table id="modificare_nr">
	
<?php $query="SELECT ServID, TipServiciu, NrOre, Pret FROM ServiciiSuplimentare ORDER BY TipServiciu";
	$stmt = sqlsrv_query($conn, $query);
?>

		<tr>
			<td>
				<label >Tip Serviciu_Numar ore_Pret </label>
			</td>
			<td>
				<select id="servsup" name="servsup" />
					<option value="">Selectati</option>
					<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
					<option value="<?php echo $row->ServID; ?>">
						<?php echo $row->TipServiciu;?>_<?php echo $row->NrOre;?>_<?php echo $row->Pret;?>_RON
					</option>
					<?php }	?>
				</select>
			</td>
		</tr>
		<tr>
 			<td align="right">
				<label for="newNrOre">Numar nou de ore:</label>
			</td>
			<td align="left">
				<input type="text" id="newNrOre" name="newNrOre" size="5" maxlength="5" />
			</td>
		</tr>
		
		<tr>
 			<td align="right">
				<label for="newPret">Pretul nou:</label>
			</td>
			<td align="left">
				<input type="text" id="newPret" name="newPret" size="3" maxlength="5" /> RON
			</td>
		</tr>
		
		<tr>
			<td valign="top" align="center" colspan="2">
				<br />
				<input type="submit" class="button" name="modificarePret" id="modificarePret" value="Update" />
			</td>
		</tr>
		
	</table>

</form>
<?php include("main_footer.php"); ?>