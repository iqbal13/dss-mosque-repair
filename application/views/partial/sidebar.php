 

  <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li style="margin-bottom: 15px;">
                    <img src="<?php echo base_url();?>assets/images/logo.png" style="height:130px;">
                    </li>
                    <li> </li>
                    <li> </li>
                   <!--  <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                      </ul>
                    </li> -->

                    <?php if($_SESSION['id_level'] == "3"){ ?>
                    <li><a href="<?=base_url('manajemenuser');?>"> <span class="fa fa-users fa"> </span> Manajemen Users </a> </li>
                    <?php } else { ?>

                    <li><a href="<?php echo base_url('home');?>"> <span class="fa-home fa"></span> Dashboard</a></li>
                    
                    <li><a href="<?=base_url('optimasi/beforeoptimasi');?>"> <span class="fa fa-navicon fa"> </span> Optimasi </a></li>
                    <li><a href="<?php echo base_url('masjid/tambah');?>"> <span class="fa fa-plus fa"> </span> Tambah Data </a> </li>
                    <li><a href="<?php echo base_url('masjid');?>"> <span class="fa fa-university fa"> </span> List Masjid</a></li>
                <li><a href="<?=base_url('report');?>"> <span class="fa fa-doc fa"> </span> Laporan </a> </li>

                <?php } ?>

                    <li><a href="<?php echo base_url('logout');?>"> <span class="fa fa-sign-out"> </span> Logout</a></li>

                    <li class="time">
                      <h1 class="animated fadeInLeft"> <?php //echo date('H:i'); ?></h1>
                      
                    </li>

                  </ul>
                </div>
            </div>