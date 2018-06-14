/**
 * LOADER
 */
//$("#tecnologi").modal('show');
function loaderEnd() {
    $("#loader").hide()
}
function loaderStart() {
    $("#loader").show()
}
loaderEnd();

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

/**
 * Prend un objet jquery de type form
 * @param Form
 */
function getParamsForm(Form) {
    var forms = Form.serializeArray();
    var data= {};
    for(var i = 0 ;  i < forms.length ; i++)
    {
        var item = forms[i];
        data[item.name] = item.value;
    }
    return data ;
}