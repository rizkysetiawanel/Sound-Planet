<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music_model extends CI_Model {


	function get_all_genre()
	{
		$this->db->select('*');
		$this->db->from('sp_genre');

		$query = $this->db->get();
		return $query->result();
	}

	function get_all_music()
	{
		$this->db->select('*');
		$this->db->from('sp_song');

		$query = $this->db->get();
		return $query->result();
	}
}
