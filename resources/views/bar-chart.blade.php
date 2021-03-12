<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    </head>
    <body>
        <canvas id="barChart" width="400" height="400"></canvas>
    </body>
    <script>
        $(function(){
             var datas= <?php echo json_encode($datas);?>;
             var barCanvas=$("#barChart");
             var barChart = new Chart(barCanvas,{
            type:"bar",
            data:{
                labels:['Ene','Feb','Mzo','Abr','May','Jun','Jul','Agt','Sep','Oct','Nov','Dic'],
                datasets:[{
                        label:'Incremento de nuevos Usuarios,2021',
                        data:datas,
                        backgroundColor:[
                            'red','orange','yellow','green','blue','indigo','grey','gold','silver','brown','dark-blue','purple'
                        ]
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
        });
    </script>
</html>