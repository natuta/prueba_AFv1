<html>
   <head> 
      <title>Chart.js and jsPDF</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
      <style id="compiled-css" type="text/css">
button {/*from ww  w .  jav  a 2  s  .c  o m*/
   margin-top:30px; padding:10px 20px; border-radius:0;
}

      </style> 
      <script type="text/javascript">
    window.onload=function(){
 

        var datas11= <?php echo json_encode($categorias1);?>;
         var datas12= <?php echo json_encode($valores1);?>;
         var datas13= <?php echo json_encode($colores1);?>;

var myBar = new Chart(document.getElementById("myChart"), {
    type:"pie",
        
    data:{
            labels:datas11,
            datasets:[{
                    label:'Nro de Egresos, por Categoria',
                    data:datas12,
                    backgroundColor:datas13
                        
            }]
        },
        options:{
            responsive:true,
            title: {
            display: true,
            text: 'Grafica: Egresos'
            }
        }
    })

var datas21= <?php echo json_encode($categorias2);?>;
var datas22= <?php echo json_encode($valores2);?>;
var datas23= <?php echo json_encode($colores2);?>;
var myBar2 = new Chart(document.getElementById("myChart2"), {
        type: 'horizontalBar', 
        data:{
                labels:datas21,
                datasets:[{
                        label:'Valor de Adquisiciones, por Categoria',
                        data:datas22,
                        backgroundColor:datas23
                        }]
            },
        options:{
                responsive:true,
                scales:{
                    xAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                          }]
                },
                title: {
                display: true,
                text: 'Grafica: Adquisiciones'
                }
               } 
    })

var datas31= <?php echo json_encode($categorias3);?>;
var datas32= <?php echo json_encode($valores3);?>;
var datas33= <?php echo json_encode($colores3);?>;
var myBar3 = new Chart(document.getElementById("myChart3"), {
  type: 'bar', 
        data:{
                labels:datas31,
                datasets:[{
                        label:'Costo de Mantenimientos, por Categoria',
                        data:datas32,
                        backgroundColor:datas33
                    
                            
                }]
        },
        options:{
            responsive:true,
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            },
            title: {
            display: true,
            text: 'Grafica: Mantenimientos'
            }
        }
    
})
var datas= <?php echo json_encode($datas);?>;
var datas1= <?php echo json_encode($colores4);?>;

var myBar4 = new Chart(document.getElementById("myChart4"), {
            type:'line',
            data:{
                labels: ['Ene','Feb','Mzo','Abr','May','Jun','Jul','Agt','Sep','Oct','Nov','Dic'],
                datasets: [{
                    label: "Incremento de nuevos Usuarios, 2021",
                       data: datas,
                        borderColor: 'orange',
                        backgroundColor: 'transparent',
                        borderDash: [5, 5],
                        pointBorderColor: 'orange',
                        pointBackgroundColor: 'rgba(255,150,0,0.5)',
                        pointRadius: 5,
                        pointHoverRadius: 10,
                        pointHitRadius: 30,
                        pointBorderWidth: 2,
                        pointStyle: 'rectRounded'

                }]
                
            },
            options:{
               
                legend: {
                display: true,
                position: 'top',
                labels: {
                boxWidth: 80,
                fontColor: 'black'
                   }
               }   ,
               title: {
                display: true,
                text: 'Grafica: Usuarios'
                }
           }
})

$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  })
  
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
  })
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // download the pdf
  pdf.save('filename.pdf');
})
    }
      </script> 
   </head> 
   <body> 
    
    
    <button type="button" id="downloadPdf"> Descargar PDF </button> 
    <br/><br/>
    <div id="reportPage" style="width: 100%; height:100%">
        <div  style="width: 40%; height:40%; float:left;">
        <canvas id="myChart" style="width: 50px; height:50px;"></canvas>
    </div>

    <div  style="width: 40%; height:40%; float:right;">
        <canvas id="myChart2"style="width: 50px; height:50px;"></canvas>
    </div>

    <br/><br/><br/>

    <div  style="width: 40%; height:40%; float:left;">
        <canvas id="myChart3"style="width: 50px; height:50px;"></canvas>
    </div>
    <div  style="width: 40%; height:40%; float:right;">
        <canvas id="myChart4"style="width: 50px; height:50px;"></canvas>
    </div>

    </div>

  

       
   </body>
</html>