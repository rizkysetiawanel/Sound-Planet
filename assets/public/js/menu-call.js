/*
 *
 *	Sound Planet Login Register
 *  
 *  Created by = Kelompok 1 BSI
 *  JS FILE
 *
*/

var wrapperJs = $('#js-show-content');

wrapperJs.hide();

var liUpload = $('li.user-upload');
var liRegis = $('li.user-regis');
var liLogin = $('li.user-login');

liUpload.click(function(){
	wrapperJs.slideDown('400');
	wrapperJs.load(base_url+'user/user/user_music_form');
});

liRegis.click(function(){

});

liLogin.click(function(){
	wrapperJs.load(base_url+'user/user/user_login');
	wrapperJs.slideDown('400');
	return false;
});




