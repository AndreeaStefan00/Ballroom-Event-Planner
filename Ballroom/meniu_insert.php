<?php include("main_header.php"); ?>


<?php
if ($_POST['tipmeniu'] != "" && $_POST['pret'] != ""){
	$tipmeniu = $_POST['tipmeniu'];
	$pret = $_POST['pret'];
	// adaugare meniu nou 
	$query = "INSERT INTO Meniu (TipMeniu, Pret) VALUES ('$tipmeniu',$pret)";
	$result = sqlsrv_query($conn,$query) or die(print_r( "Eroare la insert", true));
	//echo "Meniul a fost inregistrat cu succes";
}
?>
<meta http-equiv="refresh" content="0; url=meniu_definire.php" />
<?php include("main_footer.php"); ?>