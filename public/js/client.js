/**
 * LOADER
 */
//$("#tecnologi").modal('show');

$(function () {

    ///ABBONNEMENT START
    $('#addAbonClient').on('hidden.bs.modal', function () {

       /* $.get('village/gets').done(function (data) {
            loaderEnd();
           var dataParsed = JSON.parse(data);
           var html = '<option value="" selected hidden>...</option>';
           for(var i = 0 ;i < dataParsed.length; i++)
           {
              html += '<option value="'+dataParsed[i].idvillage+'">'+dataParsed[i].nomvillage+'</option>'
           }
           $("#villageabonnee").html(html);
        }).fail(function (err) {
            loaderEnd();
            alert("ERROR NETWOKING !!!");
        })*/
      cleanabonClien();
    });
    $("#fmrAddAbonn").on("submit",function (e) {
        e.preventDefault();
        loaderStart();
        var formData = getParamsForm($(this));
        $.post("abonnement/create",formData).
            done(function (data) {
                console.log(data);
                if(data == 1)
                {
                    loaderEnd();
                    $('#addAbonClient').modal('hide');
                    myAlert("Aboonement ajouter avec success","success");
                    cleanabonClien();
                    $("#etat"+formData.idclientabonnee).html("<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\">OUI</label>");
                }else if(data = 2)
                {
                    loaderEnd();
                    $('#addAbonClient').modal('hide');
                    myAlert("Aboonement mise a jour avec success","success");
                    cleanabonClien();
                }
                else{
                    loaderEnd();
                    alert("ERROR INTERNAL");
                }

        }).fail(function (err) {
            loaderEnd();
            alert("ERROR NETWORKING");
        })

    })
  /*  $("#villageabonnee").on("change",function (e) {
        $.get("client/cliNonAbonByIdVig/"+ $("#villageabonnee").val())
            .done(function (data) {
                loaderEnd();
                var dataParsed = JSON.parse(data);
                var html = '<option value="" selected hidden>...</option>';
                for(var i = 0 ;i < dataParsed.length; i++)
                {
                    html += '<option value="'+dataParsed[i].idClient+'">'+dataParsed[i].nomcomplet+'</option>'
                }
                $("#clientabonnee").html(html);
                $("#dateAbonement")[0].valueAsDate = new Date()
            })

    });*/

    ///VILLAGE START
    $('#addClient').on('shown.bs.modal', function () {
        loaderStart();
        $.get('village/gets').done(function (data) {
            loaderEnd();
           var dataParsed = JSON.parse(data);
           var html = '<option value="" selected hidden>...</option>';
           for(var i = 0 ;i < dataParsed.length; i++)
           {
              html += '<option value="'+dataParsed[i].idvillage+'">'+dataParsed[i].nomvillage+'</option>'
           }
           $("#villageClientAdd").html(html);
        }).fail(function (err) {
            loaderEnd();
            alert("ERROR NETWOKING !!!");
        })
    });
 $('#editClient').on('hidden.bs.modal', function () {
     $("#villageClientEdit").removeAttr("disabled",true);
    });


    //VILLAGE ADD
    $("#fmrAddclient").on("submit",function (e) {
        e.preventDefault();
        loaderStart();

       var formData =  getParamsForm($(this));
        console.log(formData)
        $.post("client/create",formData
        ).done(function (data) {
            console.log(data)
            if(data >= 1)
            {
               var html = "<tr>\n" +
                   "\t\t\t\t\t\t<td id=\"id"+data+"\" > CLI-"+data+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"nom"+data+"\" >  "+formData.nomclientAdd+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"village"+data+"\" > "+$("#villageClientAdd option:selected").text() +"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"tel"+data+"\" > "+formData.telclientAdd +"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"adresse"+data+"\" > "+formData.adresseclientAdd +"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"etat"+data+"\" > <label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                   "    padding: 9px\" >NON</label></td>\n" +
                   "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                   "<button class=\"btn btn-success\" value=\""+data+"\"\n" +
                   "\t\t\t\t\t\t\t\t\tonclick=\"showAddAbonnement(this)\"\n" +
                   "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addAbonClient\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-cog\"> Abonnement</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n" +
                   "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+data+"\"\n" +
                   "\t\t\t\t\t\t\t\t\tonclick=\"showEditClient(this)\"\n" +
                   "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editClient\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n" +
                   "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+data+"\" onclick=\"DelClient(this)\">\n" +
                   "\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"> Del</i>\n" +
                   "\t\t\t\t\t\t\t</button>\n" +
                   "\n" +
                   "\t\t\t\t\t\t</td>\n" +
                   "\t\t\t\t\t</tr>";


                $("#tbody").append(html);
                loaderEnd();
                cleanclient();
                $("#addClient").modal("hide");
                myAlert("Client ajouter avec success","success");
            }
            else if (data == -1){
                loaderEnd();
                cleanclient();
                $("#addClient").modal("hide");
                myAlert("Client ajouter avec success","success");
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

    $("#fmrEditclient").on("submit",function (e) {
        e.preventDefault();
        $("#villageClientEdit").removeAttr("disabled",true);
        var formData  = getParamsForm($(this));
        $("#villageClientEdit").attr("disabled","disabled");
        loaderStart();
        $.post("client/update/"+$("#idclientEdit") .val(),formData).done(function (data) {
            var id = $("#idclientEdit") .val();
            if(data== 2)
            {
                loaderEnd();
                cleanclient();
                $("#editClient").modal("hide");
                myAlert("Vous ne pouvez pas changer le village pour un chef de village.","danger");
                return ;
            }
            if(data == 1)
            {

                $("#nom"+id ).html($("#nomclientEdit").val());
                $("#tel"+id ).html($("#telclientEdit").val());
                $("#adresse"+id ).html($("#adresseclientEdit").val());
                $("#village"+id ).html($("#villageClientEdit option:selected").text());
                loaderEnd();
                cleanclient();
                $("#editClient").modal("hide");
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

        $("#villageClientEdit").removeAttr("disabled",true);
    });

//SEARCH client
    $("#searchClient").on("keyup",function (e) {
        loaderStart();
        if($("#searchClient").val() === '')
        {
            $.get("client/gets",{
                item : $("#searchClient").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var etatabonne = dataParsed[i].estabonne == 1 ? "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\">OUI</label>" : "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\" >NON</label>";
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > CLI-"+dataParsed[i].idClient+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"adresse"+dataParsed[i].idClient+"\" > "+dataParsed[i].adresse+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+etatabonne+"</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showAddAbonnement(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addAbonClient\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-cog\"> Abonnement</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showEditClient(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editClient\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+dataParsed[i].idClient+"\" onclick=\"DelClient(this)\">\n" +
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
            $.get("client/search", {
                item: $("#searchClient").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var etatabonne = dataParsed[i].estabonne == 1 ? "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\">OUI</label>" : "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\" >NON</label>";
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > CLI-"+dataParsed[i].idClient+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"adresse"+dataParsed[i].idClient+"\" > "+dataParsed[i].adresse+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+etatabonne+"</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showAddAbonnement(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addAbonClient\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-cog\"> Abonnement</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showEditClient(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editClient\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+dataParsed[i].idClient+"\" onclick=\"DelClient(this)\">\n" +
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
//FILTER
    $("#villageInClient").on("change",function () {
        loaderStart();
        $.get("client/filterClientByVilage?villageInClient="+$("#villageInClient").val(),{
            item : $("#searchClient").val()
        }).done(function (data) {
            loaderEnd();
            try {
                var dataParsed = JSON.parse(data);
                var html = "";
                for(var i = 0 ; i < dataParsed.length ; i++)
                {
                    var etatabonne = dataParsed[i].estabonne == 1 ? "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\">OUI</label>" : "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\" >NON</label>";
                    html += "<tr>\n" +
                        "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > CLI-"+dataParsed[i].idClient+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"adresse"+dataParsed[i].idClient+"\" > "+dataParsed[i].adresse+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+etatabonne+"</td>\n" +
                        "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                        "<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                        "\t\t\t\t\t\t\t\t\tonclick=\"showAddAbonnement(this)\"\n" +
                        "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addAbonClient\">\n" +
                        "\t\t\t\t\t\t\t\t<i class=\"fa fa-cog\"> Abonnement</i>\n" +
                        "\t\t\t\t\t\t\t</button>\n" +
                        "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].idClient+"\"\n" +
                        "\t\t\t\t\t\t\t\t\tonclick=\"showEditClient(this)\"\n" +
                        "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#editClient\">\n" +
                        "\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"> Edit</i>\n" +
                        "\t\t\t\t\t\t\t</button>\n" +
                        "\t\t\t\t\t\t\t<button class=\"btn btn-warning\" value=\""+dataParsed[i].idClient+"\" onclick=\"DelClient(this)\">\n" +
                        "\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"> Del</i>\n" +
                        "\t\t\t\t\t\t\t</button>\n" +
                        "\n" +
                        "\t\t\t\t\t\t</td>\n" +
                        "\t\t\t\t\t</tr>";
                }
                $("#tbody").html(html);

            }catch (e)
            {
                loaderEnd();
            }
        });
    });

    ///VILLAGE END
});

function showEditClient(e) {
    loaderStart();
    $.get('client/get/'+$(e).val()).done(function (data) {
   //console.log(data)

        if(data == 0)
        {
           loaderEnd();
            alert('ERREUR INTERNAL');
        }
        else
        {
           loaderEnd();
            var dataParsed = JSON.parse(data);
            var villages  = dataParsed.villages;
            var client  = dataParsed.client;
            console.log(client)

            var html = '<option value="" selected hidden>...</option>';
            for(var i = 0 ;i < villages.length; i++)
            {
                html += '<option value="'+villages[i].idvillage+'">'+villages[i].nomvillage+'</option>'
            }
            $("#villageClientEdit").html(html);

            $("#nomclientEdit").val(client.nomcomplet);
            $("#idclientEdit").val(client.idClient);
            $("#telclientEdit").val(client.tel);
            $("#adresseclientEdit").val(client.adresse);
            $("#villageClientEdit").val(client.village.idvillage);
            $("#etatclientEdit").val(client.etat_client);
            if(client.id_chefvillage === null )
            {
                $("#villageClientEdit").attr("disabled","disabled");
            }
        }
    }).fail(function (err) {
        alert("ERROR NET WORKING")
    });
}
function DelClient(e) {
    if(confirm("Voulez vous suprimer le client"))
    {
        loaderStart();
        $.get('client/delete/'+$(e).val()).done(function (data) {
            console.log(data)

            if(data == 1)
            {
                loaderEnd();
                $(e).parent().parent().html("");
                myAlert("Client suprimer avec success","success");
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
function showAddAbonnement(e) {
     loaderStart();
        $.get('client/getClient/'+$(e).val()).done(function (data) {
            console.log(data)
            loaderEnd();
            var dataParsed = JSON.parse(data);
            if(dataParsed.abonnement != null)
            {
                $("#DescriptionAbon").val(dataParsed.abonnement.description);
                $("#idAbonement").val(dataParsed.abonnement.idabonnement);
                $("#btnAbonPopup").html("Editer");
                $("#numAbon").html("  ABN-" + dataParsed.abonnement.numero);
                $("#dateAbonement")[0].valueAsDate = new Date(dataParsed.abonnement.date_creation)
            }
            else{
                $("#btnAbonPopup").html("Ajouter");
                $("#numAbon").html("");
                $("#dateAbonement")[0].valueAsDate = new Date()
            }

            $("#nomclientabonnee") .val(dataParsed.nomcomplet);
            $("#idclientabonnee") .val(dataParsed.idClient);
            $("#codeclientabonnee") .val('CLI-'+dataParsed.idClient);

        }).fail(function (err) {
            loaderEnd();
            alert("Error networking");
        });

}

/*
CLEAN ALL INPUT VILLAGE ADD AND EDIT
 */
function cleanclient() {
    $("#nomclientAdd") .val('');
    $("#villageClientAdd") .val('');
    $("#etatclientAdd") .val('');
    $("#adresseclientAdd") .val('');
    $("#telclientAdd") .val('');

    $("#idclientEdit") .val('');
    $("#nomclientEdit") .val('');
    $("#villageClientEdit") .val('');
    $("#etatclientEdit") .val('');
    $("#adresseclientEdit") .val('');
    $("#telclientEdit") .val('');
}
function cleanabonClien() {
    $("#nomclientabonnee") .val('');
    $("#idclientabonnee") .val('');
    $("#dateAbonement") .val('');
    $("#DescriptionAbon") .val('');
    $("#idAbonement") .val('');
    $("#codeclientabonnee") .val('');

}

