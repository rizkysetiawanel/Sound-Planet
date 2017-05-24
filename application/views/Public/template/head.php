<!DOCTYPE html>
<html lang=id>
<head>
	<!-- meta -->
	<!-- mengambil data js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/wavesurfer.min.js"></script>

	<!-- mengambil data css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/css/user.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sp-player/css/player.css">
	<!-- mengambil data google font -->
	<link href="https://fonts.googleapis.com/css?family=Baloo|Gudea|News+Cycle|Work+Sans" rel="stylesheet">
	<!-- mengambil data font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- mengambil data library jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- var base_url js -->
	<script type="text/javascript"> var base_url = '<?php echo base_url();?>';</script>
	<?php if($id_user != NULL):?>
	<script type="text/javascript"> var usernameURL = '<?php echo $url_user;?>';</script>
	<?php endif;?>
	<title><?php echo $web_title;?></title>
</head>
<style type="text/css">
	html
		{
			width: 100%;
			height: 100%;
			margin:0px;
			padding: 0px;
		}

	body
		{
			width: 100%;
			height: 100%;
			margin:0px;
			padding: 0px;
		}

	#js-show-content
		{
			width: 100%;
    		height: 100%;
   		 	position: fixed;
    		z-index: 99999;
    		background: rgba(15, 15, 15, 0.68);
		}
</style>
<body>

<div id="js-show-content">
</div>

