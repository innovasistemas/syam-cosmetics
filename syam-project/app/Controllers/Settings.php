<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CountryModel;
use App\Models\ParameterModel;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

class Settings extends ResourceController
{
	protected $helpers = ['url', 'form'];
	protected $format = 'json';
	private $objModels;
	public $request;


	public function __construct()
	{
		$this->objModels = new class{};
		$this->objModels->modelDepartment = new SettingModel();
		$this->objModels->modelCountry = new CountryModel();
		$this->objModels->modelParameter = new ParameterModel();

		$this->request = service('request');
	}


	public function __destruct()
	{

	}


	public function index()
	{

	}


	public function listRecords()
	{
		// if(!empty($this->request->getGet('dataSend'))){
		if(!empty($this->request->getPost('dataSend'))){
            $arrayResponse = array();
			// $arrayData = json_decode($this->request->getGet('dataSend'), TRUE);
			$arrayData = json_decode($this->request->getPost('dataSend'), TRUE);
			$strCodeCountry = $this->objModels->modelParameter
									->getTableName($arrayData['store']['list']);
			$model = 'model' . ucfirst($strCodeCountry);

			if(empty($arrayData['attributes']['identifier'])){
				$arrayResult = $this->objModels->$model
												->getWhere(['active' => 1])
												->getResult();
			}else{
				$arrayResult = $this->objModels->$model
										->getWhere([
													'id' => $arrayData['attributes']['identifier'],
													'active' => 1
												])
										->getResult();
			}

			$arrayResponse = [
                "content" => $arrayResult, 
                "error" => 0
            ];
        }else{
            $arrayResponse = [
                "content" => "Datos incompletos para realizar esta solicitud", 
                "error" => 101
            ];
        }
        
        echo json_encode($arrayResponse);
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
