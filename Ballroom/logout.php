<?php require_once("includes/_init.php"); ?>
<?php	
    session_start();
	session_destroy();
    header('Location: index.php');
?>
