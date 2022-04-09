var save_method; //for save method string
var table;
var max = 2;
// var link_max = 3;
var doc = 0;
var lnk = 0;
var tpl_tipo_sistema,
    tpl_documentacao,
    tpl_negocio,
    $target_documentacao,
    $target_tipo_sistema,
    $target_negocio;
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
            url : href+"/sistema_list",//json datasource
            type : 'GET', //type of method  , by default would be get
            error: function(){ // error handling code
                $("#employee_grid_processing").css("display","none");
            },
        },
        // setup buttons extentension: http://datatables.net/extensions/buttons/
        "buttons": [
            { extend: 'print', text:'<i class="fa fa-print"></i> Print', className: 'btn default' },
            { extend: 'csv', text:'<i class="fa fa-file-excel-o"></i> CSV', className: 'btn default' },
            { extend: 'pdf', text:'<i class="fa fa-file-pdf-o"></i> PDF', className: 'btn default' },
            { text: '<i class="fa fa-plus"></i> Adicionar',
              className: 'btn default',
              action: function ( e, dt, node, config ) {
              //dt.ajax.reload();
              // alert('Custom Button');
              add_sistema();
              }
        }],
        "order": [[1, 'asc']],
        //Set column definition initialisation properties.
        "columnDefs": [{
              "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },{
            "targets": [0],
            "width": "17%",
        },{
            "targets": [1],
            "width": "70%",
        },{
            "targets": [3],
            "width": "13%",
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

function view(id) {

    var template_sistema = $("#row_sistema").html(),
        // template_cluster = $("#row_cluster").html(),
        template_servico = $("#row_servico").html(),  // referencia do template
        template_managed = $("#row_managed").html(),
        template_datasource = $("#row_datasource").html(),  // referencia do template
        template_documentacao = $("#row_documentacao_p").html(),  // referencia do template
        template_certificado = $("#row_certificado").html(),

        template_servico_t = $("#row_servico_t").html(),  // referencia do template
        template_managed_t = $("#row_managed_t").html(),
        template_datasource_t = $("#row_datasource_t").html(),  // referencia do template
        template_certificado_t = $("#row_certificado_t").html(),

        template_servico_h = $("#row_servico_h").html(),  // referencia do template
        template_managed_h = $("#row_managed_h").html(),
        template_datasource_h = $("#row_datasource_h").html(),  // referencia do template
        template_certificado_h = $("#row_certificado_h").html(),

        template_servico_d = $("#row_servico_d").html(),  // referencia do template
        template_managed_d = $("#row_managed_d").html(),
        template_datasource_d = $("#row_datasource_d").html(),  // referencia do template
        template_certificado_d = $("#row_certificado_d").html(),

        $target_sistema = $(".dynamic-sistema"),           // onde ele ira aparecer
        // $target_cluster = $(".dynamic-cluster"),           // onde ele ira aparecer
        $target_servico = $(".dynamic-servico"),           // onde ele ira aparecer
        $target_managed = $(".dynamic-managed"),           // onde ele ira aparecer
        $target_datasource = $(".dynamic-datasource"),           // onde ele ira aparecer
        $target_documentacao = $(".dynamic-documentacao-p"),           // onde ele ira aparecer
        $target_certificado = $(".dynamic-certificado");           // onde ele ira aparecer

        $target_servico_t = $(".dynamic-servico-t"),           // onde ele ira aparecer
        $target_managed_t = $(".dynamic-managed-t"),           // onde ele ira aparecer
        $target_datasource_t = $(".dynamic-datasource-t"),           // onde ele ira aparecer
        $target_certificado_t = $(".dynamic-certificado-t");           // onde ele ira aparecer

        $target_servico_h = $(".dynamic-servico-h"),           // onde ele ira aparecer
        $target_managed_h = $(".dynamic-managed-h"),           // onde ele ira aparecer
        $target_datasource_h = $(".dynamic-datasource-h"),           // onde ele ira aparecer
        $target_certificado_h = $(".dynamic-certificado-h");           // onde ele ira aparecer

        $target_servico_d = $(".dynamic-servico-d"),           // onde ele ira aparecer
        $target_managed_d = $(".dynamic-managed-d"),           // onde ele ira aparecer
        $target_datasource_d = $(".dynamic-datasource-d"),           // onde ele ira aparecer
        $target_certificado_d = $(".dynamic-certificado-d");           // onde ele ira aparecer

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.row_sistema').remove();
    $('.row_servico').remove();
    // $('.row_cluster').remove();
    $('.row_managed').remove();
    $('.row_datasource').remove();
    $('.row_documentacao_p').remove();

    $('.row_servico_t').remove();
    $('.row_managed_t').remove();
    $('.row_datasource_t').remove();
    $('.row_certificado_t').remove();

    $.ajax({
        url : href+"/sistema_view/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            // console.log(template_servico);
            $target_sistema.append(Mustache.to_html(template_sistema, data));
            // $target_cluster.append(Mustache.to_html(template_cluster, data));
            $target_managed.append(Mustache.to_html(template_managed, data));
            $target_servico.append(Mustache.to_html(template_servico, data));
            $target_datasource.append(Mustache.to_html(template_datasource, data));
            $target_documentacao.append(Mustache.to_html(template_documentacao, data));
            $target_certificado.append(Mustache.to_html(template_certificado, data));

            $target_managed_t.append(Mustache.to_html(template_managed_t, data));
            $target_servico_t.append(Mustache.to_html(template_servico_t, data));
            $target_datasource_t.append(Mustache.to_html(template_datasource_t, data));
            $target_certificado_t.append(Mustache.to_html(template_certificado_t, data));

            $target_managed_h.append(Mustache.to_html(template_managed_h, data));
            $target_servico_h.append(Mustache.to_html(template_servico_h, data));
            $target_datasource_h.append(Mustache.to_html(template_datasource_h, data));
            $target_certificado_h.append(Mustache.to_html(template_certificado_h, data));

            $target_managed_d.append(Mustache.to_html(template_managed_d, data));
            $target_servico_d.append(Mustache.to_html(template_servico_d, data));
            $target_datasource_d.append(Mustache.to_html(template_datasource_d, data));
            $target_certificado_d.append(Mustache.to_html(template_certificado_d, data));
              $('.make-switch').bootstrapSwitch();

            $('#modal_catalogo').modal('show'); // show bootstrap modal
            // $('.modal-title').text('Catalogo de Sistema'); // Set Title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Não possui nenhum elemento associado.');
        }
    });
}

function add_sistema() {
    save_method = 'add';
    var tpl_tipo_sistema = $("#select_tipo_sistema").html();  // referencia do template
        tpl_documentacao = $("#row_documentacao").html(),
        tpl_negocio = $("#row_negocio").html(),
        tpl_link = $("#row_link").html(),
        $target_documentacao = $(".dynamic-documentacao"),           // onde ele ira aparecer
        $target_tipo_sistema = $(".dynamic-tipo_sistema"),
        $target_negocio = $(".dynamic-negocio"),           // onde ele ira aparecer
        $target_link = $(".dynamic-link"),           // onde ele ira aparecer

        // inputRow = [];
        doc = 0;           // onde ele ira aparecer
        lnk = 0;
        $('#form')[0].reset(); // reset form on modals
        $(".selectpicker").val('').selectpicker('refresh'); //reset selectcpicker
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('.row_negocio').remove();
        $('.row_doc').remove();
        $('.row_link').remove();
        $('.select_tipo_sistema').remove();
    //Ajax Load data from ajax
    $.ajax({
        url : href+"/sistema_modal/",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            data.doc = doc;
            data.lnk = lnk;
            $target_documentacao.append(Mustache.to_html(tpl_documentacao, data));
            $target_negocio.append(Mustache.to_html(tpl_negocio, data));
            $target_tipo_sistema.append(Mustache.to_html(tpl_tipo_sistema, data));
            $target_link.append(Mustache.to_html(tpl_link, data));

            $('.minus').remove();
            $('.selectpicker').selectpicker();
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Adicionar sistema'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Erro ao pegar os dados do ajax');
        }
    });

}

function addLink() {
    tpl_link = $("#row_link").html();
    $target_link = $(".dynamic-link");   // onde ele ira aparecer
    lnk++;
    if(lnk <= max) {
        $.ajax({
            url : href+"/sistema_modal/",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                data.lnk = lnk;
                $target_link.append(Mustache.to_html(tpl_link, data));
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Erro ao pegar os dados do ajax');
            }
        });
    } else {
        alert('limit de campos atingido.');
    }
}

function removeLink(id) {
    $("div.link_"+id).remove();
  if(lnk <= 1) {
    lnk = 1;
  } else {
    lnk--;
  }
}


function addRows(){
    tpl_documentacao = $("#row_documentacao").html();
    $target_documentacao = $(".dynamic-documentacao");
    $(".selectpicker").selectpicker();
    doc++;
  if(doc <= max){
    $.ajax({
        url : href+"/sistema_link_modal/",
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            data.doc = doc;
            $target_documentacao.append(Mustache.to_html(tpl_documentacao, data));
            console.log(data);
            $('.selectpicker').selectpicker();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Erro ao pegar os dados do ajax');
        }
    });
  } else {
    alert('limit de campos atingido.');
  }
}

function removeRows(id){
    // console.log(id);
    $("div.documentacao_"+id).remove();
    // $msg.text('');
  if(doc <= 1){
    doc = 1;
  }else{
    doc--;
  }
}

function edit_sistema(id) {

    save_method = 'update';
    var tpl_tipo_sistema = $("#select_tipo_sistema").html(),  // referencia do template
        tpl_negocio = $("#row_negocio").html(),
        tpl_documentacao = $("#row_documentacao").html(),
        tpl_link = $("#row_link").html(),
        $target_documentacao = $(".dynamic-documentacao"),           // onde ele ira aparecer
        $target_tipo_sistema = $(".dynamic-tipo_sistema"),
        $target_negocio = $(".dynamic-negocio"),           // onde ele ira aparecer
        $target_link = $(".dynamic-link");           // onde ele ira aparecer
        var negocio = [],
        repositorio = [];
        doc = 0;
        lnk = 0;
    $('#form')[0].reset(); // reset form on modals
    $(".selectpicker").val('').selectpicker('refresh'); //reset selectcpicker
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.row_negocio').remove();
    $('.row_doc').remove();
    $('.row_link').remove();
    $('.select_tipo_sistema').remove();
    //Ajax Load data from ajax
    $.ajax({
        url : href+"/sistema_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            data.doc = doc;
            data.lnk =lnk;
            data.area_negocio.forEach(function(item) {
                negocio.push(item.id_negocio);
            });
            $target_negocio.append(Mustache.to_html(tpl_negocio, data));
            $target_documentacao.append(Mustache.to_html(tpl_documentacao, data));
            $(".selectpicker").selectpicker();
            $target_tipo_sistema.append(Mustache.to_html(tpl_tipo_sistema, data));
            $target_link.append(Mustache.to_html(tpl_link, data));
            $('.minus').remove();
            //passar para um função convertdata
            var parts = data.sistema.data_sistema.split('-');
            var dmyDate = parts[2] + '-' + parts[1] + '-' + parts[0];

            // data.documentacao.forEach(function(item,index) {
                $.each(data.documentacao, function(index,item) {
                if(index != 0) {
                    $.ajax({
                        url : href+"/sistema_link_modal/",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            data.doc = index;
                            $target_documentacao.append(Mustache.to_html(tpl_documentacao, data));
                            $('.selectpicker').selectpicker();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Erro ao pegar os dados do ajax');
                        }
                    });
                    // item.doc = index;
                    // $target_documentacao.append(Mustache.to_html(tpl_documentacao, item));
                    // $('.selectpicker').selectpicker();
                    // addRows();
                }
                setTimeout(function() {
                        $('div.documentacao_'+index).find('[id=documentacao_'+index+']').val(item.id_documentacao);
                        $('div.documentacao_'+index).find('[name="url[]"]').val(item.url_documentacao);
                        $('div.documentacao_'+index).find('[name="repositorio[]"]').selectpicker('val',item.id_repositorio);
                }, 200);
            });
            $.each(data.link, function(index,valor) {
                if(index != 0){
                    valor.lnk = index;
                    $target_link.append(Mustache.to_html(tpl_link, valor));
                }
                setTimeout(function(){
                        $('div.link_'+index).find('[id=id_link_'+index+']').val(valor.id_link);
                        $('div.link_'+index).find('[name="link_sistema[]"]').val(valor.url_link);
                }, 200);
            });
            $('[name="id"]').val(data.sistema.id_sistema);
            $('[name="nome"]').val(data.sistema.nome_sistema);
            $('[name="descricao"]').val(data.sistema.descricao_sistema);
            $('[name="data"]').val(dmyDate);
            $('[name="tipo_sistema"]').selectpicker('val', data.sistema.id_tipo_sistema);
            $('[name="negocio[]"]').selectpicker('val',negocio);
            $('[name="status"]').selectpicker('val',data.sistema.status_sistema);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar sistema'); // Set title to Bootstrap modal title
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
        url = href+"/sistema_add";
    } else {
        url = href+"/sistema_update";
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

function delete_sistema(id){
    if(confirm('Você tem certeza que quer deletar o item?')) {
        // ajax delete data to database
        $.ajax({
            url : href+"/sistema_delete/"+id,
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
