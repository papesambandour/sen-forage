/**
 * LOADER
 */
//$("#tecnologi").modal('show');

$(function () {


    $("#fmraddRelever").on("submit",function (e) {
        e.preventDefault();
        loaderStart();
        var formData = getParamsForm($(this));
        $.post("facture/create",formData).
            done(function (data) {
                console.log(data);
                if(data == 1)
                {
                    loaderEnd();
                    $('#addRelever').modal('hide');
                    myAlert("Relever ajouter avec success","success");
                    cleanRevellerAdd();
                }else if(data = 2)
                {
                    loaderEnd();
                    $('#addRelever').modal('hide');
                    cleanRevellerAdd();
                    myAlert("Relever mise a jour  avec success","success");
                }
                else{
                    loaderEnd();
                    alert("ERROR INTERNAL");
                }

        }).fail(function (err) {
            loaderEnd();
            alert("ERROR NETWORKING");
        })

    });

 $('#addRelever').on('hidden.bs.modal', function () {
     cleanRevellerAdd();
    });


//SEARCH client
    $("#searchCompteur").on("keyup",function (e) {
        loaderStart();
        if($("#searchCompteur").val() === '')
        {
            $.get("compteur/gets",{
                item : $("#searchCompteur").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var estcoupee = dataParsed[i].compteur.estcoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\">OUI</label>" : "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\" >NON</label>";
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"numc"+dataParsed[i].idClient+"\" > CMPT- "+dataParsed[i].compteur.numerocompteur+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"numa"+dataParsed[i].idClient+"\" > ABN- "+dataParsed[i].abonnement.numero+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" > "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"villa"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" >\n" +
                            estcoupee + "\n"+
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].compteur.idcompteur+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showAddRelever(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addRelever\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"> Relevé</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\n" +
                            "\n" +
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t</tr>"
                    }
                    $("#tbody").html(html);
                }catch (e)
                {

                }
            });
        }

        else {
            $.get("compteur/search", {
                item: $("#searchCompteur").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var estcoupee = dataParsed[i].compteur.estcoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\">OUI</label>" : "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                            "    padding: 9px\" >NON</label>";
                        html += "<tr>\n" +
                            "\t\t\t\t\t\t<td id=\"numc"+dataParsed[i].idClient+"\" > CMPT- "+dataParsed[i].compteur.numerocompteur+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"numa"+dataParsed[i].idClient+"\" > ABN- "+dataParsed[i].abonnement.numero+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" > "+dataParsed[i].nomcomplet+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"villa"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                            "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" >\n" +
                            estcoupee + "\n"+
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                            "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].compteur.idcompteur+"\"\n" +
                            "\t\t\t\t\t\t\t\t\tonclick=\"showAddRelever(this)\"\n" +
                            "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addRelever\">\n" +
                            "\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"> Relevé</i>\n" +
                            "\t\t\t\t\t\t\t</button>\n" +
                            "\n" +
                            "\n" +
                            "\t\t\t\t\t\t</td>\n" +
                            "\t\t\t\t\t</tr>"
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
        $.get("compteur/filterClientByVilage?villageInClient="+$("#villageInClient").val(),{
            item : $("#searchClient").val()
        }).done(function (data) {
            loaderEnd();
            //console.log(data)
            try {
                var dataParsed = JSON.parse(data);
                var html = "";
                for(var i = 0 ; i < dataParsed.length ; i++)
                {
                    var estcoupee = dataParsed[i].compteur.estcoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\">OUI</label>" : "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\" >NON</label>";
                    html += "<tr>\n" +
                        "\t\t\t\t\t\t<td id=\"numc"+dataParsed[i].idClient+"\" > CMPT- "+dataParsed[i].compteur.numerocompteur+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"numa"+dataParsed[i].idClient+"\" > ABN- "+dataParsed[i].abonnement.numero+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"nom"+dataParsed[i].idClient+"\" > "+dataParsed[i].nomcomplet+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"villa"+dataParsed[i].idClient+"\" > "+dataParsed[i].village.nomvillage+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"tel"+dataParsed[i].idClient+"\" > "+dataParsed[i].tel+"</td>\n" +
                        "\t\t\t\t\t\t<td id=\"etat"+dataParsed[i].idClient+"\" >\n" +
                        estcoupee + "\n"+
                        "\t\t\t\t\t\t</td>\n" +
                        "\t\t\t\t\t\t<td style=\"text-align: center\">\n" +
                        "\t\t\t\t\t\t\t<button class=\"btn btn-success\" value=\""+dataParsed[i].compteur.idcompteur+"\"\n" +
                        "\t\t\t\t\t\t\t\t\tonclick=\"showAddRelever(this)\"\n" +
                        "\t\t\t\t\t\t\t\t\tdata-toggle=\"modal\" data-target=\"#addRelever\">\n" +
                        "\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"> Relevé</i>\n" +
                        "\t\t\t\t\t\t\t</button>\n" +
                        "\n" +
                        "\n" +
                        "\t\t\t\t\t\t</td>\n" +
                        "\t\t\t\t\t</tr>"
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
function showAddRelever(e) {
     loaderStart();
    // var numc = $(e).closest('tr').attr('data-numc');
   //  alert(numc);
   /* $(e).closest('tr').find ('td').each(function (index, elem) {
        $(elem).text(client[$(elem).attr('data-columname')])
    });
*/

        $.get('compteur/get/'+$(e).val()).
        done(function (data) {

            var datemy= new Date()
            var htmlAns = "<option value='"+datemy.getFullYear()+"'>"+datemy.getFullYear()+"</option>";
           var  htmlMois = "<option value='"+(datemy.getMonth() + 1)+"'>"+getLibMonth(datemy.getMonth())+"</option>";
            $("#anneerelever").html(htmlAns);
            $("#moisrelever").html(htmlMois);
          //  console.log(html)
            var dataParsed = JSON.parse(data);
            $("#cccmpt").val(dataParsed.consommationl + " métre cube ("+  dataParsed.consommationc+" m3)");
            $("#idCompteur").val(dataParsed.idcompteur);
            if(dataParsed.facture){
                $("#cMensuelcmpt").val(dataParsed.facture.consommation);
                $('#addRev').text('Editer');
            }else {
                $("#cMensuelcmpt").val('');
                $('#addRev').text('Ajouter');
            }


            loaderEnd();
        }).fail(function (err) {
            loaderEnd();
            alert("Error networking");
        });
}

/*
CLEAN ALL INPUT VILLAGE ADD AND EDIT
 */

function cleanRevellerAdd() {
    $("#cMensuelcmpt") .val('');
    $("#idCompteur") .val('');
    $("#moisrelever") .val('');
    $("#anneerelever") .val('');

}

function getLibMonth(mois) {
    if(mois == 0)
    {
        return 'Janvier';
    }if(mois == 1)
    {
        return 'Février';
    }if(mois == 2)
    {
        return 'Mars';
    }if(mois == 3)
    {
        return 'Avril';
    }if(mois == 4)
    {
        return 'Mai';
    }if(mois == 5)
    {
        return 'Juin';
    }if(mois == 6)
    {
        return 'Juillet';
    }if(mois == 7)
    {
        return 'Aout';
    }if(mois == 8)
    {
        return 'Septembre';
    }if(mois == 9)
    {
        return 'Octobre';
    }if(mois == 10)
    {
        return 'Novenmbre';
    }if(mois == 11)
    {
        return 'Décembre';
    }
}

