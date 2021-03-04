<?php include("main_header.php"); ?>


<?php
if($_POST['nrMeniuri'] != ""  && $_POST['numMeniu'] != "" ){	

	$nr = $_POST['nrMeniuri'];
	$idMeniu = $_POST['numMeniu'];
	
	$sum=0;
	// se selecteaza pretul meniului ales
	$sql2="SELECT Pret FROM Meniu WHERE MeniuID=$idMeniu";
	$stmt2=sqlsrv_query($conn, $sql2);
	$row2=sqlsrv_fetch_object($stmt2);
	$sum=$sum+($nr*$row2->Pret); // pretul se inmulteste cu numarul de meniuri dorite si se adauga la suma
	
	
	//tratament special pt recuperare valori din checkboxes
	$sql3 = "SELECT count(*) as nrCheckboxes FROM ServiciiSuplimentare"; 
	$stmt3 = sqlsrv_query($conn,$sql3);
	$row3 = sqlsrv_fetch_object($stmt3);
	$nrCheckboxes =$row3->nrCheckboxes;  
	for ($i=1; $i<= $nrCheckboxes; $i++){
		if (isset($_POST['checkbox_'.$i])){
			$servIDselected=$_POST['checkbox_'.$i];
			// se selecteaza pretul serviciului suplimentar ales
			$query4 = "SELECT Pret as price FROM ServiciiSuplimentare WHERE ServID =".$servIDselected;
			$result4 = sqlsrv_query($conn,$query4) or die(print_r( sqlsrv_errors(), true));
			$pret_serv=sqlsrv_fetch_object($result4);
			$sum=$sum+$pret_serv->price; // se adauga la suma pretul serviciului
		}
	}
	echo "Pretul evenimentului este: ".$sum."RON";  
}
else echo "Introduceti toate datele necesare!";
?>	
	