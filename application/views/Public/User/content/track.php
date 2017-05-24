<style type="text/css">

</style>

<div id="track-list">
<?php foreach($tuser_data as $t_dt):?>
	<?php $iuser = $t_dt->id_user;?>
<?php endforeach;?>

<?php foreach($music_data as $m_dt):?>
	<?php if($m_dt->id_user == $iuser):?>
		<div class="track" song="<?php echo $m_dt->file_song;?>" nameSong="<?php echo $m_dt->name_song;?>" imgSong="<?php echo $m_dt->photo_song;?>">
			<li id="track-play" song="<?php echo $m_dt->file_song;?>" nameSong="<?php echo $m_dt->name_song;?>" imgSong="<?php echo $m_dt->photo_song;?>"></li>
			<label class="track-name"><?php echo $m_dt->name_song;?></label>
			<img src="<?php echo base_url().'assets/public/user/img_music/'.$m_dt->photo_song;?>" style="width: 100%; height: 100%; border-radius: 3px;">
			
		</div>
	<?php endif;?>
<?php endforeach;?>
</div>

<script type="text/javascript" src="http://localhost/soundp/assets/sp-player/js/sp-player.min.js"></script>
