
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="col-lg-12" style="padding-top:20px;">
            <div class="card">
                <div class="card-header center">Reportes Graficos</div>
                 
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