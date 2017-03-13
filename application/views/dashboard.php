<?php $this->load->view('partial/head'); ?>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <?php $this->load->view('partial/header'); ?>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
          <?php $this->load->view('partial/sidebar'); ?>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-12 col-sm-12">
                        <h3 class="animated fadeInLeft">DSS  for Mosque Renovation and Rehabilitation <!--  with Simulated Annealing Optimization --> <br> </h3>
                        <!-- <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p> -->
 <div class="pull-right"> Anda Login Sebagai 
                        <?php $a = $this->gen->retrieve_one('level_user',array('id_level' => $this->session->userdata('id_level')));
                        echo "<b>".$a['nama_level']."</b>"; ?>
                        </div>
                       
                    </div>
                  </div>                    
                </div>

                <div class="col-md-12" style="padding:20px;min-height: 5000px; ">
                   

                  <div class="panel padding-0" style="min-height:5000px;">
                    
                    <?php
                    echo @$this->session->flashdata('item');
                    echo "<br />";

                     if(isset($content)){
                    $this->load->view($content);
                    }else{
                    $this->load->view('partial/dummy');
                    }
                    ?>



                    </div>
                </div>
      		  </div>
          <!-- end: content -->
          
      </div>

      <!-- start: Mobile -->
    <?php $this->load->view('partial/sidebar_mobile'); ?>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <?php $this->load->view('partial/js_under'); ?>
  <?php if(!empty($js_under)){
      $this->load->view($js_under);
     }else{
        $js_under = "";
     }
     ?>
  <!-- end: Javascript -->
  </body>
</html>