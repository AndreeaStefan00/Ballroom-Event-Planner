<?php include("main_header.php"); ?>


<?php
if($_POST['NrInvitati'] != ""  && $_POST['Data'] != ""  && $_POST['Ora'] != "" && $_POST['Mail'] != ""){	

	$nr = $_POST['NrInvitati'];
	$data =$_POST['Data'];
	$ora = $_POST['Ora'];
	$mail=$_POST['Mail'];
	$idAdresa = $_POST['nomAdresa'];
	$idMeniu = $_POST['nomMeniu'];
	$idEvent = $_POST['nomEvent'];
	
	$client_check_query = "SELECT ClientID FROM DateClient WHERE Mail='$mail'";
	$result_client = sqlsrv_query($conn, $client_check_query);
	$clientID=sqlsrv_fetch_object($result_client);
	
	
	$user=$_SESSION['username']; // username-ul angajatului care e conectat la aplicatie
	
	// se selecteaza id ul angajatului care face inregistrarea rezervarii
	$angajat_check_query = "SELECT id FROM utilizator WHERE alias='$user'";
	$result_angajat = sqlsrv_query($conn, $angajat_check_query);
	$angajatID=sqlsrv_fetch_object($result_angajat);
	
	$query = "INSERT INTO Rezervari (NrInvitati, ClientID, Data, Ora, AdresaID, MeniuID, EventID, UserID ) VALUES ('$nr','$clientID->ClientID','$data','$ora',
															$idAdresa,$idMeniu,$idEvent,'$angajatID->id')";
	$result = sqlsrv_query($conn,$query) or die(print_r( sqlsrv_errors(), true));
	echo "Rezervarea a fost inregistrata cu succes";
	  
	// obtin ultimul pk generat in tabela rezervari
	$sql2 = "SELECT max(RezervareID) as rezervID FROM Rezervari"; 
	$stmt2 = sqlsrv_query($conn,$sql2);
	$row2 = sqlsrv_fetch_object($stmt2);
	$rezervID =$row2->rezervID;  
		
	//tratament special pt recuperare valori din checkboxes
	$sql3 = "SELECT count(*) as nrCheckboxes FROM ServiciiSuplimentare"; 
	$stmt3 = sqlsrv_query($conn,$sql3);
	$row3 = sqlsrv_fetch_object($stmt3);
	$nrCheckboxes =$row3->nrCheckboxes;  
	for ($i=1; $i<= $nrCheckboxes; $i++){
		if (isset($_POST['checkbox_'.$i])){
			//echo "s-a bifat al ".$i."-lea";
			//echo "valaorea este ".$_POST['checkbox_'.$i];
			// pt optiunile suplimentare alese se vor insera inregistrari in tabela de legatura
			$servIDselected=$_POST['checkbox_'.$i];
			$query4 = "INSERT INTO RezervariServicii (RezervareID, ServID) VALUES ($rezervID,$servIDselected)";
			$result4 = sqlsrv_query($conn,$query4) or die(print_r( sqlsrv_errors(), true));
		}
	}
} else echo "Nu ati completat toate campurile!";

?>

<?php include("main_footer.php"); ?>