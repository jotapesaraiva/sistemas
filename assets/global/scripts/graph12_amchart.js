var href = window.location.href;
var celula = $('#h_celula').attr('value');
var projetos = $('#h_projetos').attr('value');
var result_projetos = projetos.replace(/\,/g, '-');
var from = $('#h_from').attr('value');
var result_from = from.replace('/' , '-');
var to = $('#h_to').attr('value');
var result_to = to.replace('/', '-');
if(from == to ){
  var c = 'Dia';
} else {
  var periodo = 'Mês';
}
AmCharts.makeChart("chartdiv4", {
  "type": "serial",
  "theme": "none",
  "precision": 0,

  "dataLoader":
  {
     "url": href+"/graph12/"+celula+"/"+result_projetos+"/"+result_from+"/"+result_to,
     "format": "json",
     "showErrors": true,
     "noStyles": true,
     "async": true
  },

  "graphs": [{
    "id": "g3",
    "valueAxis": "v1",
    "lineColor": "#5E738B",
    "fillColors": "#5E738B",
    "fillAlphas": 1,
    "type": "column",
    "title": "Mantis Abertos do "+periodo,
    "valueField": "TOTAL",
    "clustered": false,
    "columnWidth": 0.4,
    "legendValueText": "[[value]]",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }, {
    "id": "g4",
    "valueAxis": "v1",
    "lineColor": "#3598DC",
    "fillColors": "#3598DC",
    "fillAlphas": 1,
    "type": "column",
    "title": "Mantis Finalizados do "+periodo,
    "valueField": "FINALIZADOS",
    "clustered": false,
    "columnWidth": 0.3,
    "legendValueText": "[[value]]",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }, {
    "id": "g1",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#D91E18",
    "type": "smoothedLine",
    "title": "Produtividade no "+periodo,
    "useLineColorForBulletBorder": true,
    "valueField": "PRODUTIVIDADE",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }, {
    "id": "g2",
    "valueAxis": "v2",
    "lineThickness": 2,
    "lineColor": "#F3C200",

    "title": "Media Produtividade",
    "useLineColorForBulletBorder": false,
    "valueField": "MEDIA",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }],
  "chartCursor": {
    "pan": true,
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "valueLineAlpha": 0
  },
  "dataDateFormat": "MM.YYYY",
  "categoryField": "DATA",
  "categoryAxis": {
    "parseDates": false,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "export": {
   "enabled": false
  },


  });