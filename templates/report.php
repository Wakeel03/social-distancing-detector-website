<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Report</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <form method="GET" action="report.php" style = "padding: 30px;">
                    <div class="row">
                        <div class="col">
                        <input type="text" class="form-control" placeholder="Year" name="year">
                            </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Month" name="month">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Day" name="day">
                        </div>
                        <div class="col">
                            <select class="form-control" name="camera">
                                <?php foreach ($user_cams as $cam) : ?>
                                    <option value="<?=$cam->camera_id?>"><?=$cam->camera_name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit" name="btn_getRecord" value="record_details">Submit</button>
                        </div>
                        <div class="form-group"style="margin-left: 10px">
                            <a class="btn btn-danger" href="index.php">Home</a>
                        </div>
                    </div>
                </form>
                <div class="card o-hidden border-0 shadow-lg my-5">
                   
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                        <div class="row">
                                <div class = "chart-container" style = "position: relative; height:100%; width:100%; padding: 30px;" >
			
                                    <canvas id='mychart'></canvas>
                                    
                                    <!-- draw chart -->
                                    <script>
                                        let label;
                                        let cases;
                                        let chart;
                                        let myChart;
                                        let visitors;
                                        
                                        window.onload = function(){
                                            
                                        };
                                       
                                        $(function(){

                                            $.ajax({
                                                url:'getReport.php',
                                                success:function(response){
                                                    label=[];
                                                    cases=[];

                                                    for(let i=0;i<response.length;i++){
                                                        label.push(response[i].hour);
                                                        cases.push(response[i].tot_vio);
                                                        
                                                    }
                                                    Chart.defaults.global.legend.display = false;

                                                    let myChart=$('#mychart');
                                                    chart=new Chart(myChart,{
                                                        type:'line',
                                                        label:'test',
                                                        options: {
                                                                    scales: {
                                                                        yAxes: [{
                                                                            ticks: {
                                                                                beginAtZero: true
                                                                            }
                                                                        }]
                                                                    }
                                                                },
                                                        data:{
                                                            labels:label,
                                                            datasets:[{
                                                                label:"cases",
                                                                data:cases,
                                                                
                                                                
                                                                backgroundColor: [
                                                                    'rgb(200, 0, 0,0.1)'
                                                                ],

                                                                borderColor: [
                                                                    'rgb(200, 0, 0, 1)'
                                                                ],

                                                            },
                                                            
                                                          ],


                                                        }

                                                    })

                                                },	



                                                error:function(response){
                                                    
                                                }

                                            })

                                    })
                                    </script>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>