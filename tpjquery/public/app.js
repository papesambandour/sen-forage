//LOADER
$("#tecnologi").modal('show')
function loaderEnd() {
    $("#loader").hide()
}
function loaderStart() {
    $("#loader").show()
}
loaderEnd();
//serach infiny

///scroll infiny
const loadByPage = 10;
var offsetCount = 0;
var loading = false;
var canLoadMore = true;

$(document).ready(function () {
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        console.log(scrollTop, $(window).height())

        if(($(window).scrollTop() >= $(document).height() - 400 - $(window).height()) && loading === false && canLoadMore){
            loading = true;
            loadMoreGet();
        }
    });

    $("#manualLoad").on('click',function (e) {
        if(canLoadMore)
        {
            loading = true;
            loadMoreGet();
        }
        else
        {
            $(this).attr('disabled',true);
            $(this).text('END OF LIST');
        }

    });
});


function loadMoreGet() {
  loaderStart();

    var offset = offsetCount + loadByPage;
    var url = '/etudiant/infiny?' + `myoffset=${offset}&mylimit=${loadByPage}`;

    $.get(url)
        .done(function(data) {
            offsetCount += loadByPage;
            addHtml(data);
          loaderEnd();
            loading = false;

        })
        .fail(function () {
           loaderEnd();
            loading = false;

        })

}

function addHtml(data) {
    try {
        var jsObject = JSON.parse(data);
        canLoadMore = jsObject.more;
        if(canLoadMore === false)
        {

            $("#manualLoad").attr('disabled',true);
            $("#manualLoad").text('END OF LIST');
        }
        var dataParsed = jsObject.data;

            var html="";
            for(var i = 0 ; i<dataParsed.length; i++)
            {
                html += "<tr>\n" +
                    "                    <td id=\"matetu"+dataParsed[i].id+"\" > "+dataParsed[i].mat+"</td>\n" +
                    "                    <td id=\"nometu"+dataParsed[i].id+"\" > "+dataParsed[i].nom+"</td>\n" +
                    "                    <td id=\"prenometu"+dataParsed[i].id+"\" > "+dataParsed[i].prenom+"</td>\n" +
                    "                    <td id=\"classetu"+dataParsed[i].id+"\" > "+dataParsed[i].class+"</td>\n" +
                    "                    <td style=\"text-align: center\">\n" +
                    "                        <button class=\"btn btn-success\" value=\""+dataParsed[i].id+"\"\n" +
                    "                                onclick=\"showNoteEut(this)\"\n" +
                    "                                data-toggle=\"modal\" data-target=\"#showNote\">\n" +
                    "                            <i class=\"fa fa-eye\"> Note</i>\n" +
                    "                        </button>\n" +
                    "                        <button class=\"btn btn-primary\" value=\""+dataParsed[i].id+"\"\n" +
                    "                                onclick=\"showediteEtu(this)\"\n" +
                    "                                data-toggle=\"modal\" data-target=\"#editEtut\">\n" +
                    "                            <i class=\"fa fa-edit\"> Edit</i>\n" +
                    "                        </button>\n" +
                    "                        <button class=\"btn btn-warning\" value=\""+dataParsed[i].id+"\" onclick=\"DelEtu(this)\">\n" +
                    "                            <i class=\"fa fa-trash\"> Del</i>\n" +
                    "                        </button>\n" +
                    "\n" +
                    "                    </td>\n" +
                    "                </tr>";
            };

            $("#tbody").append(html);


    } catch (e) {
        console.log(e.message)
    }
}

//END SCROLLE INFINY

var btnEdit = null ;

function showediteEtu(e) {
    btnEdit = $(e).val() ;
    $.get('etudiant/show',{
        idE:$(e).val()
    }).done(function (data) {
        console.log(data)
        var dataParsed = jQuery.parseJSON(data);
        $("#matEtEdit").val(dataParsed.mat);
        $("#idEtEdit").val(dataParsed.id);
        $("#nomEtEdit").val(dataParsed.nom);
        $("#prenomEtEdit").val(dataParsed.prenom);
        $("#classEtEdit").val(dataParsed.class);

    });
}
$("#frmEditEtu").on('submit',function (e) {
    e.preventDefault();
    $.get('etudiant/update',{
        idE : $("#idEtEdit").val(),
        mateEtu : $("#matEtEdit").val(),
        nomE : $("#nomEtEdit").val(),
        prenomE :$("#prenomEtEdit").val(),
        classE: $("#classEtEdit").val()
    }).done(function (data) {
        if(data == 1)
        {
            $("#matetu"+btnEdit).html( $("#matEtEdit").val());
            $("#nometu"+btnEdit).html( $("#nomEtEdit").val());
            $("#prenometu"+btnEdit).html( $("#prenomEtEdit").val());
            $("#classetu"+btnEdit).html( $("#classEtEdit").val());
            $("#editEtut").modal('hide');
            btnEdit= null ;
            cleanEditEtu();
            myAlert("Etudiant editer avec success","success")
        }
        else {
            alert('eror internal code 500');
            console.log(data)
        }
    })
});

$('#formAddEtud').on('submit',function (e) {
    e.preventDefault();
    $("#btnAddEtu").attr('disabled','disabled');
    $.get('etudiant/create',{
        matE:$("#matEtAdd").val(),
        nomE:$("#nomEtAdd").val(),
        prenomE:$("#prenomEtAdd").val(),
        classE:$("#classEtAdd").val(),
    }).done(function (data) {
        console.log(data)
        if(data >=0)
        {
            var html = "<tr>\n" +
                "                        <td id=\"matetu"+data+"\"> "+$("#matEtAdd").val()+" </td>\n" +
                "                        <td id=\"nometu"+data+"\" > "+$("#nomEtAdd").val()+"</td>\n" +
                "                        <td id=\"prenometu"+data+"\" > "+$("#prenomEtAdd").val()+"</td>\n" +
                "                        <td id=\"classetu"+data+"\" > "+$("#classEtAdd").val()+"</td>\n" +
                "                        <td style=\"text-align: center\">\n" +
                "<button class=\"btn btn-success\" value=\""+data+"\"\n" +
                "                                    onclick=\"showNoteEut(this)\"\n" +
                "                                    data-toggle=\"modal\" data-target=\"#showNote\">\n" +
                "                                  <i class=\"fa fa-eye\"> Note</i>\n" +
                "                            </button>"+
                "                            <button class=\"btn btn-primary\" value=\""+data+"\"\n" +
                "                                    onclick=\"showediteEtu(this)\"\n" +
                "                                    data-toggle=\"modal\" data-target=\"#editEtut\">\n" +
                "                               <i class=\"fa fa-edit\"> Edit</i>\n" +
                "                            </button>\n" +
                "                            <button class=\"btn btn-warning\" value=\""+data+"\" onclick=\"DelEtu(this)\">\n" +
                "                               <i class=\"fa fa-trash\"> Del</i>\n" +
                "                            </button>\n" +
                "\n" +
                "                        </td>\n" +
                "                    </tr>"

            $("#tabEtu tbody").append(html);
            $("#addEtut").modal('hide');
            cleanAddEtu();
            $("#btnAddEtu").removeAttr('disabled',true);
            //alert('');
            myAlert("Ajout reussit avec success","success");
        }
        else
        {
            alert('eror internal code 500');
            console.log(data)
        }
    }).fail(function () {
        alert("Get connexion network");
        $("#btnAddEtu").removeAttr('disabled',true);
    });


});


function DelEtu(e) {

if(confirm("Voulez vouz suprimer l'etudiant")=== true)
    {
        $.get('etudiant/delete',{
            idE : $(e).val()
        }).done(function (data) {
            if(data == 1)
            {
                $(e).parent().parent().remove();
                myAlert("Etudiant supprimer avec success","success")
            }
            else
            {
                alert('eror internal code 500');
                console.log(data);
            }
        });
    }
}

$("#frmAddNote").on('submit',function (e) {
    e.preventDefault();
    $.get('note/create',{
        valeur : $("#valNote").val(),
        semestre : $("#semNote").val(),
        annee : $("#anneNote").val(),
        matier : $("#matierNote").val(),
        idE : $("#idEtudiant").val(),
    }).done(function (data) {
        $("#addNote").modal('hide');
        if(data== 1)
        {
            $("#idEtudiant").html('');
            cleanAddNote();
            myAlert("Note ajouter avec success","success")
        }
        else
        {
            alert('eror internal code 500');
            console.log(data);
        }
    })
});

function showAddNote(e) {


        $.get('etudiant/gets')
            .done(function (data) {
                console.log(data);
                var dataParsed = jQuery.parseJSON(data);
                var html= '<option value="" selected hidden disabled>Faite votre choix</option>';
                for(var i = 0 ; i < dataParsed.length ;i++)
                {
                    html += '<option value=" '+dataParsed[i].id+' "> '+dataParsed[i].prenom +' '+dataParsed[i].nom+'</option>';
                }
                $("#idEtudiant").html(html);

            });


}
function showNoteEut(e) {
    $.get('note/shownoteetu',
        {
            idEt:$(e).val()
        })
        .done(function (data) {
        var dataParsed = jQuery.parseJSON(data);
        if(dataParsed.length > 0)
        {
            var html= '';
            for(var i = 0 ; i < dataParsed.length ;i++)
            {
                html += '<tr > ' +
                    '<td class="noteEdit" item="valeur" idNote="'+dataParsed[i].id+'"><span>'+dataParsed[i].valeur+'</span> <input class="inputHide" type="hidden" step="0.01" value="'+dataParsed[i].valeur+'"></td>'+
                    '<td class="noteEdit" item="matier" idNote="'+dataParsed[i].id+'"><span>'+dataParsed[i].matier+'</span> <input class="inputHide" type="hidden"  value="'+dataParsed[i].matier+'"></td>'+
                    '<td class="noteEdit" item="semestre" idNote="'+dataParsed[i].id+'"><span>'+dataParsed[i].semestre+'</span> <input class="inputHide" type="hidden" value="'+dataParsed[i].semestre+'"></td>'+
                    '<td class="noteEdit" item="annee" idNote="'+dataParsed[i].id+'"><span>'+dataParsed[i].annee+'</span> <input class="inputHide" type="hidden"  value="'+dataParsed[i].annee+'"></td>'+
                    '</tr>';
            }
            $("#TabNote tbody").append(html);
        }
        else {
            $("#TabNote tbody").html("<tr><td colspan='4' style='text-align: center;font-size: 40px;'>Pas de note pour l'instant. Merci !</td></tr>")
        }


    });
}

function cleanAddEtu() {
    $("#matEtAdd").val('');
       $("#nomEtAdd").val('');
       $("#prenomEtAdd").val('');
        $("#classEtAdd").val('');
}
function cleanEditEtu() {
    $("#matEtEdit").val('');
    $("#idEtEdit").val('');
       $("#nomEtEdit").val('');
       $("#prenomEtEdit").val('');
        $("#classEtEdit").val('');
}
function cleanAddNote() {
    $("#valNote").val('');
    $("#anneNote").val('');
       $("#semNote").val('');
       $("#matierNote").val('');
        $("#idEtudiant").html('');
}


$(function () {
    $(document).on('dblclick','.noteEdit',function () {
        if($(this).attr('item')== 'valeur' || $(this).attr('item')== 'annee' || $(this).attr('item')== 'semestre')
        {
            $(this).children('input').attr('type','number');
        }
        else
        {
            $(this).children('input').attr('type','text');
        }
        $(this).children('span').hide();
        $(this).children('input').focus();

    });

    $(document).on('keypress','.noteEdit',function () {
        if(event.keyCode == 13)
        {
            $(this).children('input').attr('type','hidden');
            $(this).children('span').html($(this).children('input').val());
            $(this).children('span').show();
            $.get('note/updateSelect',{
                idNote:$(this).attr('idNote'),
                itemValue:$(this).children('input').val(),
                item : $(this).attr('item')
            }).done(function (data) {
                console.log(data);
                if(data == 1)
                {
                    console.log('ok')
                }
            });
        }
    });
    $('#showNote').on('hidden.bs.modal', function () {
        $("#TabNote tbody").html('');
    })
    $('#addNote').on('hidden.bs.modal', function () {
        cleanAddNote();
    })
    $('#addEtut').on('hidden.bs.modal', function () {
        cleanAddEtu()
    });
    $('#addEtut').on('shown.bs.modal', function () {
        $.get('etudiant/getmat').done(function (data) {
           // console.log(data)
            if(data > 0)
            {
                $("#matEtAdd").val('MAT'+data);
            }
            else
            {
                alert('CHEICK CONNEXION');
            }
        });
    })

    ///serach
    $("#search").on('keyup',function () {

        if($("#search").val() =='')
        {
            $.get('/etudiant/infiny',{myoffset:0,mylimit:15}).done(function (data) {



                var dataParsed = jQuery.parseJSON(data).data;
                console.log(dataParsed);
                var html="";
                for(var i = 0 ; i<dataParsed.length; i++)
                {
                    html += "<tr>\n" +
                        "                    <td id=\"matetu"+dataParsed[i].id+"\" > "+dataParsed[i].mat+"</td>\n" +
                        "                    <td id=\"nometu"+dataParsed[i].id+"\" > "+dataParsed[i].nom+"</td>\n" +
                        "                    <td id=\"prenometu"+dataParsed[i].id+"\" > "+dataParsed[i].prenom+"</td>\n" +
                        "                    <td id=\"classetu"+dataParsed[i].id+"\" > "+dataParsed[i].class+"</td>\n" +
                        "                    <td style=\"text-align: center\">\n" +
                        "                        <button class=\"btn btn-success\" value=\""+dataParsed[i].id+"\"\n" +
                        "                                onclick=\"showNoteEut(this)\"\n" +
                        "                                data-toggle=\"modal\" data-target=\"#showNote\">\n" +
                        "                            <i class=\"fa fa-eye\"> Note</i>\n" +
                        "                        </button>\n" +
                        "                        <button class=\"btn btn-primary\" value=\""+dataParsed[i].id+"\"\n" +
                        "                                onclick=\"showediteEtu(this)\"\n" +
                        "                                data-toggle=\"modal\" data-target=\"#editEtut\">\n" +
                        "                            <i class=\"fa fa-edit\"> Edit</i>\n" +
                        "                        </button>\n" +
                        "                        <button class=\"btn btn-warning\" value=\""+dataParsed[i].id+"\" onclick=\"DelEtu(this)\">\n" +
                        "                            <i class=\"fa fa-trash\"> Del</i>\n" +
                        "                        </button>\n" +
                        "\n" +
                        "                    </td>\n" +
                        "                </tr>";
                }
                $("#tbody").html(html);
                canLoadMore = true;

            })
        }
        else {
            $.get('/etudiant/search',{item:$("#search").val()}).done(function (data) {
                canLoadMore = false;

                var dataParsed = jQuery.parseJSON(data);
                console.log(dataParsed);
                var html="";
                for(var i = 0 ; i<dataParsed.length; i++)
                {
                    html += "<tr>\n" +
                        "                    <td id=\"matetu"+dataParsed[i].id+"\" > "+dataParsed[i].mat+"</td>\n" +
                        "                    <td id=\"nometu"+dataParsed[i].id+"\" > "+dataParsed[i].nom+"</td>\n" +
                        "                    <td id=\"prenometu"+dataParsed[i].id+"\" > "+dataParsed[i].prenom+"</td>\n" +
                        "                    <td id=\"classetu"+dataParsed[i].id+"\" > "+dataParsed[i].class+"</td>\n" +
                        "                    <td style=\"text-align: center\">\n" +
                        "                        <button class=\"btn btn-success\" value=\""+dataParsed[i].id+"\"\n" +
                        "                                onclick=\"showNoteEut(this)\"\n" +
                        "                                data-toggle=\"modal\" data-target=\"#showNote\">\n" +
                        "                            <i class=\"fa fa-eye\"> Note</i>\n" +
                        "                        </button>\n" +
                        "                        <button class=\"btn btn-primary\" value=\""+dataParsed[i].id+"\"\n" +
                        "                                onclick=\"showediteEtu(this)\"\n" +
                        "                                data-toggle=\"modal\" data-target=\"#editEtut\">\n" +
                        "                            <i class=\"fa fa-edit\"> Edit</i>\n" +
                        "                        </button>\n" +
                        "                        <button class=\"btn btn-warning\" value=\""+dataParsed[i].id+"\" onclick=\"DelEtu(this)\">\n" +
                        "                            <i class=\"fa fa-trash\"> Del</i>\n" +
                        "                        </button>\n" +
                        "\n" +
                        "                    </td>\n" +
                        "                </tr>";
                }
                $("#tbody").html(html)



            })
        }

    });
});

function myAlert(text, classCss) {
    var hml= "<div style='text-align: center' class=\"alert alert-"+classCss+" alert-dismissible fade show\" role=\"alert\">\n" +
        "                    <span >"+text+"</span>\n" +
        "                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
        "                        <span aria-hidden=\"true\">&times;</span>\n" +
        "                    </button>\n" +
        "                </div>";
    $("#alert").html(hml);
    $("#alert").show();
    setTimeout(function () {
        $("#alert").fadeOut(2000);
    },5000)
}