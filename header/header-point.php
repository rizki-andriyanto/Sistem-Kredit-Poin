<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Kredit Point</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/logo-nav.css" rel="stylesheet">
    <link href="../assets/css/hover.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/css/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
    <script type="text/javascript" src="../assets/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.ui.timepicker.js?v=0.3.3"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#jam1').timepicker({
                    showPeriodLabels: false
                });
              });
</script>
  <!--<link href="assets/css/bootply.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>




    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                   
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../menu.php">HOME</a>
                    </li>
                    <li>
                        <a href="../daftar-kegiatan/daftar.php">KEGIATAN</a>
                    </li>
                    <li class="active">
                        <a href="daftar.php">POINT</a>
                    </li>
                    <li>
                        <a href="#">KONFIRMASI</a>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">APLIKASI</a>
              
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Entry UKM</a></li>
                          <li><a href="#">Entry Kategori</a></li>
                         <li><a href="#">Entry Lingkup Kegiatan</a></li>
                          <li><a href="../point/tambah.php">Entry Point</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</body>
</html>

