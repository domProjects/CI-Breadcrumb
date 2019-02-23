<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_breadcrumb extends CI_Controller {

	public function index()
	{
		// Load library breadcrumb
		$this->load->library('breadcrumb');

		// Add items
		$breadcrumb_items = [
			'Dashboard' => '/',
			'Users' => 'users',
			'Add' => 'users/add'
		];

		// Exemple : default style
		//
		// Add items
		$this->breadcrumb->add_item($breadcrumb_items);
		// Generate breadcrumb
		$data['breadcrumb_default_style'] = $this->breadcrumb->generate();

		// Exemple : Bootstrap style
		//
		// Custom style
		$template = [
			'tag_open' => '<ol class="breadcrumb">',
			'crumb_open' => '<li class="breadcrumb-item">',
			'crumb_active' => '<li class="breadcrumb-item active" aria-current="page">'
		];
		$this->breadcrumb->set_template($template);
		// Add items
		$this->breadcrumb->add_item($breadcrumb_items);
		// Generate breadcrumb
		$data['breadcrumb_bootstrap_style'] = $this->breadcrumb->generate();


		// Load view test_breadcrumb.php page
		$this->load->view('test_breadcrumb', $data);
	}
}
