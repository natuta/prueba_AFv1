
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
        
            <div class="card">
                <div class="card-header">jhkhkj</div>
                 
                <div class="card-body">
                     <div class="row"> 
                  
                            <div class="col-lg-4">
                                <canvas id="barChart1" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-4">
                                <canvas id="barChart2" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-4">
                                <canvas id="barChart3" width="400" height="400"></canvas>
                            </div>
                                                               
                               
                                    </div>
                  
              </div>
            </div>
        
    </body>
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
                        label:'Valor en Adquisiciones, por Categorias',
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
                        label:'Valor en Adquisiciones, por Categorias',
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
            type:"bar",
            
            data:{
                labels:datas31,
                datasets:[{
                        label:'Valor en Adquisiciones, por Categorias',
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
                }
            }
        })
        });
    </script>
   
</html>