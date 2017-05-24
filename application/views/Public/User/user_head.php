<?php foreach ($user_data as $user_res):?>
<?php endforeach;?>

<div class="user-head-cover-wrapper" style="background-image:url(<?php echo base_url().'assets/public/user/img_user/'.$user_res->cover_url;?>)">
	<div class="user-head-photo">
		<img src="<?php echo base_url().'assets/public/user/img_user/'.$user_res->photo_url;?>" style="width: 100%;height: 100%;">
	</div>
	<div class="user-head-username">
		<?php echo $user_res->username;?>
	</div>
</div>
<div class="user-menu-sp">
	<div class="user-menu-left-sp">
		<nav>
			<ul>
				<a href="#" id="user-track">
					<li>Track</li>
				</a>
				<a href="#">
					<li>Board</li>
				</a>
				<a href="#">
					<li>Follower</li>
				</a>
				<a href="#">
					<li>Following</li>
				</a>
			</ul>
		</nav>
	</div>

	<div class="user-menu-right-sp">
		<?php if($id_user == $user_res->id_user):?>
		<button class="user-change-cover"><i class="fa fa-camera"></i> Change Cover</button>
		<button class="user-change-pprofile"><i class="fa fa-camera"></i> Change Photo</button>
		<?php else:?>
		<?php endif;?>
	</div>
</div>


<script type="text/javascript">
$('.user-change-cover').click(function(){
	$('#js-show-content').slideDown('400');
	$('#js-show-content').load(base_url+'user/user/user_cover_form');
});

$('.user-change-pprofile').click(function(){
	$('#js-show-content').slideDown('400');
	$('#js-show-content').load(base_url+'user/user/user_photo_form');
});
</script>