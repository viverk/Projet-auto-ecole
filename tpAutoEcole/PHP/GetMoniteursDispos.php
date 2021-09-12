<?php
include 'cnx.php';
$rqt = $cnx->prepare("select moniteur.codemoniteur, nom, prenom from moniteur, licence where moniteur.codemoniteur = licence.codemoniteur and licence.codecategorie = ".$_GET['categorie']." and moniteur.codemoniteur not in (select codemoniteur from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."' )");
$rqt->execute();
echo "<h5 class='bg-success text-center'>Les moniteurs disponibles</h5>";
echo "<table id='tabMoniteurs' class='table'>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<tr class='libre' onclick='TabloMoniteurs($(this))'>";
        echo "<td hidden=''>".$ligne['codemoniteur']."</td>";
        echo "<td>".$ligne['nom']."</td>";
        echo "<td>".$ligne['prenom']."</td>";
    echo "</tr>";
}
echo "</table>";
?>