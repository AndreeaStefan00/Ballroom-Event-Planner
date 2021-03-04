<?php include("main_header.php"); ?>

<?php
if ($_POST['Nume'] != ""  && $_POST['Prenume'] != ""  && $_POST['Telefon'] != "" && $_POST['Mail'] != "")
{
	$nume = $_POST['Nume'];
	$prenume = $_POST['Prenume'];
	$telefon = $_POST['Telefon'];
	$mail=$_POST['Mail'];
			
	$query = "INSERT INTO DateClient (Nume, Prenume, Telefon,Mail) VALUES ('$nume','$prenume','$telefon','$mail')";
	$result = sqlsrv_query($conn,$query) or die(print_r( "Exista deja un client cu acest mail.", true));
	echo "Clientul a fost inregistrat cu succes!";
			
}


?>
<?php include("main_footer.php"); ?>