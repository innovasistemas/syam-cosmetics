<?php namespace App\Controllers;

use App\Models\Main;

class Setting extends BaseController
{

	public function __construct()
	{
		// parent::__construct();

		// $this->load->helper(array('url', 'form'));
		// $this->load->library('form_validation');
		// $this->load->model("ManagementModel");
		// $this->load->library("Sendy");
	}


	public function __destruct()
	{

	}


	public function index()
	{
		return view('welcome_message');
	}


	public function test()
	{
		// return "hola";
		// $profile = new Main();
		// var_dump($profile->test());
		// $id = 1;
		// return $profile->find($id);+

		$model = new Main();
		$results = $model->test();
		var_dump($results);

        foreach ($results as $row)
        {
	        echo $row->id . "--";
	        echo $row->code . "--";
	        echo $row->name . "<br>";
        }

        echo 'Total Results: ' . count($results);
	}



	//--------------------------------------------------------------------

}
