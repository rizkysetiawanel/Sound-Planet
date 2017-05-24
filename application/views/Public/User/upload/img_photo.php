<div id="regis-login-close">
X
</div>
<div id="user-upload-content-wrapper" style="width: 32%; margin:auto;">
<style type="text/css">

label
{
	display: block;
}
.btn-upload
{
	width: 200px;
    font-size: 15px;
    background: #E91E63;
    text-align: center;
    color: #fff;
}

input[type=file]
{
	width: 0px;
}

label
{
	padding-bottom: 5px;
}

.img-wrapper
{
    width: 300px;
    height: 300px;
    background: #8b8b8b;
    display: inline-block;
    vertical-align: top;
    margin:auto;
    margin-left: 16%;
    margin-top: 15px;
}

.right
{
width: 57%;
    height: 200px;
    background: #fff;
    display: inline-block;
    vertical-align: top;
    font-family: gudea;
}

.btn-holder
label
{
    display: block;
    margin: auto;
    margin-bottom: 11px;
}
</style>
<div class="btn-holder">
<label for="img-file" class="btn btn-upload">
	Choose Image File
</label>
</div>
<input id="img-file" type="file" name="music-file" accept=".png, .jpg">
	<div class="img-wrapper">
	<div class="left">
	</div>
	</div>
</div>
<div class="btn-holder">
<label class="btn btn-upload save-cover" style="display: none;">
    Save Cover
</label>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/crop/croppie.js"></script>
<link href="<?php echo base_url();?>assets/crop/croppie.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

$('#regis-login-close').click(function(){
	$('#js-show-content').slideUp('400');
})

// upload

$( document ).ready(function() {
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();          
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.file').addClass('ready');
            }           
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('.left').croppie({
        viewport: {
            width: 300,
            height: 300,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#img-file').on('change', function () { readFile(this); $('.save-cover').attr('style', 'display:block;margin: auto;text-align: center;margin-top: -69px; ');});

        $('.save-cover').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        var imgname = $('#img-file').val().replace(/C:\\fakepath\\/i, '');
        var imgnameres = imgname.substr(0, imgname.lastIndexOf('.'))
        $.ajax({
            url: base_url+'user/user/user_photo_cover',
            type: "POST",
            data: {"image":resp,
                   "imgname":imgnameres},
            success: function (data) {
                window.location.href=base_url+'user/'+usernameURL;
            }
        });
        });
    });

});
</script>