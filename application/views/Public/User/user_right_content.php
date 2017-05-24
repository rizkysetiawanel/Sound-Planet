</div>
<script type="text/javascript">
$('div.user-left-content-sp').load(base_url+'user/user/user_track/<?php echo $slug_user;?>');
</script>
<script type="text/javascript">
$('.user-menu-left-sp li').click(function(){
	$('.user-menu-left-sp li').removeClass('active');
	$(this).addClass('active');

});
</script>

<div class="user-right-content-sp">