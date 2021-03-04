<?php include("main_header.php"); 

if ($_POST['pret'] != ""  && $_POST['meniu'] != ""){
	$pret = $_POST['pret'];
	$meniuID = $_POST['meniu'];
	$update = "UPDATE Meniu SET Pret = '$pret' WHERE MeniuID = '$meniuID'";
	$result = sqlsrv_query($conn, $update);
	if ($result) 
            echo "Data was updated!";
        else
            echo 'Error!';
}

include("main_footer.php"); ?>