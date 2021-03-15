<html>
   <head> 
      <title>Chart.js and jsPDF</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> 
      <style id="compiled-css" type="text/css">
button {/*from ww  w .  jav  a 2  s  .c  o m*/
   margin-top:30px; padding:10px 20px; border-radius:0;
}
      </style> 
      <script type="text/javascript">
    window.onload=function(){
        var datas31= <?php echo json_encode($categorias3);?>;
         var datas32= <?php echo json_encode($valores3);?>;
         var datas33= <?php echo json_encode($colores3);?>;
         var barCanvas3=$("#cool-canvas");
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
//original canvas

//hidden canvas

//add event listener to button
document.getElementById('download-pdf').addEventListener("click", downloadPDF);
//donwload pdf from original canvas
function downloadPDF() {
  var canvas = document.querySelector('#cool-canvas');
   var canvasImg = canvas.toDataURL("image/jpeg", 1.0);
   var doc = new jsPDF('landscape');
   doc.setFontSize(20);
   doc.text(15, 15, "Cool Chart");
   doc.addImage(canvasImg, 'JPEG', 10, 10, 280, 150 );
   doc.save('canvas.pdf');
}

    }

      </script> 
   </head> 
   <body> 
      <div> 
         <canvas id="cool-canvas" width="600" height="300"></canvas> 
      </div> 
      <div style="height:0; width:0; overflow:hidden;"> 
         <canvas id="supercool-canvas" width="1200" height="600"></canvas> 
      </div> 
      <button type="button" id="download-pdf"> Download PDF </button> 
      <button type="button" id="download-pdf2"> Download Higher Quality PDF </button>  
   </body>
</html>