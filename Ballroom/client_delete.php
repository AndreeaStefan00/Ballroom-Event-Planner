<?php include("main_header.php"); ?>
<?php
$clientIdToBeDeleted = $_GET['idcli'];
$cautare = $_GET['searchValue'];
if ($clientIdToBeDeleted != ""){
	//echo "...".$clientIdToBeDeleted;
	//echo "...".$cautare;
	
	// Se sterg mai intai toate legaturile pe care clientul le avea in baza de date si apoi se sterge clientul
	$delete1 = "delete from RezervariServicii where RezervareID in (select rezervareID from rezervari where clientID = '$clientIdToBeDeleted')";
	$result1 = sqlsrv_query($conn, $delete1);
	if ($result1){ 
		$delete2 = "delete from Rezervari where ClientID = ".$clientIdToBeDeleted;
		$result2 = sqlsrv_query($conn, $delete2);
		if ($result2){ 
			$delete3 = "delete from DateClient where ClientID = ".$clientIdToBeDeleted;
			$result3 = sqlsrv_query($conn, $delete3);
			if ($result3){ ?>
				<meta http-equiv="refresh" content="0; url=client_cautare.php?fromDeletedPage=<?php echo $cautare?>" />
<?php 		} 
		} 
	}
}
else echo "Error!";
?>

<?php include("main_footer.php"); ?>