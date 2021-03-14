<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <canvas id="barChart" width="400" height="400"></canvas>
    </body>
    <script>
        $(function(){
             var datas1= <?php echo json_encode($categorias);?>;
             var datas2= <?php echo json_encode($valores);?>;
             var datas3= <?php echo json_encode($colores);?>;
             var barCanvas=$("#barChart");
             var barChart = new Chart(barCanvas,{
            type:"bar",
            data:{
                labels:datas1,
                datasets:[{
                        label:'Valor en Adquisiciones, por Categorias',
                        data:datas2,
                        backgroundColor:datas3
                            
                }]
            },
            options:{
                scales:{
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
</html>