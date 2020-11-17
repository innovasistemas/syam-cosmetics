<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CountryModel;
use App\Models\ParameterModel;


use CodeIgniter\HTTP\IncomingRequest;

class Setting extends BaseController
{
	private $objModels;

	protected $helpers = ['url', 'form'];

	public $request;


	public function __construct()
	{
		$this->objModels = new class{};
		$this->objModels->modelDepartment = new SettingModel();
		$this->objModels->modelCountry = new CountryModel();
		$this->objModels->modelParameter = new ParameterModel();

		$this->request = service('request');
	}


	public function __desctruct()
	{

	}


	public function index()
	{

	}

	public function listRecords()
	{
		if(!empty($this->request->getGet('dataSend'))){
			$arrayData = json_decode($this->request->getGet('dataSend'), TRUE);

			// $arrayData = json_decode($_GET['dataSend'], TRUE);
			// print_r($arrayData);
            // $arrayData['db']['orderField'] = empty($arrayData['db']['orderField']) 
            //         ? "id" : $arrayData['db']['orderField'];
            // $arrayData['db']['typeOrder'] = empty($arrayData['db']['typeOrder']) 
            //         ? "ASC" : $arrayData['db']['typeOrder'];
            // $arrayClauses = empty($arrayData['clauses']) 
            //         ? [] : $arrayData['clauses'];
                    
            // $objResult = $this->ManagementModel->read($arrayData['db'], 
            //         array_values($arrayData['fields']), $arrayClauses);
            // $arrayResult = [];
            // foreach ($objResult->result() as $row){
            //     $arrayResult[] = $row;  
			// }


			$arrayResult = $this->objModels->modelParameter
										->getWhere(['code' => $arrayData['db']['table']])
										->getResult();;

			// print_r($arrayResult);
			
			$strCodeCountry = '';
			foreach($arrayResult as $row){
				$strCodeCountry = $row->description;
			}


			// exit;


			// $model = 'model' . ($arrayData['db']['table']);
			$model = 'model' . ucfirst($strCodeCountry);
			$arrayResult = $this->objModels->$model
											->getWhere(['active' => 1])
											->getResult();

			$arrayResult = [
                "content" => $arrayResult, 
                "error" => 0
            ];
        }else{
            $arrayResult = [
                "content" => "Datos incompletos para realizar esta solicitud", 
                "error" => 101
            ];
        }
        
        echo json_encode($arrayResult);
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
