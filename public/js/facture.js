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
    $("#searchFacture").on("keyup",function (e) {
        loaderStart();
        if($("#searchFacture").val() === '')
        {
            $.get("facture/gets",{
                item : $("#searchFacture").val()
            }).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var   etatpayment = dataParsed[i].facture.payee == 1 ? '<div class="etatTrans"><div class="oui"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><div class="non" style="display: none"><div class="textNon">NON</div><div class="banbeGris"></div></div><input  type="checkbox" checked="checked" value="'+dataParsed[i].facture.idfacture+'">t</div>' : '<div class="etatTrans"><div class="non"><div class="textNon">NON</div><div class="banbeGris"></div></div><div class="oui" style="display: none"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><input  type="checkbox"  value="'+dataParsed[i].facture.idfacture+'"></div>';
                        // alert('oo')
                        html += '<tr>\n' +
                            '\t\t\t\t\t\t<td >FACT-'+dataParsed[i].facture.idfacture+'</td>\n' +
                            '\t\t\t\t\t\t<td >  '+dataParsed[i].nomcomplet +'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_htcc+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.consommation+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.taxe+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_ttc+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+etatpayment+'\n' +
                            '\t\t\t\t\t\t</td>\n' +
                            '\t\t\t\t\t\t<td>\n' +
                            '\t\t\t\t\t\t\t<button class="btn btn-primary btn-sm" value="'+dataParsed[i].facture.idfacture+'" data-idc="'+dataParsed[i].idClient+'" onclick="exporter(this)"><i class="far fa-file-pdf"> Exporter</i></button>\n' +
                            '\t\t\t\t\t\t</td>\n' +
                            '\n' +
                            '\t\t\t\t\t</tr>';
                    }
                    $("#tbody").html(html);
                }catch (e)
                {

                }
            });
        }

        else {
            $.get("facture/search/"+$("#searchFacture").val()).done(function (data) {
                loaderEnd();
                try {
                    var dataParsed = JSON.parse(data);
                    var html = "";
                    for(var i = 0 ; i < dataParsed.length ; i++)
                    {
                        var   etatpayment = dataParsed[i].facture.payee == 1 ? '<div class="etatTrans"><div class="oui"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><div class="non" style="display: none"><div class="textNon">NON</div><div class="banbeGris"></div></div><input  type="checkbox" checked="checked" value="'+dataParsed[i].facture.idfacture+'">t</div>' : '<div class="etatTrans"><div class="non"><div class="textNon">NON</div><div class="banbeGris"></div></div><div class="oui" style="display: none"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><input  type="checkbox"  value="'+dataParsed[i].facture.idfacture+'"></div>';
                        // alert('oo')
                        html += '<tr>\n' +
                            '\t\t\t\t\t\t<td >FACT-'+dataParsed[i].facture.idfacture+'</td>\n' +
                            '\t\t\t\t\t\t<td >  '+dataParsed[i].nomcomplet +'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_htcc+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.consommation+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.taxe+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_ttc+'</td>\n' +
                            '\t\t\t\t\t\t<td > '+etatpayment+'\n' +
                            '\t\t\t\t\t\t</td>\n' +
                            '\t\t\t\t\t\t<td>\n' +
                            '\t\t\t\t\t\t\t<button class="btn btn-primary btn-sm" value="'+dataParsed[i].facture.idfacture+'" data-idc="'+dataParsed[i].idClient+'" onclick="exporter(this)"><i class="far fa-file-pdf"> Exporter</i></button>\n' +
                            '\t\t\t\t\t\t</td>\n' +
                            '\n' +
                            '\t\t\t\t\t</tr>';
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

            loaderEnd();
            //console.log(data)
            try {
                var dataParsed = JSON.parse(data);
                console.log(dataParsed);
                var html = "";
                for(var i = 0 ; i < dataParsed.length ; i++)
                {
                  var   etatpayment = dataParsed[i].facture.payee == 1 ? '<div class="etatTrans"><div class="oui"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><div class="non" style="display: none"><div class="textNon">NON</div><div class="banbeGris"></div></div><input  type="checkbox" checked="checked" value="'+dataParsed[i].facture.idfacture+'">t</div>' : '<div class="etatTrans"><div class="non"><div class="textNon">NON</div><div class="banbeGris"></div></div><div class="oui" style="display: none"><div class="banbeBlu"></div><div class="textOui">OUI</div></div><input  type="checkbox"  value="'+dataParsed[i].facture.idfacture+'"></div>';
                   // alert('oo')
                    html += '<tr>\n' +
                        '\t\t\t\t\t\t<td >FACT-'+dataParsed[i].facture.idfacture+'</td>\n' +
                        '\t\t\t\t\t\t<td >  '+dataParsed[i].nomcomplet +'</td>\n' +
                        '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_htcc+'</td>\n' +
                        '\t\t\t\t\t\t<td > '+dataParsed[i].facture.consommation+'</td>\n' +
                        '\t\t\t\t\t\t<td > '+dataParsed[i].facture.taxe+'</td>\n' +
                        '\t\t\t\t\t\t<td > '+dataParsed[i].facture.prix_ttc+'</td>\n' +
                        '\t\t\t\t\t\t<td > '+etatpayment+'\n' +
                        '\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t<button class="btn btn-primary btn-sm" value="'+dataParsed[i].facture.idfacture+'" data-idc="'+dataParsed[i].idClient+'" onclick="exporter(this)"><i class="far fa-file-pdf"> Exporter</i></button>\n' +
                        '\t\t\t\t\t\t</td>\n' +
                        '\n' +
                        '\t\t\t\t\t</tr>';
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




