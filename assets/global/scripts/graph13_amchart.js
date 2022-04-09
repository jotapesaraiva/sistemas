var href = window.location.href;
var celula = $('#h_celula').attr('value');
var projetos = $('#h_projetos').attr('value');
var result_projetos = projetos.replace(/\,/g, '-');
var from = $('#h_from').attr('value');
var result_from = from.replace('/' , '-');
var to = $('#h_to').attr('value');
var result_to = to.replace('/', '-');

AmCharts.makeChart( "chartdiv3", {
  "type": "pie",
  "theme": "light",

  "dataLoader": {
    "url": href+"/graph13/"+result_projetos+"/"+result_from+"/"+result_to,
    "showCurtain": false
  },

  "marginTop": 10,
  "startAngle": 180,
  "titleField": "TITLE",
  "valueField": "VALUE",
  "labelRadius": 30,

  "radius": "30%", //raio externo
  "innerRadius": "45%", //raio interno
  "labelText": "[[title]]",
  "export": {
    "enabled": false
  }
} );