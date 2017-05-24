<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	/**************************************************
	 * MENLOAD DATA MODEL / LIBRARY
	***************************************************/
	function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('music_model');

	}
	
	/**************************************************
	 * FUNCTION INDEX / DASAR
	***************************************************/	
	function index()
	{
		redirect('public/main/home');
	}

	/**************************************************
	 * FUNCTION PAGE
	 *
	 * - fungsi - fungsi ini adalah mengatur halaman
	 *   - halaman yang dibuka
	 *
	***************************************************/

	public function home()
	{
		$data['web_title'] = "Sound Planet";
		$user_data = isset($_SESSION['sp_user']) ? $_SESSION['sp_user']:'';
		$data['music_data'] = $this->music_model->get_all_music();
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
		 	}
		$this->load->view('public/template/head', $data);
		$this->load->view('public/template/menu', $data);
		$this->load->view('public/template/content', $data);
		$this->load->view('public/home', $data);
		$this->load->view('public/template/footer', $data);
	}
}