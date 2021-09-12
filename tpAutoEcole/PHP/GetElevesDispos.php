<?php
include 'cnx.php';
$rqt = $cnx->prepare("select codeeleve, nom, prenom from eleve where codeeleve not in (select codeeleve from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."' )");
$rqt->execute();
echo "<h5 class='bg-success text-center'>Les élèves disponibles</h5>";
echo "<input id='txtSearch' class='form-control text-center' colspan='2' placeholder='Rechercher un élève'>";
echo "<table class='table' id='tabEleves'>";
// L'entête
echo "<thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>		
    </tr>        
</thead>";

// Le body du tableau
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<tr class='libre' onclick='TabloEleves($(this))'>";
        echo "<td hidden=''>".$ligne['codeeleve']."</td>";
        echo "<td>".$ligne['nom']."</td>";
        echo "<td>".$ligne['prenom']."</td>";
    echo "</tr>";
}
echo "</table>";
?>