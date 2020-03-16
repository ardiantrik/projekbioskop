<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	public function GetMember($where){
		$data = $this->db->get_where('member', $where);
		return $data->row_array();
	}

	public function GetData($tabelName,$where="")
	{
		$data = $this->db->query("select * from ".$tabelName." where ".$where);
		return $data->result_array(); 
	}

	public function GetFilm()
	{
		$this->db->select('*');
		$this->db->from('show_film');
		$this->db->join('film', 'show_film.id_film = film.id_film','inner');
		$data_film = $this->db->get();
		return $data_film->result_array(); 
	}

	public function GetFilmBook($id)
	{
		$this->db->select('*');
		$this->db->from('show_film');
		$this->db->join('film', 'show_film.id_film = film.id_film and show_film.id_show = '.$id,'inner');
		$data_film = $this->db->get();
		return $data_film->row_array(); 
	}

	public function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}

	public function DeleteData($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
	public function UpdateData($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}
}
