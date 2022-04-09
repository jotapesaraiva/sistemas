var save_method; //for save method string
var table;
var href = window.location.href;
$(document).ready(function() {
    table = $('#table').DataTable({
        // "dom": "Bfrtip";
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        //"processing": true, //Feature control the processing indicator.
        // "serverSide": true, //Feature control DataTables' server-side processing mode.
        // "responsive": true,   // enable responsive
        "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        },
        "ajax": {
            url : href+"/ambiente_list",//json datasource
            type : 'GET', //type of method  , by default would be get
            error: function(){ // error handling code
                $("#employee_grid_processing").css("display","none");
            },
        },
        // setup buttons extentension: http://datatables.net/extensions/buttons/
        "buttons": [
            { extend: 'print', className: 'btn default' },
            { extend: 'csv', className: 'btn default' },
            { extend: 'pdf', className: 'btn default' },
            { text: '<i class="fa fa-plus"></i> Adicionar',
              className: 'btn default',
              action: function ( e, dt, node, config ) {
              //dt.ajax.reload();
              // alert('Custom Button');
              add_person();
              }
        }],
        "order": [[1, 'asc']],
        //Set column definition initialisation properties.
        "columnDefs": [{
              "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },],
    });
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next('.help-block').empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next('.help-block').empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next('.help-block').empty();
    });
});

function add_person() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Adicionar Ambiente'); // Set Title to Bootstrap modal title
}

function edit_person(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : href+"/ambiente_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id"]').val(data.id_ambiente);
            $('[name="nome"]').val(data.nome_ambiente);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Ambiente'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Erro ao pegar os dados do ajax');
        }
    });
}

function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax
}

function save(){
    $('#btnSave').text('Salvando...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    if(save_method == 'add') {
        url = href+"/ambiente_add";
    } else {
        url = href+"/ambiente_update";
    }
    //console.log($('#form').serialize());
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data) {
            if(data.status){ //if success close modal and reload ajax table
                $('#msgs').html('<div class="custom-alerts alert alert-info fade in" id="myAlert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Acesso adicionado com sucesso !!!</div>');
                $("#myAlert").fadeOut(4000);
                $('#modal_form').modal('hide');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parents("div[class=form-group]").addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').siblings(".help-block").text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Salvar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('Salvo'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }
    });
}

function delete_person(id){
    if(confirm('Você tem certeza que quer deletar o item?')) {
        // ajax delete data to database
        $.ajax({
            url : href+"/ambiente_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#msgs').html('<div class="custom-alerts alert alert-info fade in" id="myAlert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Acesso deletado com sucesso !!!</div>');
                $("#myAlert").fadeOut(4000);
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Erro ao deletar os dados');
            }
        });

    }
}
