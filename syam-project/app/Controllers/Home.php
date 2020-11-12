<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
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
