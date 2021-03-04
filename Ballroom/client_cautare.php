<?php include("main_header.php"); ?>

<script type="text/javascript">
	function intoarceMain(){
			location.href="main.php";
			return true;
		}
</script>
<h1>Cautare clienti</h1>
<form id="afisare" name="afisare" action="client_cautare.php" method="post">
	<table>
		<tr>
			<td align="left">
				Nume : 
				<input type="text" id="nume" name="nume" size="30" maxlength="50" />
			</td>							
		</tr>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="search" id="search" value="Cauta" />
			</td>
			<td valign="top" align="center">
				<br />
				<input type="button" name="back" value="Inapoi la main" onclick="intoarceMain()" />
			</td>
		</tr>
	</table>
	<br><br>
				
<?php 
	//default se face selectul pt toti clientii. Dar daca se doreste cautarea pt un anume client, se triaza dupa Nume 
	$query="SELECT ClientID, Nume, Prenume, Telefon, Mail FROM DateClient ORDER BY Nume, Prenume";

	$a=0;
	if (isset($_POST['nume'])|| isset($_GET['fromDeletedPage'])){
		$nume_cautat ="";
		if (isset($_POST['nume'])){
			$nume_cautat = $_POST['nume'] ;
		}else if (isset($_GET['fromDeletedPage'])){
			$nume_cautat = $_GET['fromDeletedPage'];
		}
		if ($nume_cautat != ''){
			$query="SELECT ClientID, Nume, Prenume, Telefon, Mail FROM DateClient WHERE Nume ='".$nume_cautat."' ORDER BY Nume, Prenume";
		}
	}
	
 
	$stmt = sqlsrv_query($conn, $query);
?>

	<table border="1px" bgcolor="pink">
		<tr >
			<th>Nume Client</th>
			<th>Mail</th>
			<th>Telefon</th>
			<th>Optiuni</th>
		</tr>
		<?php while($row = sqlsrv_fetch_object($stmt)){ ?>
		<tr>
			<td><?php echo $row->Nume." ".$row->Prenume ; ?></td>
			<td><?php echo $row->Mail; ?></td>
			<td><?php echo $row->Telefon; ?></td>
			<td><a href="client_delete.php?idcli=<?php echo $row->ClientID ?>&searchValue=<?php echo $nume_cautat?>">Sterge</a></td>
		</tr>	
		<?php }	?>
	</table>
</form>

<?php include("main_footer.php"); ?>