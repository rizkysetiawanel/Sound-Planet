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

#genre-music
{
	width: 99%;
    padding: 5px;
    font-family: gudea;
}

.img-wrapper
{
    width: 300px;
    height: 300px;
    background: #8b8b8b;
    display: inline-block;
    vertical-align: top;
    margin-right: 9px;
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
<label for="music-file" class="btn btn-upload" >
	Choose Music File
</label>
<label for="img-file" class="btn btn-upload">
	Choose Image File
</label>

</div>
<input id="music-file" type="file" name="music-file" accept=".mp3">
<input id="img-file" type="file" name="img-file" accept=".jpg,.png">
<input id="id-user" type="text" name="id-user" value="<?php echo $id_user;?>" style="display: none;">
	<div class="img-wrapper">
	<div class="left">
	</div>
	</div>

	<div class="right">
		<label>Title</label>
		<input class="sp-input-text music-title" type="text" name="music-title" value="">
		<label>Genre</label>
		<select id="genre-music" name="genre-music">
				<option value="0">-- Select Genre --</option>
			<?php foreach($genre_data as $gr_data):?>
				<option value="<?php echo $gr_data->id_genre;?>"><?php echo $gr_data->title_genre;?></option>
			<?php endforeach;?>
		</select>
		<label>Description</label>
		<textarea class="sp-input-text music-desc" style="height: 100px;"></textarea>
		<br>
		<input type="checkbox" id="dl-btn" name="dl-btn" value="1"> Click if the content is downloadable
		<br>
		<label class="btn btn-upload save-music">
			Save Music
		</label>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/crop/croppie.js"></script>
<link href="<?php echo base_url();?>assets/crop/croppie.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

var musicIpt = $('#music-file');
var musicTitlteIpt = $('.music-title');

musicIpt.on('change', function(){
	var res = musicIpt.val().split('\\').pop();
	output = res.substr(0, res.lastIndexOf('.'));
	$('.music-title').val(output);
	
});

$('#regis-login-close').click(function(){
	$('#js-show-content').slideUp('400');
})

// img resize
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

    $('#img-file').on('change', function () { readFile(this); $('.save-cover').attr('style', 'display:block;margin: auto;text-align: center;margin-top: -100px; ');});

        $('.save-music').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        var imgname = $('#img-file').val().replace(/C:\\fakepath\\/i, '');
        var imgnameres = imgname.substr(0, imgname.lastIndexOf('.'))
        var formData = new FormData();
		formData.append('music-file', $('input#music-file')[0].files[0]);
		formData.append('imageFile', resp);
		formData.append('musicTitle', $('.music-title').val());
		formData.append('genreMusic', $('#genre-music').val());
		formData.append('descMusic', $('.music-desc').val());
		formData.append('idUser', $('#id-user').val());
		formData.append('imageName', imgnameres);
		formData.append('dlBtn', $('#dl-btn').val());
			$.ajax({
    			url: base_url+'user/user/user_music_upload',
    			data: formData,
    			type: 'POST',
    			contentType: false,
    			processData: false,
    			success: function (data) {
                		alert(data);
            		}
			});
        });
    });

});



</script>