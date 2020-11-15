<?php namespace App\Controllers;

use App\Models\SettingModel;

class Setting extends BaseController
{
	private $objModels;


	public function __construct()
	{
		$this->objModels = new class{};
		$this->objModels->modelDepartment = new SettingModel();
	}


	public function __desctruct()
	{

	}


	public function test()
	{

		// $results = $model->test();
		// $data['result'] = $model->orderBy('id', 'DESC')->findAll();
		$data['first'] = $this->objModels->modelDepartment->find(11);

		$data['where'] = $this->objModels->modelDepartment
							->getWhere(['id' => 4])
							->getResult();
		// var_dump($results);

        // foreach ($results as $row)
        // {
	    //     echo $row->id . "--";
	    //     echo $row->code . "--";
	    //     echo $row->name . "<br>";
        // }
        // foreach ($data['where']->getResult() as $row)
        // {
	    //     echo $row->id . "--";
	    //     echo $row->code . "--";
	    //     echo $row->name . "\n<br>";
        // }

		// echo "<br>";
        // echo 'Total Results: ' . count($results);
		// echo print_r($results);
		echo print_r($data);
		// echo json_encode($results);
	}



	//--------------------------------------------------------------------

}
