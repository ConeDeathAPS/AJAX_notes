<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->session->sess_destroy();
	}

	public function index()
	{
		$this->load->view("display");
	}

		public function index_html()
	{
		$this->load->Model("Note");
		$notes = $this->Note->fetch_all();
		// var_dump($notes);
		// die();
		$this->load->view("/Partials/format", array("notes" => $notes));
	}

	public function add_note()
	{
		$this->load->Model("Note");
		$note_data = $this->input->post();

		$id = $this->Note->add_note($note_data);
		$notes = $this->Note->fetch_all();
		// die();
		$this->load->view("/Partials/format", array("notes" => $notes));
	}

	public function remove_note()
	{
		$this->load->Model("Note");
		$id = $this->input->post("delete_id");
		$this->Note->delete_note($id);
		redirect("/");
	}

	public function update_description()
	{
		$this->load->Model("Note");
		//set local variables
		$id = $this->input->post("update_id");
		$content = $this->input->post("description");

		$desc_info = array(
							"description" => $content,
							"id" => $id
							);

		$this->Note->update_descr($desc_info);
		$notes = $this->Note->fetch_all();
		$this->load->view("/Partials/format", array("notes" => $notes));
	}
}