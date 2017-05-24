<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	function __construct()
	{
		$this->load->helper('date');
	}

	public function check_user()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("select * from sp_user where email = '$email' and password = '$password'");
		return $query->result();
	}

	public function get_data($slug)
	{
		$this->db->select('*');
		$this->db->from('sp_user');
		$this->db->where('slug_url', $slug);

		$query = $this->db->get();
		return $query->result();
	}

	// save music
	public function save_music_data()
	{
		$song = $_FILES['music-file']['name'];
		$song_rep = str_replace('-', '', $song);
		$song_name = preg_replace('/[^A-Za-z0-9\-]/', '', $song_rep);
		$upload['upload_path'] = './assets/public/user/music/';
		$upload['allowed_types'] = 'mp3';
		$upload['max_size'] = '20000';
		$upload['file_name'] = $song_name;
		
		$this->load->library('upload', $upload);
		
        if (!$this->upload->do_upload('music-file'))

        {

            echo "Maaf music anda tidak bisa di upload silahkan coba file music lain";

        }else
        	{

        		$data = $_POST['imageFile'];
				$imgname = $_POST['imageName'];
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);

				$data = base64_decode($data);
				$imageName = $imgname.time().'.png';
				file_put_contents('assets/public/user/img_music/'.$imageName, $data);

				$date = date('Y-m-d', now());
        		$time = date('H:i:s', now());
        		$dlBtn = $this->input->post('dlBtn');
        		$desc = $this->input->post('descMusic');
        		$genre = $this->input->post('genreMusic');
        		$idUser = $this->input->post('idUser');
				$name = $this->input->post('musicTitle');
				$dataSong = array(
							'file_song'=>$song_name.'.mp3',
							'name_song'=>$name,
							'photo_song'=>$imageName,
							'id_user'=>$idUser,
							'desc_song'=>$desc,
							'dlbtn_song'=>$dlBtn,
							'id_genre'=>$genre,
							'date_song'=>$date,
							'time_song'=>$time,
							'date_time'=>$date.' '.$time,
					);

				$this->db->insert('sp_song', $dataSong);
        	}
	}

	// save cover image

	public function save_cover_image($id_user)
	{
		$data = $_POST['image'];
		$imgname = $_POST['imgname'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data = base64_decode($data);
		$imageName = $id_user.$imgname.time().'.png';
		file_put_contents('assets/public/user/img_user/'.$imageName, $data);

		$rename = array(
					'cover_url'=>$imageName,
			);

		$this->db->where('id_user', $id_user);
		$this->db->update('sp_user', $rename);
	}

	// save photo image

	public function save_photo_image($id_user)
	{
		$data = $_POST['image'];
		$imgname = $_POST['imgname'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data = base64_decode($data);
		$imageName = $id_user.$imgname.'.png';
		file_put_contents('assets/public/user/img_user/'.$imageName, $data);

		$rename = array(
					'photo_url'=>$imageName,
			);

		$this->db->where('id_user', $id_user);
		$this->db->update('sp_user', $rename);
	}


}