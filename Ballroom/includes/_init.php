<?php
$DB_NAME		="PlanificatorEvenimente"; 

$serverName = "STEFANANDREEA\SQLEXPRESS";
$connectionInfo = array( "Database"=>"PlanificatorEvenimente");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ){
     //echo "Connection established.\n";
}else{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}

$message="";
?>