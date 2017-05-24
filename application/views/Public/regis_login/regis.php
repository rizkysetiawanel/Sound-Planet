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

<form id="regis-form">
<label>Username</label>
<input class="sp-input-text" type="text" name="username">
<label>Email</label>
<input class="sp-input-text" type="text" name="username">
<label>Password</label>
<input class="sp-input-text" type="password" name="Password">
<label>Confirmation Password</label>
<input class="sp-input-text" type="password" name="Password">

<button type="submit" class="btn btn-daftar">Daftar</button>
</form>
<script type="text/javascript">

var LRbtnClose = $('#regis-login-close');

LRbtnClose.click(function(){
	wrapperLR.slideUp(400);
})

</script>