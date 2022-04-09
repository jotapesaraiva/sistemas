$(document).ready( function () {

    $('#tabela_abertos').dataTable( {
        "aoColumns": [
            null,
            null,
            { "sType": "date-uk" },
            null,
            null,
            null,
            null
        ]
    });


    $('#tabela_imediato').dataTable( {
        "aoColumns": [
            null,
            null,
            { "sType": "date-uk" },
            null,
            null,
            null,
            null
        ]
    });


         $('#tabela_normal').dataTable( {
        "aoColumns": [
            null,
            null,
            { "sType": "date-uk" },
            null,
            null,
            null,
            null
        ]
    });

         $('#tabela_alto').dataTable( {
        "aoColumns": [
            null,
            null,
            { "sType": "date-uk" },
            null,
            null,
            null,
            null
        ]
    });
} );
