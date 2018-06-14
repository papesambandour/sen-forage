/**
 * LOADER
 */
//$("#tecnologi").modal('show');

$(function () {

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
                   "\t\t\t\t\t\t<td id=\"id"+data+"\" > "+data+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"nom"+data+"\" >  "+formData.nomclientAdd+"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"village"+data+"\" > "+$("#villageClientAdd option:selected").text() +"</td>\n" +
                   "\t\t\t\t\t\t<td id=\"etat"+data+"\" > "+formData.etatclientAdd +"</td>\n" +
                   "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
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
                $("#id"+id ).html($("#idclientEdit").val());
                $("#nom"+id ).html($("#nomclientEdit").val());
                $("#etat"+id ).html($("#etatclientEdit").val());
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

//SEARCH VILLAGE
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
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > "+dataParsed[i].idClient+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+dataParsed[i].etat_client+"</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
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
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > "+dataParsed[i].idClient+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+dataParsed[i].etat_client+"</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
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
                    html += "<tr>\n" +
                        "\t\t\t\t\t\t<td id=\"id"+dataParsed[i].idClient+"\" > "+dataParsed[i].idClient+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" >  "+dataParsed[i].nomcomplet+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"village"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage +"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" > "+dataParsed[i].etat_client+"</td>\n" +
                        "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
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

/*
CLEAN ALL INPUT VILLAGE ADD AND EDIT
 */
function cleanclient() {
    $("#nomclientAdd") .val('');
    $("#villageClientAdd") .val('');
    $("#etatclientAdd") .val('');

    $("#idclientEdit") .val('');
    $("#nomclientEdit") .val('');
    $("#villageClientEdit") .val('');
    $("#etatclientEdit") .val('');
}

