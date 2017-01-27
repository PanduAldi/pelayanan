
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title ?> | Suket Offline</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   
    <link rel="shortcut icon" href="<?php echo base_url('media/img/Brebes.png') ?>">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo assets_url ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo assets_url ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Data Animate -->
    <link rel="stylesheet" href="<?php echo assets_url ?>data-animate.css">
    <!-- Theme style -->
    <link href="<?php echo assets_url ?>adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- datatables -->
    <link rel="stylesheet" href="<?php echo assets_url ?>datatables/dataTables.bootstrap.css">    
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo assets_url ?>adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
  <body class="skin-green sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>PEL</b></span>
          <!-- logo for regular state and mobilse devices -->
          <span class="logo-lg"><b>SIMANDUK</b>BREBES</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if ($this->session->userdata('u_jk') == "l"): ?>
                  <img src="<?php echo assets_url ?>adminlte/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                <?php else: ?>
                  <img src="<?php echo assets_url ?>adminlte/dist/img/avatar3.png" class="user-image" alt="User Image"/>
                <?php endif ?>
                  <span class="hidden-xs"><?php echo $this->session->userdata('u_username'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php if ($this->session->userdata('u_jk') == "l"): ?>
                    <img src="<?php echo assets_url ?>/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image" />
                  <?php else: ?>
                   <img src="<?php echo assets_url ?>/adminlte/dist/img/avatar3.png" class="img-circle" alt="User Image" />
                  <?php endif ?>
                    
                    <p>
                      <?php echo $this->session->userdata('u_fullname'); ?>
                      <small>Terakhir Login : <?php echo tgl_indo($this->session->userdata('u_last_login'))?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?php echo $_sidebar; ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title ?>
          </h1>
        </section>


        <!-- Main content -->
        <section class="content">
              <?php echo $_content ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- <footer class="main-footer"> -->
      <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="https://facebook.com/PanduAldiaja" target="_blank">DINDUKCAPIL Kabupaten Brebes</a></strong> 
      </footer>
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    </div><!-- ./wrapper -->


    <!-- SlimScroll -->
    <script src="<?php echo assets_url ?>adminlte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo assets_url ?>adminlte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo assets_url ?>adminlte/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Datatable -->
    <script src="<?php echo assets_url ?>datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo assets_url ?>datatables/dataTables.bootstrap.min.js"></script>  
    <!-- Notify -->
    <script src="<?php echo assets_url ?>notify.min.js"></script>

    <script>
        $(function(){
            $.notify('<?php echo $this->session->flashdata('notif'); ?>', {
               'className' : 'success',
               'globalPosition' : "top center"
                
            });
        })

        $(function(){
            $.notify('<?php echo $this->session->flashdata('failed'); ?>', {
               'className' : 'error',
               'globalPosition' : "top center"
            });
        })

        function hapus(id)
        {
            $("input[name=id]").val(id);
            $("#hapus_data").modal("show");
        }

        $(function(){
            $("#datatable").dataTable();
        })
    </script>
  </body>
</html>