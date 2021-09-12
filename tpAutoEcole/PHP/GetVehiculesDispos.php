<?php
include 'cnx.php';
$rqt = $cnx->prepare("select immatriculation, marque, modele from vehicule where codeCategorie = ".$_GET['categorie']." and immatriculation not in (select immatriculation from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."' )");
$rqt->execute();
echo "<h5 class='bg-success text-center'>Les véhicules disponibles</h5>";
echo "<table id='tabVehicules' class='table'>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<tr class='libre' onclick='TabloVehicules($(this))'>";
        echo "<td hidden=''>".$ligne['immatriculation']."</td>";
        echo "<td>".$ligne['modele']."</td>";
        echo "<td>".$ligne['marque']."</td>";
    echo "</tr>";
}
echo "</table>";
?>