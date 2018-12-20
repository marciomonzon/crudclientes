//  **************** GRAFICO PARCELAS PAGAS E NÃO PAGAS
var context = document.getElementsByClassName('duplicatas-chart'); // canvas no dashboard

var parcelaspagas = document.getElementsByName('parcelaspagas')[0].value;
var parcelasnaopagas = document.getElementsByName('parcelasnaopagas')[0].value;

// Type, Data e options
var chartDuplicata = new Chart(context, {
    type: 'pie',
    data: {
        labels: ["Parcelas pagas", "Parcelas não pagas"],
        datasets: [{
            label: 'Parcelas',
            backgroundColor: ['#f1c40f', '#e67e22'],
            data: [parcelaspagas, parcelasnaopagas]
        }]
    },
    options: {
        cutoutPercentage: 50,
        rotation: Math.PI * -0.5,
        animation: {
            animateScale: true
        }
    }
})

// ************************

// GRAFICO VENDAS POR MÊS NO ANO ATUAL
var ctxVendas = document.getElementsByClassName('vendasmesano-chart');
var jan = document.getElementsByName('vendasmesano[JANEIRO]')[0].value;
var fev = document.getElementsByName('vendasmesano[FEVEREIRO]')[0].value;
var mar = document.getElementsByName('vendasmesano[MARCO]')[0].value;
var abr = document.getElementsByName('vendasmesano[ABRIL]')[0].value;
var mai = document.getElementsByName('vendasmesano[MAIO]')[0].value;
var jun = document.getElementsByName('vendasmesano[JUNHO]')[0].value;
var jul = document.getElementsByName('vendasmesano[JULHO]')[0].value;
var ago = document.getElementsByName('vendasmesano[AGOSTO]')[0].value;
var set = document.getElementsByName('vendasmesano[SETEMBRO]')[0].value;
var out = document.getElementsByName('vendasmesano[OUTUBRO]')[0].value;
var nov = document.getElementsByName('vendasmesano[NOVEMBRO]')[0].value;
var dez = document.getElementsByName('vendasmesano[DEZEMBRO]')[0].value;


var chartVendasAno = new Chart(ctxVendas, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Nº de vendas',
            backgroundColor: '#58ACFA',
            borderColor: '#2E64FE',
            borderWidth: 2, 
            data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
        }]
    },
    options: {
        responsive: true,
        tooltips: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                 type: "linear",
                 display: true,
                 position: "left",
                 id: "y-axis-1",
                 gridLines: {
                   display: true
                 },
                 labels: {
                   show: true,

                 },
                 ticks: {
                   beginAtZero: true,
                   userCallback: function(label, index, labels) {
                     if (Math.floor(label) === label) {
                       return label;
                     }

                   },
                 }

               }]
        }
    }
})


// **************************

// GRAFICO DE QTDE DE PARCELAS NO ANO POR MÊS
var ctxParcelaAno = document.getElementsByClassName('qtdeparcelas-chart');
jan = document.getElementsByName('parcelasano[JANEIRO]')[0].value;
fev = document.getElementsByName('parcelasano[FEVEREIRO]')[0].value;
mar = document.getElementsByName('parcelasano[MARCO]')[0].value;
abr = document.getElementsByName('parcelasano[ABRIL]')[0].value;
mai = document.getElementsByName('parcelasano[MAIO]')[0].value;
jun = document.getElementsByName('parcelasano[JUNHO]')[0].value;
jul = document.getElementsByName('parcelasano[JULHO]')[0].value;
ago = document.getElementsByName('parcelasano[AGOSTO]')[0].value;
set = document.getElementsByName('parcelasano[SETEMBRO]')[0].value;
out = document.getElementsByName('parcelasano[OUTUBRO]')[0].value;
nov = document.getElementsByName('parcelasano[NOVEMBRO]')[0].value;
dez = document.getElementsByName('parcelasano[DEZEMBRO]')[0].value;

var chartParcAno = new Chart(ctxParcelaAno, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Nº de Duplicatas',
            backgroundColor: '#71B37C',
            borderColor: '#0B6121',
            borderWidth: 2, 
            data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
        }]
    },
     options: {
        responsive: true,
        tooltips: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                 type: "linear",
                 display: true,
                 position: "left",
                 id: "y-axis-1",
                 gridLines: {
                   display: true
                 },
                 labels: {
                   show: true,

                 },
                 ticks: {
                   beginAtZero: true,
                   userCallback: function(label, index, labels) {
                     if (Math.floor(label) === label) {
                       return label;
                     }

                   },
                 }

               }]
        }
    }
})


// *************************

// GRAFICO DE PARCELAS PAGAS POR MES NO ANO ATUAL e VENCIDAS E NÃO PAGAS
// GRAFICO COM BARRA DUPLA

var ctxParcelaPagasMes = document.getElementsByClassName('qtdeparcelaspagasmes-chart');
jan = document.getElementsByName('parcelaspagasmes[JANEIRO]')[0].value;
fev = document.getElementsByName('parcelaspagasmes[FEVEREIRO]')[0].value;
mar = document.getElementsByName('parcelaspagasmes[MARCO]')[0].value;
abr = document.getElementsByName('parcelaspagasmes[ABRIL]')[0].value;
mai = document.getElementsByName('parcelaspagasmes[MAIO]')[0].value;
jun = document.getElementsByName('parcelaspagasmes[JUNHO]')[0].value;
jul = document.getElementsByName('parcelaspagasmes[JULHO]')[0].value;
ago = document.getElementsByName('parcelaspagasmes[AGOSTO]')[0].value;
set = document.getElementsByName('parcelaspagasmes[SETEMBRO]')[0].value;
out = document.getElementsByName('parcelaspagasmes[OUTUBRO]')[0].value;
nov = document.getElementsByName('parcelaspagasmes[NOVEMBRO]')[0].value;
dez = document.getElementsByName('parcelaspagasmes[DEZEMBRO]')[0].value;


// vencidas no mes e nao pagas
var jan2 = document.getElementsByName('parcelasquevencenomesnaopagas[JANEIRO]')[0].value;
var fev2 = document.getElementsByName('parcelasquevencenomesnaopagas[FEVEREIRO]')[0].value;
var mar2 = document.getElementsByName('parcelasquevencenomesnaopagas[MARCO]')[0].value;
var abr2 = document.getElementsByName('parcelasquevencenomesnaopagas[ABRIL]')[0].value;
var mai2 = document.getElementsByName('parcelasquevencenomesnaopagas[MAIO]')[0].value;
var jun2 = document.getElementsByName('parcelasquevencenomesnaopagas[JUNHO]')[0].value;
var jul2 = document.getElementsByName('parcelasquevencenomesnaopagas[JULHO]')[0].value;
var ago2 = document.getElementsByName('parcelasquevencenomesnaopagas[AGOSTO]')[0].value;
var set2 = document.getElementsByName('parcelasquevencenomesnaopagas[SETEMBRO]')[0].value;
var out2 = document.getElementsByName('parcelasquevencenomesnaopagas[OUTUBRO]')[0].value;
var nov2 = document.getElementsByName('parcelasquevencenomesnaopagas[NOVEMBRO]')[0].value;
var dez2 = document.getElementsByName('parcelasquevencenomesnaopagas[DEZEMBRO]')[0].value;


var chartParcAno = new Chart(ctxParcelaPagasMes, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [
            {
                label: 'Duplicatas pagas',
                backgroundColor: '#DBA901',
                borderColor: '#B18904',
                borderWidth: 2, 
                data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
            },
            {
                label: 'Vencidas e não pagas',
                backgroundColor: '#FA5858',
                borderColor: '#B40404',
                borderWidth: 2, 
                data: [jan2, fev2, mar2, abr2, mai2, jun2, jul2, ago2, set2, out2, nov2, dez2]
            }
        ]
    },
     options: {
        responsive: true,
        tooltips: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                 type: "linear",
                 display: true,
                 position: "left",
                 id: "y-axis-1",
                 gridLines: {
                   display: true
                 },
                 labels: {
                   show: true,

                 },
                 ticks: {
                   beginAtZero: true,
                   userCallback: function(label, index, labels) {
                     if (Math.floor(label) === label) {
                       return label;
                     }

                   },
                 }

               }]
        }
    }
})


// *******************************************************************
// GRAFICO ESPERADO E RECEBIDO *****************

var ctxEsperadoReceb = document.getElementsByClassName('esperadorecebido-chart');

// esperado
jan = document.getElementsByName('valoresperado[JANEIRO]')[0].value;
fev = document.getElementsByName('valoresperado[FEVEREIRO]')[0].value;
mar = document.getElementsByName('valoresperado[MARCO]')[0].value;
abr = document.getElementsByName('valoresperado[ABRIL]')[0].value;
mai = document.getElementsByName('valoresperado[MAIO]')[0].value;
jun = document.getElementsByName('valoresperado[JUNHO]')[0].value;
jul = document.getElementsByName('valoresperado[JULHO]')[0].value;
ago = document.getElementsByName('valoresperado[AGOSTO]')[0].value;
set = document.getElementsByName('valoresperado[SETEMBRO]')[0].value;
out = document.getElementsByName('valoresperado[OUTUBRO]')[0].value;
nov = document.getElementsByName('valoresperado[NOVEMBRO]')[0].value;
dez = document.getElementsByName('valoresperado[DEZEMBRO]')[0].value;

// recebido
jan2 = document.getElementsByName('valorrecebido[JANEIRO]')[0].value;
fev2 = document.getElementsByName('valorrecebido[FEVEREIRO]')[0].value;
mar2 = document.getElementsByName('valorrecebido[MARCO]')[0].value;
abr2 = document.getElementsByName('valorrecebido[ABRIL]')[0].value;
mai2 = document.getElementsByName('valorrecebido[MAIO]')[0].value;
jun2 = document.getElementsByName('valorrecebido[JUNHO]')[0].value;
jul2 = document.getElementsByName('valorrecebido[JULHO]')[0].value;
ago2 = document.getElementsByName('valorrecebido[AGOSTO]')[0].value;
set2 = document.getElementsByName('valorrecebido[SETEMBRO]')[0].value;
out2 = document.getElementsByName('valorrecebido[OUTUBRO]')[0].value;
nov2 = document.getElementsByName('valorrecebido[NOVEMBRO]')[0].value;
dez2 = document.getElementsByName('valorrecebido[DEZEMBRO]')[0].value;


var chartEspReceb = new Chart(ctxEsperadoReceb, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [
            {
                label: 'Esperado',
                backgroundColor: '#DBA901',
                borderColor: '#B18904',
                borderWidth: 2, 
                data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
            },
            {
                label: 'Recebido',
                backgroundColor: '#71B37C',
                borderColor: '#0B6121',
                borderWidth: 2, 
                data: [jan2, fev2, mar2, abr2, mai2, jun2, jul2, ago2, set2, out2, nov2, dez2]
            }
        ]
    },
     options: {
        responsive: true,
        tooltips: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                 type: "linear",
                 display: true,
                 position: "left",
                 id: "y-axis-1",
                 gridLines: {
                   display: true
                 },
                 labels: {
                   show: true,

                 },
                 ticks: {
                   beginAtZero: true,
                   userCallback: function(label, index, labels) {
                     if (Math.floor(label) === label) {
                       return label;
                     }

                   },
                 }

               }]
        }
    }
})

//***************************************************************
//***************************************************************

var ctxRenegsDistrato = document.getElementsByClassName('renegsdistrato-chart');

// renegs
jan = document.getElementsByName('renegs[JANEIRO]')[0].value;
fev = document.getElementsByName('renegs[FEVEREIRO]')[0].value;
mar = document.getElementsByName('renegs[MARCO]')[0].value;
abr = document.getElementsByName('renegs[ABRIL]')[0].value;
mai = document.getElementsByName('renegs[MAIO]')[0].value;
jun = document.getElementsByName('renegs[JUNHO]')[0].value;
jul = document.getElementsByName('renegs[JULHO]')[0].value;
ago = document.getElementsByName('renegs[AGOSTO]')[0].value;
set = document.getElementsByName('renegs[SETEMBRO]')[0].value;
out = document.getElementsByName('renegs[OUTUBRO]')[0].value;
nov = document.getElementsByName('renegs[NOVEMBRO]')[0].value;
dez = document.getElementsByName('renegs[DEZEMBRO]')[0].value;

// distratos
jan2 = document.getElementsByName('distratos[JANEIRO]')[0].value;
fev2 = document.getElementsByName('distratos[FEVEREIRO]')[0].value;
mar2 = document.getElementsByName('distratos[MARCO]')[0].value;
abr2 = document.getElementsByName('distratos[ABRIL]')[0].value;
mai2 = document.getElementsByName('distratos[MAIO]')[0].value;
jun2 = document.getElementsByName('distratos[JUNHO]')[0].value;
jul2 = document.getElementsByName('distratos[JULHO]')[0].value;
ago2 = document.getElementsByName('distratos[AGOSTO]')[0].value;
set2 = document.getElementsByName('distratos[SETEMBRO]')[0].value;
out2 = document.getElementsByName('distratos[OUTUBRO]')[0].value;
nov2 = document.getElementsByName('distratos[NOVEMBRO]')[0].value;
dez2 = document.getElementsByName('distratos[DEZEMBRO]')[0].value;


var chartRenegsDistrato = new Chart(ctxRenegsDistrato, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [
            {
                label: 'Renegs',
                backgroundColor: '#71B37C',
                borderColor: '#0B6121',
                borderWidth: 2, 
                data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
            },
            {
                label: 'Distratos',
                backgroundColor: '#FE2E2E',
                borderColor: '#8A0808',
                borderWidth: 2, 
                data: [jan2, fev2, mar2, abr2, mai2, jun2, jul2, ago2, set2, out2, nov2, dez2]
            }
        ]
    },
     options: {
        responsive: true,
        tooltips: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                 type: "linear",
                 display: true,
                 position: "left",
                 id: "y-axis-1",
                 gridLines: {
                   display: true
                 },
                 labels: {
                   show: true,

                 },
                 ticks: {
                   beginAtZero: true,
                   userCallback: function(label, index, labels) {
                     if (Math.floor(label) === label) {
                       return label;
                     }

                   },
                 }

               }]
        }
    }
})