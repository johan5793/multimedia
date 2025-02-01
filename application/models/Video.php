<?php
	class Video extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		public function obtenerVideo($id){
			$this->db->where('id', $id);
			$query = $this->db->get('videos');
			return $query->row();
		}
	}
?>