
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
       
        <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>

    <style>
        #chartContainer {
            width: 40%
          };
          
          #myChart2 {
            width: 40%
          };</style>
</head>
    <body>
        <div class="col-lg-12" style="padding-top:20px;">
            <div class="card">
                <div class="card-header center">Reportes Graficos

                        <a href="#" id="downloadPdf" >Download Report Page as PDF</a>
                        <br/><br/>
                        <div id="reportPage">
                        <div id="chartContainer" style="width: 30%;float: left;">
                            <canvas id="myChart"></canvas>
                        </div>

                        <div style="width: 30%; float: left;">
                            <canvas id="myChart2"></canvas>
                        </div>

                        <br/><br/><br/>

                        <div style="width: 30%; height: 400px; clear: both;">
                            <canvas id="myChart3" style="width: 40%"></canvas>
                        </div>
                        </div>
                </div>
                 
                <div class="card-body">
                     <div class="row"> 
                  
                            <div class="col-lg-6">
                                <canvas id="barChart1" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-6">
                                <canvas id="barChart2" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-6">
                                <canvas id="barChart3" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-6">
                                <canvas id="barChart4" width="400" height="400"></canvas>
                            </div>                                
                               
                            </div>
                  
              </div>
            </div>
        </div>
    </body>
     
</html>

<script>
    $(function(){
         var datas11= <?php echo json_encode($categorias1);?>;
         var datas12= <?php echo json_encode($valores1);?>;
         var datas13= <?php echo json_encode($colores1);?>;
         var barCanvas1=$("#barChart1");
         var barChart1 = new Chart(barCanvas1,{
        type:"bar",
        
        data:{
            labels:datas11,
            datasets:[{
                    label:'Nro de Egresos, por Categoria',
                    data:datas12,
                    backgroundColor:datas13
                        
            }]
        },
        options:{
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            },
            title: {
            display: true,
            text: 'Egresos'
        }
        }
    })
    });
</script>
<script>
$(function(){
         var datas21= <?php echo json_encode($categorias2);?>;
         var datas22= <?php echo json_encode($valores2);?>;
         var datas23= <?php echo json_encode($colores2);?>;
         var barCanvas2=$("#barChart2");
         var barChart2 = new Chart(barCanvas2,{
        type:"bar",
        
        data:{
            labels:datas21,
            datasets:[{
                    label:'Valor de Adquisiciones, por Categoria',
                    data:datas22,
                    backgroundColor:datas23
                        
            }]
        },
        options:{
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            },
            title: {
            display: true,
            text: 'Adquisiciones'
        }
        }
    })
    });
</script>
<script>
$(function(){
         var datas31= <?php echo json_encode($categorias3);?>;
         var datas32= <?php echo json_encode($valores3);?>;
         var datas33= <?php echo json_encode($colores3);?>;
         var barCanvas3=$("#barChart3");
         var barChart3 = new Chart(barCanvas3,{
        type:"horizontalBar",
        
        data:{
            labels:datas31,
            datasets:[{
                    label:'Costo de Mantenimientos, por Categoria',
                    data:datas32,
                    backgroundColor:datas33
                   
                        
            }]
        },
        options:{
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            },
            title: {
            display: true,
            text: 'Mantenimientos'
        }
        }
    })
    });
</script>

<script>
    $(function(){
             var datas= <?php echo json_encode($datas);?>;
             var datas1= <?php echo json_encode($colores4);?>;
             var barCanvas4=$("#barChart4");
             var barChart4 = new Chart(barCanvas4,{
            type:"line",
            data:{
                labels:['Ene','Feb','Mzo','Abr','May','Jun','Jul','Agt','Sep','Oct','Nov','Dic'],
                datasets:[{
                        label:'Incremento de nuevos Usuarios,2021',
                        data:datas,
                        borderWidth:5,
                        backgroundColor:datas1
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                        stacked: true
                    }]
                },
                title: {
            display: true,
            text: 'Usuarios'
        }
            }
        })
        });
</script>
<script>

    var chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(231,233,237)'
};

var randomScalingFactor = function() {
  return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
};

var data =  {
  labels: ["Car", "Bike", "Walking"],
  datasets: [{
    label: 'Fuel',
    backgroundColor: [
      chartColors.red,
      chartColors.blue,
      chartColors.yellow],
    data: [
      randomScalingFactor(), 
      randomScalingFactor(), 
      randomScalingFactor(), 
    ]
  }]
};

var myBar = new Chart(document.getElementById("myChart"), {
  type: 'horizontalBar', 
  data: data, 
  options: {
    responsive: true,
    title: {
      display: true,
      text: "Chart.js - Base Example"
    },
    tooltips: {
      mode: 'index',
      intersect: false
    },
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

var myBar2 = new Chart(document.getElementById("myChart2"), {
  type: 'horizontalBar', 
  data: data, 
  options: {
    responsive: true,
    title: {
      display: true,
      text: "Chart.js - Changing X Axis Step Size"
    },
    tooltips: {
      mode: 'index',
      intersect: false
    },
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 2
        }
      }]
    }
  }
});

var myBar3 = new Chart(document.getElementById("myChart3"), {
  type: 'horizontalBar', 
  data: data, 
  options: {
    responsive: true,
    maintainAspectRatio: false,
    title: {
      display: true,
      text: "Chart.js - Setting maintainAspectRatio = false and Setting Parent Width/Height"
    },
    tooltips: {
      mode: 'index',
      intersect: false
    },
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
    <script>
$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // keep track canvas position
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  // for each chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    // draw the chart into the new canvas
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // our report page is in a grid pattern so replicate that in the new canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // download the pdf
  pdf.save('filename.pdf');
});
</script>