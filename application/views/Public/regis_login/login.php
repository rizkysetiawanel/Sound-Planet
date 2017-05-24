<style type="text/css">
#regis-login-content-wrapper
label
{
	display: block;
	padding-top: 10px;
	padding-bottom: 10px;
	font-family: gudea;
    display: block;
    text-align: center;
    border-bottom: 1px solid#ddd;
    margin-bottom: 8px;
}
</style>

<form id="login-form" method="POST" action="<?php echo base_url();?>user/user_check">
<label>Email</label>
<input class="sp-input-text" type="text" name="email">
<label>Password</label>
<input class="sp-input-text" type="password" name="password">

<button type="submit" class="btn btn-login">Login</button>
</form>
<script type="text/javascript">

var LRbtnClose = $('#regis-login-close');

LRbtnClose.click(function(){
	wrapperLR.slideUp(400);
})

</script>