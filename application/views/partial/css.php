<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/plugins/fullcalendar.min.css"/>
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<?php if(isset($css)){
		$this->load->view($css);
	}
	?>