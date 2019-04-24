<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->load->view('page_header');

		$this->load->model('Image_model');
		$data['result'] = $this->Image_model->select_images();
		$this->load->view('page_content', $data);

		$this->load->view('page_footer');
	}

	public function dev()
	{
		$this->load->view('page_header');
		$this->load->view('page_footer');
	}

	public function upload()
	{

		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('url', 'Url', 'trim|required',
			array(
				'trim' => 'Bitte verwenden Sie keine Leerzeichen im Image-Feld (Link).',
				'required' => 'Sie müssen das Pflichtfeld Image (Link) ausfüllen.'
			)
		);
		$this->form_validation->set_rules('alt', 'Alt', 'trim|required',
			array(
				'trim' => 'Bitte verwenden Sie keine Leerzeichen im Alt-Feld (Beschreibung) .',
				'required' => 'Sie müssen das Pflichtfeld Alt (Beschreibung) ausfüllen.'
			)
		);
		$this->form_validation->set_rules('quelle', 'Quelle', 'trim|required',
			array(
				'trim' => 'Bitte verwenden Sie keine Leerzeichen im Quelle-Feld (Link).',
				'required' => 'Sie müssen das Pflichtfeld Quelle (Link) ausfüllen.'
			)
		);

		/* if POST */
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			/* Daten an DB */
			$data = array(
				'url'		=>  $this->input->post('url'),
				'alt'  		=>  $this->input->post('alt'),
				'quelle'    =>  $this->input->post('quelle'),
			);

			$this->load->model('Image_model');
			if ($this->Image_model->insert_image($data)) {
				echo "Image erfolgreich hochgeladen.";
			} else {
				echo "DB-Fehler";
			}
		}
	}

	public function delete()
	{

		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('id', 'Id', 'trim|required',
			array(
				'trim' => 'Bitte verwenden Sie keine Leerzeichen im ID-Feld (Nummer).',
				'required' => 'Sie müssen das Pflichtfeld ID (Nummer) ausfüllen.'
			)
		);

		/* if POST */
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			/* Daten an DB */
			$data = array(
				'id'	=>	$this->input->post('id'),
			);

			$this->load->model('Image_model');
			if ($this->Image_model->delete_image($data) > 0) {
				echo "Image erfolgreich gelöscht.";
			} else {
				echo "Fehlerhafte ID";
			}
		}
	}

	public function like()
	{
		$data = array(
			'likes'  	=>  $this->input->post('likes')+1
		);

		$this->load->model('Image_model');
		if ($this->Image_model->update_like($this->input->post('id'), $data)) {
			echo $data['likes'];
		} else {
			echo "DB-Fehler";
		}
	}

	public function datenschutz()
	{
		$this->load->view('page_header');
		$this->load->view('datenschutz');
		$this->load->view('page_footer');
	}

	public function impressum()
	{
		$this->load->view('page_header');
		$this->load->view('impressum');
		$this->load->view('page_footer');
	}

}
