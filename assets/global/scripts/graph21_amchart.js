var href = window.location.href;
var celula = $('#h_celula').attr('value');
var projetos = $('#h_projetos').attr('value');
var result_projetos = projetos.replace(/\,/g, '-');
var from = $('#h_from').attr('value');
var result_from = from.replace('/' , '-');
var to = $('#h_to').attr('value');
var result_to = to.replace('/', '-');

AmCharts.makeChart( "chart_pie_2", {
  "type": "pie",
  "theme": "light",

  "dataLoader": {
    "url": href+"/graph21/"+result_projetos+"/"+result_from+"/"+result_to,
    "showCurtain": false
  },

  "marginTop": -30,
  "titleField": "USERNAME",
  "valueField": "TOTAL",
  "labelRadius": 70,
  "startAngle": 23,

  "radius": "30%",
  "innerRadius": "20%",
  "labelText": "[[title]] ([[value]])",
  "export": {
    "enabled": false
  }
} );