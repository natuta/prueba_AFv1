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
#chartContainer {
  width: 50%
};

#myChart2 {
  width: 50%
};
      </style> 
      <script type="text/javascript">
    window.onload=function(){
 

        var datas11= <?php echo json_encode($categorias1);?>;
         var datas12= <?php echo json_encode($valores1);?>;
         var datas13= <?php echo json_encode($colores1);?>;

var myBar = new Chart(document.getElementById("myChart"), {
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
            responsive: true,
    title: {
      display: true,
      text: "Grafica Egresos"},
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }
            
        }
    })


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
})

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
      
      <button type="button" id="downloadPdf"> Download Higher Quality PDF </button>  

        <div id="reportPage">
        <div id="chartContainer" style="width: 50%;float: left;">
            <canvas id="myChart"></canvas>
        </div>

        <div style="width: 50%; float: left;">
            <canvas id="myChart2"></canvas>
        </div>

        <br/><br/><br/>

        <div style="width: 50%;  clear: both;">
            <canvas id="myChart3" style="width: 40%"></canvas>
        </div>
        </div>
   </body>
</html>