<div id="head-sp">
	<div class="head-sp-logo">
		<?php echo $web_title;?>
	</div>
	<?php if($id_user != NULL):?>
	<div class="head-user-sign">
	
	<div class="photo" style="background:url(<?php echo base_url().'assets/public/user/img_user/'.$photo_user;?>);background-size: cover;background-position-x: -6px;">
	</div>
	<a href="<?php echo base_url().'user/'.$url_user;?>">
	<div class="username">
		<?php echo $username_user;?>
	</div>
	</a>
	</div>
	<?php else:?>
	<?php endif;?>

	<div class="head-menu-sp">
		<nav>
			<ul>
			<?php if($id_user != NULL):?>
				<a href="#">
					<li class="user-ogout" style="background: #9E9E9E;"><i class="ic fa fa-sign-out" ></i> Logout</li>
				</a>
				<a href="#">
					<li class="user-upload" style="background: #3F51B5;"><i class="ic fa fa-upload" ></i> Upload</li>
				</a>
			<?php else:?>
				<a href="#">
					<li class="user-regis"><i class="ic fa fa-user-o"></i> Daftar</li>
				</a>
				<a href="#">
					<li class="user-login"><i class="ic fa fa-vcard-o"></i> Login</li>
				</a>
			<?php endif;?>
				<a href="#">
					<li><i class="ic fa fa-music"></i> Browse</li>
				</a>
				<a href="#">
					<li><i class="ic fa fa-tags"></i> Genre</li>
				</a>
				<a href="#">
					<li><i class="ic fa fa-search"></i> Search</li>
				</a>
			</ul>
		</nav>
	</div>

	<!-- player -->

	<div class="player-sp" style="background-size: cover;">
	<div class="player-controll-wrapper-sp" style="background: rgba(255, 255, 255, 0); height: 100%;">

		<div class="player-controll-sp">
			<span class="play-sp"> <i class="fa fa-play-circle-o"></i> </span>
			<span class="pause-sp"> <i class="fa fa-pause-circle-o"></i> </span>
			<span class="stop-sp"> <i class="fa fa-stop-circle-o"></i> </span>
			<span class="vol-sp"><i class="fa fa-volume-up"></i></span>
			<span class="vol-off-sp"><i class="fa fa-volume-off"></i></span>
			<div class="vol-bar-sp">
				<div style="margin-top: -20px;">
				<input id="volume" type="range" min="0" max="10" value="10">
				</div>
			</div>
		</div>
		<div id="waveform"></div>
		<div class="player-title-duration-sp">
			<div class="player-title-sp">
			</div>
			<div class="player-duration-sp">
			</div>	
		</div>
	</div>
	</div>

	<!-- player berakhir -->
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/menu-call.js"></script>

