<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
    </head>
    <body>
   <div style="height: 488px; width: 980px; margin:auto;">
          <canvas id= "bartChart"></canvas>
    </div>

    <script>
            $(function(){
             var datas= <?php echo json_encode($datas);?>;
             var barCanvas=$("#barChart");
             var barChart = new Chart(barCanvas,{
                type: 'bar',
                data:{
                    labels: ['Ene','Feb','Mzo','Abr','May','Jun','Jul','Agt','Sep','Oct','Nov','Dic'],
                    datasets:[
                        {
                            label:'Incremento de nuevos Usuarios,2021',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','grey','gold','silver','brown','dark-blue','purple']
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes:[{
                                ticks:{
                                    beginAtZero:true
                                }
                            }]

                    }

                }

             })
            });


    </script>
       
      
    </body>
</html>

