var href = window.location.href;
var celula = $('#h_celula').attr('value');
var projetos = $('#h_projetos').attr('value');
var result_projetos = projetos.replace(/\,/g, '-');
var from = $('#h_from').attr('value');
var result_from = from.replace('/' , '-');
var to = $('#h_to').attr('value');
var result_to = to.replace('/', '-');
AmCharts.makeChart("chartdiv1", {
    "type": "serial",
    "theme": "light",

    "dataLoader":
    {
       "url": href+"/graph11/"+celula+"/"+result_projetos+"/"+result_from+"/"+result_to,
       "format": "json",
       "showErrors": true,
       "noStyles": true,
       "async": true
    },

    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.3,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "IMEDIATO",
        "type": "column",
        "fillColors": "#D91E18",
        "color": "#000000",
        "valueField": "IMEDIATO"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "URGENTE",
        "type": "column",
        "fillColors": "#E87E04",
        "color": "#000000",
        "valueField": "URGENTE"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "ALTA",
        "type": "column",
        "color": "#000000",
        "fillColors": "#F3C200",
        "valueField": "ALTA"
    },{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "NORMAL",
        "type": "column",
        "color": "#000000",
        "fillColors": "#26C281",
        "valueField": "NORMAL"
    }],
    "categoryField": "DT_MODIF",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
        "enabled": false
     }

});