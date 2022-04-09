var href = window.location.href;
function equipe_selecionada() {
    var the_value = document.getElementById("celula").value;
    result_celula = the_value.replace(/\s+/g, '-');
    console.log('equipe ' +result_celula);
    $.ajax({
         url : href+'dashboard/equipe/'+result_celula,
         type: "GET",
         dataType: "JSON",
        success: function( data ) {
            console.table(data);
            //var option_list = [["", "--- Select One ---"]].concat(data);
            $("#equipe").empty();
            $.each(data, function (index, item) {
                    $("#equipe")
                        .append($("<option></option>")
                            .attr("value", item.EQUIPE)
                            .text(item.EQUIPE));
                });
            $('#equipe').selectpicker('refresh');
        }
    });
}

function projeto_selecionada() {
var value_celula = document.getElementById("celula").value;
var value_equipe = document.getElementById("equipe").value;
result_celula = value_celula.replace(/\s+/g, '-');
result_equipe = value_equipe.replace(/\s+/g, '-');
console.log('projeto: ' +result_celula);
console.log('projeto: ' +result_equipe);
    $.ajax({
        url : href+'dashboard/projeto/' +result_celula+ '/'+result_equipe,
        type: "GET",
        dataType: "JSON",
        success: function( data ) {
            console.table(data);
            //var option_list = [["", "--- Select One ---"]].concat(data);
            $("#projetos").empty();
            $.each(data, function (index, item) {
                    $("#projetos")
                    .append($("<option></option>")
                        .attr("value", item.ID)
                        .text(item.NAME));
                });
            $('#projetos').selectpicker('refresh');
            }
    });
}
