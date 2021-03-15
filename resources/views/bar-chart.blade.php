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
var chart_data = {
         labels: ['Player1', 'Player2', 'Player3', 'Player4'],
         datasets: [
             {
                 fillColor: "rgba(6, 118, 152, 0.71)",
                 strokeColor: "rgba(220,220,220,1)",
                 pointColor: "rgba(220,220,220,1)",
                 pointStrokeColor: "#fff",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [20,34,15,64,]
             }
         ]
}
//original canvas

//hidden canvas
var newCanvas = document.querySelector('#supercool-canvas');
newContext = newCanvas.getContext('2d');
var supercoolcanvas = new Chart(newContext).Line(chart_data);
supercoolcanvas.defaults.global = {
   scaleFontSize: 600
}
//add event listener to button


document.getElementById('download-pdf2').addEventListener("click", downloadPDF2);

function downloadPDF2() {
   var newCanvas = document.querySelector('#supercool-canvas');
   var newCanvasImg = newCanvas.toDataURL("image/jpeg", 1.0);
   var doc = new jsPDF('landscape');
   doc.setFontSize(20);
   doc.text(15, 15, "Super Cool Chart");
   doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150 );
   doc.save('new-canvas.pdf');
 }
    }

      </script> 
   </head> 
   <body> 
      
      <div style="height:0; width:0; overflow:hidden;"> 
         <canvas id="supercool-canvas" width="1200" height="600"></canvas> 
      </div> 
    
      <button type="button" id="download-pdf2"> Download Higher Quality PDF </button>  
   </body>
</html>
