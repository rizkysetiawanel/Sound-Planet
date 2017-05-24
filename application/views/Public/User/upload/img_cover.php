<div id="regis-login-close">
X
</div>
<div id="user-upload-content-wrapper" style="width: 86%; margin:auto;">
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
    width: 1147px;
    height: 213px;
    background: #8b8b8b;
    display: inline-block;
    vertical-align: top;
    margin-left: 6px;
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
	display: inline-block;
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
            width: 1147,
            height: 213,
            type: 'square'
        },
        boundary: {
            width: 1147,
            height: 213
        }
    });

    $('#img-file').on('change', function () { readFile(this); $('.save-cover').attr('style', 'display:block;margin: auto;text-align: center;margin-top: -100px; ');});

        $('.save-cover').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        var imgname = $('#img-file').val().replace(/C:\\fakepath\\/i, '');
        var imgnameres = imgname.substr(0, imgname.lastIndexOf('.'))
        $.ajax({
            url: base_url+'user/user/user_save_cover',
            type: "POST",
            data: {"image":resp,
                   "imgname":imgnameres},
            success: function (data) {
                alert(imgname);
            }
        });
        });
    });

});
</script>