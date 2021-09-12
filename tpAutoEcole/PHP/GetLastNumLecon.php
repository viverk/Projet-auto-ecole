<?php
include 'cnx.php';
$rqt = $cnx->prepare("select max(codelecon) as codeLecon from lecon");
$rqt->execute();
$num = $rqt->fetchColumn();
echo intval($num)+1;
?>