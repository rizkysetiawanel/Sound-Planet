/*
 *
 *	Sound Planet Player
 *  
 *  Created by = Kelompok 1 BSI
 *  JS FILE
 *
*/

var audio;

var wavesurfer = WaveSurfer.create({
  container: '#waveform',
  waveColor: 'rgba(111, 110, 109, 0.69)',
  progressColor: 'rgba(244, 17, 94, 0.51)',
  splitChannels: false,
  height: 120
});






/*
 *
 *	TOMBOL PLAYER
 *  
 *  tombol ini berisi perintah pause, play, stop dan volume
 *  yang akan memerintahkan music
 *
*/

// VARIABLE

/*
 * KONVERSI HTML - JS VAR
 * mengkonversi dari element html ke variable javascript
 *
*/

// variable play, pause, stop untuk player music
var pauseBtn = $('.pause-sp');
var playBtn = $('.play-sp');
var stopBtn = $('.stop-sp');

// variable volume untuk player music
var volOffBtn = $('.vol-off-sp');
var volOnBtn = $('.vol-sp');

// persiapan player

pauseBtn.hide();

volOffBtn.hide();
$('.player-sp').hide();

initAudio($('#playlist li:first-child'));

function initAudio(element){
	var song = element.attr('song');
	var nameSong = element.attr('nameSong');
	var imgSong = element.attr('imgSong');

	
	audio = new Audio(base_url+'assets/public/user/music/'+ song);
	wavesurfer.load(base_url+'assets/public/user/music/'+ song);
	$('.player-title-sp').html(nameSong);
	$('.player-sp').css({
  						'background': 'url("'+base_url+'assets/public/user/img_music/'+imgSong+'")', 
  						'background-size': 'cover',
  					 });
	$('#playlist li').removeClass('active');
  	element.addClass('active');
  	songDuration();
    audio.volume = parseFloat($('#volume').val() / 10);
	}

$('#playlist li').click(function(){

  $('div.player-sp').show();
  audio.pause();
  initAudio($(this));
  $('.player-sp').show(400);
  $('.play-sp').hide();
  $('.pause-sp').show();
  audio.play();
  songDuration();

});


$('#playlist li:last-child').next(function()
{
	audio.pause();
	alert('terakhir');
});

function songDuration(){
  $(audio).bind('timeupdate',function(){
    //Get hours and minutes
    var s = parseInt(audio.currentTime % 60);
    var m = parseInt(audio.currentTime / 60) % 60;
    if(s < 10){
      s = '0'+s;
    }
    $('.player-duration-sp').html(m + ':'+ s);
    var value = 0;
    if(audio.currentTime > 0){
      value = Math.floor((100 / audio.duration) * audio.currentTime);
    }
    $("wave:nth-child(2)").addClass('stat');
    $('.stat').attr('style', 'width:'+value+'%');
    if(value == 100)
    {
 		  var next = $('#playlist.active').next();
      if(next.length == 0){
        next = $('#playlist li:first-child');
      }
      initAudio(next);
      audio.play();
      songDuration();
    }


  });
}

// Wave music dan untuk seek audio

$("#waveform").on("click", function(e){
    var offset = $(this).offset();
    var left = (e.pageX - offset.left);
    var totalWidth = $("#waveform").width();
    var percentage = ( left / totalWidth );
    var audioTime = audio.duration * percentage;
    audio.currentTime = audioTime;
});


// 	BAGIAN PAUSE, PLAY DAN STOP

playBtn.click(function(){
	audio.play();
	songDuration();
	playBtn.hide();
	pauseBtn.show();
})

pauseBtn.click(function(){
  audio.pause();
  playBtn.show();
  pauseBtn.hide();
})

stopBtn.click(function(){
	audio.pause();
	audio.currentTime = 0;
	playBtn.show();
	pauseBtn.hide();
})


// BAGIAN VOLUME

volOnBtn.click(function(){
	$('#volume').val(0);
	audio.volume = parseFloat(0 / 10);
	volOffBtn.show();
	volOnBtn.hide();
})

volOffBtn.click(function(){
	$('#volume').val(5);
	audio.volume = parseFloat(8 / 10);
	volOffBtn.hide();
	volOnBtn.show();
})



$('#volume').change(function(){
  audio.volume = parseFloat(this.value / 10); // memparse nilai float dari input volume

  // jika volume = 0
  if($('#volume').val()>0) // tombol volume off muncul
	{
		volOffBtn.hide();
		volOnBtn.show();
	}else // tombol volume on muncul
		{
			volOffBtn.show();
			volOnBtn.hide();		
		}
});