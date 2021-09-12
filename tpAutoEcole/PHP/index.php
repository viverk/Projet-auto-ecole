<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../JS/MesFonctions.js"></script>
        <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/bootbox.min.js"></script>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../CSS/Styles.css">
       
        <script type="text/javascript">          
            $
            (
                function()
                {
                    
                    // Lors d'un clic sur le bouton RECHERCHER
                    $('#btnRechercher').click(Rechercher);
                    // Lors d'un clic sur le bouton VALIDER
                    $('#btnValider').click(Valider);
                    // Click sur le tableau des moniteurs
                    // Click sur le tableau des véhicules
                    $("#tabVehicules tbody tr").click(TabloVehicules);
                    // Click sur le tableau des élèves
                    $("#tabEleves tbody tr").click(TabloEleves);
                    // Pour rechercher un élève
                    $(document).on("keyup","#txtSearch", function()
                    {
                        if (this.value.length < 1) {
                            $("#tabEleves tr").css("display", "");
                        } 
                        else 
                        {
                            // data est le texte recherché
                            var data = this.value;
                            // rows est un tableau de l'ensemble des lignes du tableau sauf la ligne d'entête
                            var rows = $("#tabEleves tbody").find("tr");

                            var searchText = data.toLowerCase();
                            for (var i = 0; i < rows.length; i++)
                            {
                                // Dans la cellule = 1 il y a le nom
                                // Dans la cellule = 2 il y a le prénom
                                if( rows[i].cells[1].innerText.toString().toLowerCase().includes(searchText) ||
                                        rows[i].cells[2].innerText.toString().toLowerCase().includes(searchText))
                                {   
                                    $("#tabEleves tbody tr:eq("+i+")").show();
                                }
                                else
                                {
                                    $("#tabEleves tbody tr:eq("+i+")").hide();
                                }
                            }
                        }
                    });

                    GetLastNumLecon();
                }
            );
        </script>
    </head>
    <body id="body">
        <div id="divEntete">
            <div id="divLecon">
                <label class="form-control col-2 text-center">Numéro de la leçon</label>
                <input class="form-control col-2 text-center" type="text" id="txtNumLecon" disabled="">
            </div>
            <div id="divDate">
                <label class="form-control col-2 text-center">Choix de la date</label>
                <input class="form-control col-2 text-center" type="date" id="txtDateLecon">
            </div>
            <div id="divHeure">
                <label class="form-control col-2 text-center">Choix de l'heure</label>
                <input class="form-control col-2 text-center" type="time" id="txtHeureLecon" min="08:00:00" max="19:00:00">
            </div>
            <div id="divCategories">
            </div>
        </div>
        <br>
        <div><input class="btn-success form-control col-2" type="button" value="Rechercher" id='btnRechercher'></div>
        <div id='divDispos'>
            <div id='divMoniteursDispos'>
                
            </div>
            <div id='divVehiculesDispos'>
            
            </div>
            <div id='divElevesDispos'>
            
            </div>
        </div>
        <br>
        <div id="divPied">
            <input class="btn-success form-control col-2" type="button" value="Valider vos choix" id="btnValider">
        </div>
        <br>
    </body>
</html>



