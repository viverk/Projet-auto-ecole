<?php
include 'cnx.php';
$rqt = $cnx->prepare("select * from categorie");
$rqt->execute();
echo "<label class='form-control col-2 text-center'>Choix de la catégorie du permis</label>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<label class='radio-inline'><input type='radio' name='rbCategories' value='".$ligne['CodeCategorie']."'>".$ligne['Libelle']."</label>";
}
?>