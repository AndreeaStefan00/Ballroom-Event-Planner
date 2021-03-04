<?php include("main_header.php"); ?>

<script type="text/javascript">
	function intoarceMain(){
		location.href="main.php";
		return true;
	}
</script>
<?php
if ($_POST['tipServiciu'] != ""  && $_POST['nrOre'] != ""  && $_POST['pret'] != "") {
	$tipServiciu = $_POST['tipServiciu'];
	$nrOre = $_POST['nrOre'];
	$pret = $_POST['pret'];
	// adaugare serviciu suplimentar
	$query = "INSERT INTO ServiciiSuplimentare (TipServiciu, NrOre, Pret) VALUES ('$tipServiciu','$nrOre','$pret')";
	$result = sqlsrv_query($conn,$query) or die(print_r( "Eroare la insert", true));
	//echo "A fost inregistrat cu succes";
			
}
?>
<meta http-equiv="refresh" content="0; url=servicii_suplim_definire.php" />
<?php include("main_footer.php"); ?>