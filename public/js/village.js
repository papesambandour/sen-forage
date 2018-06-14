/**
 * LOADER
 */
//$("#tecnologi").modal('show');

$(function () {

    $('#editVillage').on('hidden.bs.modal', function () {
        cleanVillage();
    })

    ///VILLAGE START

    //VILLAGE ADD
    $("#fmrAddVillage").on("submit",function (e) {
        e.preventDefault();
        loaderStart();

       var formData =  getParamsForm($(this));
        console.log(formData)
        $.post("village/create",formData
        ).done(function (data) {
            console.log(data)
            if(data >= 1)
            {
               var html = "<tr>\n" +
                   "\t\t\t\t\t\t<td id=\"id"+data+"\" > "+data+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"nom"+data+"\" >  "+formData.nomvillageAdd+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"eta"+data+"\" > "+formData.etatvillageAdd +"</td>\n" +
                   "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                   "<button class=\"btn btn-success\" value=\""+data+"\"\n" +
                   "\t\t\t\t\t\t\t\t\tonclick=\"showChefDevillage(this)\"\n" +
                   "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#showchef\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-eye\"> Chef</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n"+
                   "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+data+"\"\n" +
                   "\t\t\t\t\t\t\t\t\tonclick=\"showEditVillage(this)\"\n" +
                   "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editVillage\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n" +
                   "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+data+"\" onclick=\"DelVillage(this)\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"> Del</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n" +
                   "\n" +
                   "\t\t\t\t\t\t</td>\n" +
                   "\t\t\t\t\t</tr>";


                $("#tbody").append(html);
                loaderEnd();
                cleanVillage();
                $("#addVillage").modal("hide");
                myAlert("Village ajouter avec success","success");
            }
            else {
                loaderEnd();
                alert("Erreur interne");
                console.log(data)
            }
        }).fail(function (err) {
            loaderEnd();
            alert("Erreur reseaux");
        })
    });
    //VILLAGE  EDIT

    $("#fmrEditVillage").on("submit",function (e) {
        e.preventDefault();
        var formData  = getParamsForm($(this));
        loaderStart();
        $.post("village/update/"+$("#idvillageEdit") .val(),formData).done(function (data) {
            var id = $("#idvillageEdit") .val();
            if(data == 1)
            {
                $("#id"+id ).html($("#idvillageEdit").val());
                $("#nom"+id ).html($("#nomvillageEdit").val());
                $("#eta"+id ).html($("#etatvillageEdit").val());
                loaderEnd();
                cleanVillage();
                $("#editVillage").modal("hide");
                myAlert("Village mis a jour avec success","success");
            }
            else {
                loaderEnd();
                alert("Erreur interne");
                console.log(data)
            }
        }).fail(function (err) {
            loaderEnd();
            alert("Erreur reseaux");
        })
    });

//SEARCH VILLAGE
    $("#searchVillage").on("keyup",function (e) {
        loaderStart();
        if($("#searchVillage").val() === '')
        {
            $.get("village/gets",{
                item : $("#searchVillage").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idvillage+"\" > "+dataParsed[i].idvillage +"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idvillage+"\" >  "+dataParsed[i].nomvillage+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"eta"+dataParsed[i].idvillage+"\" > "+dataParsed[i].etat_village+"</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "<button class=\"btn btn-success\" value=\""+dataParsed[i].idvillage+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showChefDevillage(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#showchef\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-eye\"> Chef</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n"+
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].idvillage+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showEditVillage(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editVillage\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+dataParsed[i].idvillage+"\" onclick=\"DelVillage(this)\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"> Del</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\n" +
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t</tr>";
                    }
                    $("#tbody").html(html);

                }catch (e)
                {

                }
            });
        }

        else {
            $.get("village/search", {
                item: $("#searchVillage").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for (var i = 0; i < dataParsed.length; i++) {
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id" + dataParsed[i].idvillage + "\" > " + dataParsed[i].idvillage + "</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom" + dataParsed[i].idvillage + "\" >  " + dataParsed[i].nomvillage + "</td>\n" +
                            "\t\t\t\t\t\t<td id=\"eta" + dataParsed[i].idvillage + "\" > " + dataParsed[i].etat_village + "</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "<button class=\"btn btn-success\" value=\"" + dataParsed[i].idvillage + "\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showChefDevillage(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#showchef\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-eye\"> Chef</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\"" + dataParsed[i].idvillage + "\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showEditVillage(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editVillage\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\"" + dataParsed[i].idvillage + "\" onclick=\"DelVillage(this)\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"> Del</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\n" +
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t</tr>";
                    }
                    $("#tbody").html(html);

                } catch (e) {

                }
            });
        }

    });


    ///VILLAGE END
});

function showEditVillage(e) {
    loaderStart();
    $.get('village/get/'+$(e).val()).done(function (data) {
   //console.log(data)

        if(data == 0)
        {
           loaderEnd();
            alert('CHEICK CONNEXION');
        }
        else
        {
           loaderEnd();
            var dataParsed = JSON.parse(data);
            var village  = dataParsed.village;
            var clients  = dataParsed.clients;
            var html = "<option value=\"\" selected hidden>Chef ...</option>";
            for(var i = 0; i < clients.length; i++)
            {
                html += "<option value='"+clients[i].idClient+"'>"+clients[i].nomcomplet+"</option>"
            }
            $("#chefdevillageEdit").html(html);
            $("#nomvillageEdit").val(village.nomvillage);
            $("#idvillageEdit").val(village.idvillage);
            $("#etatvillageEdit").val(village.etat_village)
            $("#ancienChefId").val(village.chef.idClient)
            $("#chefdevillageEdit").val(village.chef.idClient)
        }
    });

}
function DelVillage(e) {
    if(confirm("Voulez vous suprimer le village"))
    {
        loaderStart();
        $.get('village/delete/'+$(e).val()).done(function (data) {
            console.log(data)

            if(data == 1)
            {
                loaderEnd();
                $(e).parent().parent().html("");
                myAlert("Village suprimer avec success","success");
            }
            else
            {
                loaderEnd();
                alert("Error internal")
            }
        }).fail(function (err) {
            loaderEnd();
            alert("Error networking");
        });
    }
}
function showChefDevillage(e) {

        loaderStart();
        $.get('village/showChef/'+$(e).val()).done(function (data) {
            console.log(data)
            try
            {
                loaderEnd();
                var dataparsed = JSON.parse(data);
                $("#showChefVillagePopup").modal('show');
                $("#textShowChefVillage").html(dataparsed.nomcomplet)
            }catch (e)
            {
                loaderEnd();
                myAlert("C'est un nouveau village pas de chef pour l'instant","danger");
            }
        }).fail(function (err) {
            loaderEnd();
            alert("Error networking");
        });
}


/*
CLEAN ALL INPUT VILLAGE ADD AND EDIT
 */
function cleanVillage() {
    $("#nomvillageAdd") .val('');
    $("#etatvillageAdd") .val('');
    $("#nomvillageEdit") .val('');
    $("#etatvillageEdit") .val('');
    $("#idvillageEdit") .val('');
    $("#ancienChefId") .val('');
    $("#chefdevillageEdit") .val('');
}

