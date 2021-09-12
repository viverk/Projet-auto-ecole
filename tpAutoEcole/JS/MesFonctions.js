var codeMoniteur = "";
var codeVehicule = "";
var codeEleve = "";

function Rechercher()
{
    if($('#txtDateLecon').val() == "")
    {
        bootbox.alert("Choisir une date !!! ");
    }
    else
    {
        if($('#txtHeureLecon').val() == "")
        {
            bootbox.alert("Choisir une heure");
        }
        else
        {
            var categ = $('input[type=radio]:checked').val() || '';
            if(categ=="")
            {
                bootbox.alert("Choisir une catégorie de permis");
            }
            else
            {
                GetMoniteursDispos();
            }
        }
    }
}

function GetMoniteursDispos()
{
    $.ajax
    (
        {
            type:"GET",
            url:"GetMoniteursDispos.php",
            data:"categorie="+$('input[type=radio]:checked').val()+"&date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00",
            success:function(data)
            {
                $('#divMoniteursDispos').empty();
                $('#divMoniteursDispos').append(data);
                GetVehiculesDispos();
            },
            error:function()
            {
                alert("Erreur de récupération des moniteurs");
            }
        }
    );
}

function GetVehiculesDispos()
{
    $.ajax
    (
        {
            url:"GetVehiculesDispos.php",
            method:"get",
            data:"date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00"+"&categorie="+$('input[type=radio]:checked').val(),
            success:function(data)
            {
                $('#divVehiculesDispos').empty();
                $('#divVehiculesDispos').append(data);
                GetElevesDispos();
            },
            error:function()
            {
                alert("Erreur de récupération des véhicules");
            }
        }
    );
}

function GetElevesDispos()
{
    $.ajax
    (
        {
            url:"GetElevesDispos.php",
            method:"get",
            data:"date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00",
            success:function(data)
            {
                $('#divElevesDispos').empty();
                $('#divElevesDispos').append(data);
            },
            error:function()
            {
                alert("Erreur de récupération des élèves");
            }
        }
    );
}

function Valider()
{
    if(codeMoniteur === "")
    {
        bootbox.alert("Sélectionner un moniteur");
    }
    else
    {
        if(codeVehicule === "")
        {
            bootbox.alert("Sélectionner un véhicule");
        }
        else
        {
            if(codeEleve === "")
            {
                bootbox.alert("Sélectionner un élève");
            }
            else
            {
                InsererLecon(codeMoniteur, codeVehicule, codeEleve);   
            }
        }
    }
}

function TabloMoniteurs(tr)
{
    $('#tabMoniteurs tr').removeClass("occupe").addClass('libre');
    tr.removeClass("libre").addClass("occupe");
    codeMoniteur = tr.find('td:first').html();
}

function TabloVehicules(tr)
{
    $('#tabVehicules tbody tr').removeClass("occupe").addClass('libre');
    tr.removeClass("libre").addClass("occupe");
    codeVehicule = tr.find('td:first').html();
}

function TabloEleves(tr)
{
    $('#tabEleves tbody tr').removeClass("occupe").addClass('libre');
    tr.removeClass("libre").addClass("occupe");
    codeEleve = tr.find('td:first').html();
}

function GetLastNumLecon()
{
    $.ajax
    (
        {
            type:"GET",
            url:"GetLastNumLecon.php",
            success:function(data)
            {
                $("#txtNumLecon").val(data);
                GetAllCategories();
            },
            error:function()
            {
                alert("Erreur de récupération du dernier numéro de leçon");
            }
        }
    );
}

function GetAllCategories()
{
    $.ajax
    (
        {
            type:"GET",
            url:"GetAllCategories.php",
            success:function(data)
            {
                $("#divCategories").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération des catégories");
            }
        }
    );
}

function InsererLecon(numMoniteur, numVehicule, numEleve)
{
    $.ajax
    (
        {
            url:"InsererLecon.php",
            method:"get",
            data:"codeLecon="+$('#txtNumLecon').val()+"&dateLecon="+$('#txtDateLecon').val()+"&heureLecon="+$('#txtHeureLecon').val()+":00"
            +"&codeMoniteur="+numMoniteur+"&codeVehicule="+numVehicule+"&codeEleve="+numEleve,
            success:function(data)
            {
                bootbox.alert("Leçon insérée !!! ");
                $('#divMoniteursDispos').empty();
                $('#divVehiculesDispos').empty();
                $('#divElevesDispos').empty();
                $("#divCategories").empty();
                GetLastNumLecon();
            }
        }
    );
}