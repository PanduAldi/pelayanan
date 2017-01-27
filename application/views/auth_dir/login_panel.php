    <div class="login-box" data-animate="fadeInLeft">
      <div class="login-logo">
        <img src="<?php echo base_url('media/img/Brebes.png') ?>" class="hidden-xs" alt="" width="120" height="120"><br><br>
        <a href="<?php echo site_url('login') ?>"><b>Sistem Informasi Manajemen</b><br>Administrasi Pelayanan Kependudukan <br> DINDUKCAPIL BREBES
        </a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p>Silahkan Login</p>
        <form action="<?php echo site_url('login_action') ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"><i class="glyphicon glyphicon-log-in"></i> Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>
        <br>
        <div class="notif">
          <?php echo $this->session->flashdata('username'); ?>
          <?php echo $this->session->flashdata('password'); ?>
          <?php echo $this->session->flashdata('login_failed'); ?>
          <?php echo $this->session->flashdata('user_block'); ?>
          <?php echo $this->session->flashdata('user_non_active'); ?>
        </div>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <div class="footer" align="center">
        <strong>Copyright @ <?php echo date('Y')  ?>. <a href="javascript:void(0)" style="">Dinas Kependudukan & Pencatatan Sipil Kabupaten Brebes</a> </strong>
    </div>

<script>
  $(function(){
      $('input[name=username]').focus();
  })
</script>

<style>
    .login-box 
    {
        width : 700px;
        margin-top : 15px;
    }

    .login-logo {
        font-size: 20px;
    }

    .login-box-body {
      width: 400px;
      position: relative;
      right: -150px;
    }
    
    .footer {
      position : fixed;
      bottom : 0px;
      width: 100%;
      background-color: #fff;
      padding: 10px;
    }

    @media (max-width : 768px)
    {
      .login-box 
      {
          width : 400px;
      }
      .login-logo 
      {
        font-size: 20px;
      }     
      .login-box-body {
        width: 400px;
        position: relative;
        right: 0px;
      }
    }
</style>