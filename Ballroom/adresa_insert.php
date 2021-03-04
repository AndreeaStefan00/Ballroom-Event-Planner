<?php include("main_header.php"); ?>

<?php
if ($_POST['addrName'] != ""  && $_POST['str'] != ""  && $_POST['nr'] != "" && $_POST['localitate'] != "")
{
	$addrName = $_POST['addrName'];
	$str = $_POST['str'];
	$nr = $_POST['nr'];
	$localitate=$_POST['localitate'];
	// adaugare adresa noua in baza de date
	$query = "INSERT INTO Adresa (Strada, Nr, Localitate,AddressName) VALUES ('$str','$nr','$localitate','$addrName')";
	$result = sqlsrv_query($conn,$query) or die(print_r( "Eroare la insert", true));
	//echo "Adresa a fost inregistrata cu succes";
			
}
?>
<meta http-equiv="refresh" content="0; url=adresa_definire.php" />

<?php include("main_footer.php"); ?>