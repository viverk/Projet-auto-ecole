<?php
include 'cnx.php';
$rqt = $cnx->prepare("insert into lecon values(".$_GET['codeLecon'].",'".$_GET['dateLecon']."','".$_GET['heureLecon']."',1,".$_GET['codeMoniteur'].",".$_GET['codeEleve'].",'".$_GET['codeVehicule']."',0,0,0)");
$rqt->execute();
?>