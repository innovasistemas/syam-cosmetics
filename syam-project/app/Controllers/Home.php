<?php namespace App\Controllers;

class Home extends BaseController
{
	// public function index()
	// {
		// return view('welcome_message');
	// }


	public function Countries()
	{
		$data['title'] = ucwords('syam laboratorio'); // Capitalize the first letter

	    echo view('templates/header', $data);
	    echo view('configurations/countries', $data);
	    echo view('templates/footer', $data);
	}


	public function helloWorld()
	{
		// echo "Hello World";
		// return view('hello_world');

		$data['title'] = ucfirst('codeigniter framework'); // Capitalize the first letter

	    echo view('templates/header', $data);
	    echo view('hello_world', $data);
	    echo view('templates/footer', $data);
	}


	

	//--------------------------------------------------------------------

}
