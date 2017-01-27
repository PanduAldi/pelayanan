 <?php  
    $pindah_menu = $this->db->get_where('jenis_pelayanan', array('pelayanan_id' => 10))->result_array();
    $akta_menu = $this->db->get_where('jenis_pelayanan', array('pelayanan_id' => 9))->result_array();
    $ktp_menu = $this->db->get_where('jenis_pelayanan', array('pelayanan_id' => 7))->result_array();
    $kk_menu = $this->db->get_where('jenis_pelayanan', array('pelayanan_id' => 11))->result_array();
?>

          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="<?php echo ($this->uri->segment(1) == "dashboard")?"active":"" ?>"><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
  
            <!-- Pelayanan Akta -->
            <?php if ($this->session->userdata('u_pelayanan_id') == ""): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-file-text"></i> <span>Pelayanan Akta</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <?php foreach ($akta_menu as $k): ?>
                   <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-circle-o"></i>Data <?php echo ucwords($k['jenis_name']) ?></a></li>
                 <?php endforeach ?>
                </ul>
              </li> 
            <?php endif ?>

            <?php if($this->session->userdata('u_pelayanan_id') == 9): ?>
              <li class="<?php echo ($this->uri->segment(1) == "input-akta")?"active":"" ?>"><a href="<?php echo site_url('input-akta') ?>"><i class="fa fa-edit"></i>Input Permohonan</a></li>
              <?php foreach ($akta_menu as $k): ?>
               <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-file-text-o"></i>Data <?php echo ucwords($k['jenis_name']) ?></a></li>
             <?php endforeach ?>
            <?php endif ?>            

            <!-- Pelayanan KTP -->
            <?php if ($this->session->userdata('u_pelayanan_id') == ""): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-credit-card"></i> <span>Pelayanan KTP</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <?php foreach ($ktp_menu as $k): ?>
                   <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-circle-o"></i><?php echo ucwords($k['jenis_name']) ?></a></li>
                 <?php endforeach ?>
                </ul>
              </li> 
            <?php endif ?>

            <?php if($this->session->userdata('u_pelayanan_id') == 7): ?>
              <li class="<?php echo ($this->uri->segment(1) == "input-akta")?"active":"" ?>"><a href="<?php echo site_url('input-akta') ?>"><i class="fa fa-edit"></i>Input Permohonan</a></li>
              <?php foreach ($ktp_menu as $k): ?>
               <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-file-text-o"></i>Data <?php echo ucwords($k['jenis_name']) ?></a></li>
             <?php endforeach ?>
            <?php endif ?> 

            <!-- Pindah Datang -->
            <?php if ($this->session->userdata('u_pelayanan_id') == ""): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>Pelayanan Pindah/Datang</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                 <?php foreach ($pindah_menu as $k): ?>
                   <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-circle-o"></i><?php echo ucwords($k['jenis_name']) ?></a></li>
                 <?php endforeach ?>
                </ul>
              </li> 
            <?php endif ?>

            <?php if($this->session->userdata('u_pelayanan_id') == 10): ?>
            
              <li class="<?php echo ($this->uri->segment(1) == "input-akta")?"active":"" ?>"><a href="<?php echo site_url('input-akta') ?>"><i class="fa fa-edit"></i>Input Permohonan</a></li>
                 <?php foreach ($pindah_menu as $k): ?>
                   <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-file-text-o"></i>Data Permohonan <?php echo ucwords($k['jenis_name']) ?></a></li>
                 <?php endforeach ?>
            <?php endif ?> 

            <!-- Pelayanan KK -->
            <?php if ($this->session->userdata('u_pelayanan_id') == ""): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-database"></i> <span>Pelayanan KK</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <?php foreach ($kk_menu as $k): ?>
                   <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-circle-o"></i><?php echo ucwords($k['jenis_name']) ?></a></li>
                 <?php endforeach ?>
                </ul>
              </li> 
            <?php endif ?>


            <?php if($this->session->userdata('u_pelayanan_id') == 11): ?>
              <li class="<?php echo ($this->uri->segment(1) == "input-akta")?"active":"" ?>"><a href="<?php echo site_url('input-akta') ?>"><i class="fa fa-edit"></i>Input Permohonan</a></li>
              <?php foreach ($kk_menu as $k): ?>
               <li class="<?php echo ($this->uri->segment(1) == $k['jenis_name'])?"active":"" ?>"><a href="<?php echo site_url($k['link']) ?>"><i class="fa fa-file-text-o"></i><?php echo ucwords($k['jenis_name']) ?></a></li>
             <?php endforeach ?>
            <?php endif ?> 

            <?php if ($this->session->userdata('u_role_name') == "admin"): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cog"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($this->uri->segment(1) == "setting-pelayanan")?"active":"" ?>"><a href="<?php echo site_url('setting-pelayanan') ?>"><i class="fa fa-circle-o"></i>Pelayanan</a></li>
                  <li class="<?php echo ($this->uri->segment(1) == "setting-jenis_pelayanan")?"active":"" ?>"><a href="<?php echo site_url('setting-jenis_pelayanan') ?>"><i class="fa fa-circle-o"></i> Jenis Pelayanan</a></li>
                  <li class="<?php echo ($this->uri->segment(1) == "sextting-persyaratan")?"active":"" ?>"><a href="<?php echo site_url('setting-persyaratan') ?>"><i class="fa fa-circle-o"></i> Persyaratan </a></li>
                  <li class="<?php echo ($this->uri->segment(1) == "setting-user")?"active":"" ?>"><a href="<?php echo site_url('setting-user') ?>"><i class="fa fa-circle-o"></i> User</a></li>
                </ul>
              </li>              
            <?php endif ?>
          </ul>