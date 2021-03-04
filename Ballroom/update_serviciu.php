<?php include("main_header.php"); 

if ($_POST['newNrOre'] != ""  && $_POST['newPret'] != "")
{
	$nr = $_POST['newNrOre'];
	$id = $_POST['newPret'];
	$servID = $_POST['servsup'];
	$update = "UPDATE ServiciiSuplimentare SET NrOre = '$nr', Pret = '$id' WHERE ServID = ".$servID;
	$result = sqlsrv_query($conn, $update);
	if ($result) 
            echo "Data was updated!";
        else
            echo 'Error!';
}

include("main_footer.php"); ?>