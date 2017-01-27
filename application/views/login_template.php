
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo assets_url ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo assets_url ?>fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Data Animate -->
    <link rel="stylesheet" href="<?php echo assets_url ?>data-animate.css">
    <!-- Font Awesome -->
    <!-- Theme style -->
    <link href="<?php echo assets_url ?>adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo assets_url ?>adminlte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo assets_url ?>jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo assets_url ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </head>
  <body class="login-page">
      <?php echo $_content ?>
    <script>

      $(function() {
        $(".notif").delay(3000).fadeOut(200);
      })
    </script>
  </body>
</html>