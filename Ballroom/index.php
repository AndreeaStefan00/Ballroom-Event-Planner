<?php  session_start();
require_once('includes/_init.php');

if (isset($_SESSION['username'])){ 
	if ($_SESSION['username'] == '') { ?>
		<meta http-equiv="refresh" content="0; url=login.php" />
<?php }else{ ?>
		<meta http-equiv="refresh" content="0; url=main.php" />
<?php }
}else {	?>
		<meta http-equiv="refresh" content="0; url=login.php" />
<?php }?>
