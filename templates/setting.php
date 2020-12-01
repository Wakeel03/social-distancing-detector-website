<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">please input your five-level-limits</h1>
                            </div>
                            <form action="setting.php" method="POST">
                                <fieldset class="form-group">
                            
                                    <div class="form-group">
                                        <label for="firstlevel">First-level-limit</label>
                                        <input type="text" class="form-control" name="firstlevel" id="firstlevel" min = "0"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="secondlevel">Second-level-limit</label>
                                        <input type="text" class="form-control" name="secondlevel" id="seccondlevel" min = "0"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="thirdlevel">Third-level-limit</label>
                                        <input type="text" class="form-control" name="thirdlevel" id="thirdlevel" min = "0"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="fourthlevel">Fourth-level-limit</label>
                                        <input type="text" class="form-control" name="fourthlevel" id="fouthevel" min = "0"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="fifthlevel">Fifth-level-limit</label>
                                        <input type="text" class="form-control" name="fifthlevel" id="fifthlevel" min = "0"/>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <button class="btn btn-outline-info" type="submit" name="btn_save_limit" value="Save">Save</button>
                                </div>
                             </form>
                            <hr>
                            
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