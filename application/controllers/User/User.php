<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	/**************************************************
	 * MENLOAD DATA MODEL / LIBRARY
	***************************************************/
	function __construct()
	{
		parent::__construct();

		//load model
		$this->load->model('user_model');
		$this->load->model('music_model');

	}
	
	/**************************************************
	 * FUNCTION INDEX / DASAR
	***************************************************/	
	function index()
	{
		
	}

	/**************************************************
	 * FUNCTION USER LOGIN
	***************************************************/

	//login
	public function user_login()
	{
		$this->load->view('public/regis_login/content.php');
		$this->load->view('public/regis_login/login.php');
	}

	public function user_check()
	{
		$res_check = $this->user_model->check_user();

		if(count($res_check)>0)
		{
			foreach ($res_check as $res_user) {
				$data_session = $res_user->id_user."|".$res_user->username."|".$res_user->photo_url."|".$res_user->slug_url."|".$res_user->status_user;
				$url = $res_user->username;
			}

			$_SESSION['sp_user'] = $data_session;
			redirect('public/main');
		} else
			{
				echo "Gagal Login".md5($this->input->post('password'));
			}
	}

	// register
	public function user_register()
	{
		
	}

	// logout
	public function user_logout()
	{
		session_destroy();
		redirect('public/main');
	}



	/**************************************************
	 * FUNCTION USER PROFILE
	***************************************************/
	public function user_profile($slug)
	{

		$data['web_title'] = "Sound Planet";
		$data['user_data'] = $this->user_model->get_data($slug);
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';
		$data['slug_user'] = $slug;
		if(empty($user_data))
		{
			$data['id_user'] = '';
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$data['id_user'] = $user_fdata[0];
		 		$data['username_user'] = $user_fdata[1];
		 		$data['photo_user'] = $user_fdata[2];
		 		$data['url_user'] = $user_fdata[3];
		 		$data['status_user'] = $user_fdata[4]; 
		 		$data['web_desc'] = $user_fdata[1]; 
		 	}

		$this->load->view('public/template/head', $data);
		$this->load->view('public/template/menu', $data);
		$this->load->view('public/template/content', $data);
		$this->load->view('public/user/user_head', $data);
		$this->load->view('public/user/user_content', $data);
		$this->load->view('public/user/user_left_content', $data);
		$this->load->view('public/user/user_left_content_end', $data);
		$this->load->view('public/user/user_right_content', $data);
		$this->load->view('public/template/footer', $data);
	}

	/**************************************************
	 * FUNCTION USER TRACK
	***************************************************/

	public function user_track($slug)
	{
		$data['tuser_data'] = $this->user_model->get_data($slug);
		$data['genre_data'] = $this->music_model->get_all_genre();
		$data['music_data'] = $this->music_model->get_all_music();

		$this->load->view('public/user/content/track', $data);
		
	}

	/**************************************************
	 * FUNCTION USER UPLOAD MUSIC
	***************************************************/

	// form upload
	public function user_music_form()
	{
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';

		if(empty($user_data))
		{
			$data['id_user'] = '';
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$data['id_user'] = $user_fdata[0];
		 		$data['username_user'] = $user_fdata[1];
		 		$data['photo_user'] = $user_fdata[2];
		 		$data['url_user'] = $user_fdata[3];
		 		$data['status_user'] = $user_fdata[4]; 
		 		$data['web_desc'] = $user_fdata[1]; 
		 		$data['genre_data'] = $this->music_model->get_all_genre();
		 	}

		$this->load->view('public/user/upload/content', $data);
		$this->load->view('public/user/upload/music', $data);
	}

	public function user_music_upload()
	{
		$this->user_model->save_music_data();
	}
	/**************************************************
	 * FUNCTION USER UPLOAD IMG COVER
	***************************************************/

	public function user_cover_form()
	{
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';

		if(empty($user_data))
		{
			$data['id_user'] = '';
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$data['id_user'] = $user_fdata[0];
		 		$data['username_user'] = $user_fdata[1];
		 		$data['photo_user'] = $user_fdata[2];
		 		$data['url_user'] = $user_fdata[3];
		 		$data['status_user'] = $user_fdata[4]; 
		 		$data['web_desc'] = $user_fdata[1]; 
		 	}
		$this->load->view('public/user/upload/img_cover', $data);
	}

	public function user_save_cover()
	{
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';

		if(empty($user_data))
		{
			redirect(base_url());
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$id_user = $user_fdata[0];
		 	}
		$this->user_model->save_cover_image($id_user);
	}

	/**************************************************
	 * FUNCTION USER UPLOAD IMG PHOTO
	***************************************************/

	public function user_photo_form()
	{
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';

		if(empty($user_data))
		{
			$data['id_user'] = '';
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$data['id_user'] = $user_fdata[0];
		 		$data['username_user'] = $user_fdata[1];
		 		$data['photo_user'] = $user_fdata[2];
		 		$data['url_user'] = $user_fdata[3];
		 		$data['status_user'] = $user_fdata[4]; 
		 		$data['web_desc'] = $user_fdata[1]; 
		 	}
		$this->load->view('public/user/upload/img_photo', $data);
	}

	public function user_photo_cover()
	{
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';

		if(empty($user_data))
		{
			redirect(base_url());
		}
		 else
		 	{
		 		$user_fdata = explode('|', $user_data);
		 		$id_user = $user_fdata[0];
		 	}
		$this->user_model->save_photo_image($id_user);
	}
}