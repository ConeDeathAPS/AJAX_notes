<?php 

class Note extends CI_model
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->session->sess_destroy();
	}

	public function fetch_all()
	{
		return $this->db->query("SELECT * FROM notes ORDER BY created_at DESC")->result_array();
	}

	public function add_note($note_info)
	{
		$query = "INSERT INTO notes (title, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$values = $note_info;
		// var_dump($values);
		// die();
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function delete_note($id)
	{
		return $this->db->query("DELETE FROM notes WHERE id = " . $id);
	}

	public function update_descr($desc_content)
	{
		$query = "UPDATE notes SET description = ? WHERE id =  ?";
		$values = $desc_content;
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_desc_by_id($id)
	{
		return $this->db->query("SELECT description FROM notes WHERE id = " . $id)->row_array();
	}

	public function get_note_by_id($id)
	{
		return $this->db->query("SELECT * FROM notes WHERE id = " . $id)->row_array();
	}

}