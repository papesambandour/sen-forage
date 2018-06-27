/**
 * LOADER
 */
//$("#tecnologi").modal('show');

$(function () {


    /////////BOUTON ETAT TRANSFERT running or success///////////
    $(document).on('click','.etatTrans', function () {

        var idFcture = $(this).children('input').val();
        var myThis =   $(this) ;
        // alert("ddd")

        if($(this).children('input').is(':checked'))
        {
            if(confirm("VOULEZ CONFIRMER L'ANNULLEMENT DU PAYEMENT DE LA FACTURE ")) {
                loaderStart();
                $.get('facture/update/'+idFcture, {
                    state: 0,
                }).done(function (resultChangeSate) {
                    loaderEnd();
                    console.log(resultChangeSate);
                    myThis.children('input').removeAttr("checked");
                    myThis.children('.oui').css('display', 'none');
                    myThis.children('.non').css('display', 'block');
                }).fail(function (jqXHR, exception) {
                    loaderEnd();
                    alert("Verifier votre connexion");
                });
            }
        }else if(!$(this).children('input').is(':checked'))
        {
            if(confirm("VOULEZ CONFIRMER LE PAYEMENT DU CLIENT ")) {
                loaderStart();
                $.get('/facture/update/'+idFcture, {
                    state: 1,
                }).done(function (resultChangeSate) {
                    loaderEnd();
                    console.log(resultChangeSate);
                    myThis.children('input').attr("checked", "checked");
                    myThis.children('.oui').css('display', 'block');
                    myThis.children('.non').css('display', 'none');
                }).fail(function (jqXHR, exception) {
                    loaderEnd()
                    alert("Verifier votre connexion");
                });
            }
        }



    });




//SEARCH client
    $("#searchCompteur").on("keyup",function (e) {
        loaderStart();
        if($("#searchFacture").val() === '')
        {
            $.get("facture/gets",{
                item : $("#searchCompteur").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var estcoupee = dataParsed[i].compteur.escoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
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
            $.get("facture/search", {
                item: $("#searchCompteur").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var estcoupee = dataParsed[i].compteur.escoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
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
    $("#villageInClient, #year, #month").on("change",function () {
        loaderStart();
        $.get("facture/filterClientByVilage?villageInClient="+$("#villageInClient").val(),{
            item : $("#searchClient").val(),
            year : $("#year").val(),
            month : $("#month").val(),
        }).done(function (data) {
            console.log(data);
            loaderEnd();
            //console.log(data)
            try {
                var dataParsed = JSON.parse(data);
                var html = "";
                for(var i = 0 ; i < dataParsed.length ; i++)
                {
                    var estcoupee = dataParsed[i].compteur.escoupe == 1 ? "<label style=\"background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\">OUI</label>" : "<label style=\"background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);\n" +
                        "    padding: 9px\" >NON</label>";
                    html +='<tr>\n' +
                        '\t\t\t\t\t\t<td id="id'+dataParsed[i].idClient+'" >FACT-'+dataParsed[i].facture.idfacture+'</td>\n' +
                        '\t\t\t\t\t\t<td id="nom'+dataParsed[i].idClient+'" > '+dataParsed[i].nomcomplet+'</td>\n' +
                        '\t\t\t\t\t\t<td id="tel'+dataParsed[i].idClient+'" > '+dataParsed[i].tel+'</td>\n' +
                        '\t\t\t\t\t\t<td id="adresse'+dataParsed[i].idClient+'" > '+dataParsed[i].adresse+'</td>\n' +
                        '\t\t\t\t\t\t<td id="etat{$ligne.idClient}" >\n' +
                        '\t\t\t\t\t\t\t{if $ligne.facture.payee == "1"}\n' +
                        '\t\t\t\t\t\t\t\t<div class="etatTrans">\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="oui">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<div class="banbeBlu">\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<div class="textOui">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\tOUI\n' +
                        '\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="non" style="display: none">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<div class="textNon">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\tNON\n' +
                        '\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<div class="banbeGris">\n' +
                        '\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t\t\t<input  type="checkbox" checked="checked" value="{$ligne.facture.idfacture}">\n' +
                        '\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t{/if}\n' +
                        '\t\t\t\t\t\t\t{if $ligne.facture.payee  == "0"}\n' +
                        '\t\t\t\t\t\t\t<div class="etatTrans">\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t\t<div class="non">\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="textNon">\n' +
                        '\t\t\t\t\t\t\t\t\t\tNON\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="banbeGris">\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t<div class="oui" style="display: none">\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="banbeBlu">\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t<div class="textOui">\n' +
                        '\t\t\t\t\t\t\t\t\t\tOUI\n' +
                        '\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t</div>\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t\t<input  type="checkbox"  value="{$ligne.facture.idfacture}">\n' +
                        '\t\t\t\t\t\t\t</div>\n' +
                        '\n' +
                        '\n' +
                        '\t\t\t\t\t\t\t{/if}\n' +
                        '\t\t\t\t\t\t</td>'
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

function exporter(e) {
    var  idFacture= $(e).val();
    var idclient = $(e).attr('data-idc');
    //alert("id facture : "+ idFacture +" | id client : "+ idclient)
    var page = "facture/export?idc="+idclient+"&idf="+idFacture;
    window.location = page;

}
function exportmonth(e) {
    var page = "facture/exportmonth";
    window.location = page;

}




