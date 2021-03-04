<?php include("main_header.php"); ?>


<?php
if ($_POST['tipEveniment'] != "" ){
	$tipEveniment = $_POST['tipEveniment'];
	//echo .$tipEveniment;
	// adaugare eveniment
	$query = "INSERT INTO Eveniment (TipEveniment) VALUES ('$tipEveniment')";
	$result = sqlsrv_query($conn,$query) or die(print_r( "Eroare la insert", true));
	//echo "Evenimentul a fost inregistrat cu succes";
}
?>
<meta http-equiv="refresh" content="0; url=eveniment_definire.php" />
<?php include("main_footer.php"); ?>