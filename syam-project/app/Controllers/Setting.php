<?php namespace App\Controllers;

use App\Models\SettingModel;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> develop
use App\Models\CountryModel;
use App\Models\ParameterModel;


use CodeIgniter\HTTP\IncomingRequest;
<<<<<<< HEAD
>>>>>>> d75ef44... Nuevas tablas, modelos. Consumo de datos: listado general

class Setting extends BaseController
{
	private $objModels;

<<<<<<< HEAD
=======
	protected $helpers = ['url', 'form'];

	public $request;

>>>>>>> d75ef44... Nuevas tablas, modelos. Consumo de datos: listado general
=======

class Setting extends BaseController
{
	protected $helpers = ['url', 'form'];
	protected $format = 'json';
	private $objModels;
	public $request;

>>>>>>> develop

	public function __construct()
	{
		$this->objModels = new class{};
		$this->objModels->modelDepartment = new SettingModel();
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> develop
		$this->objModels->modelCountry = new CountryModel();
		$this->objModels->modelParameter = new ParameterModel();

		$this->request = service('request');
<<<<<<< HEAD
>>>>>>> d75ef44... Nuevas tablas, modelos. Consumo de datos: listado general
=======
>>>>>>> develop
	}


	public function __desctruct()
	{

	}


<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> develop
	public function index()
	{

	}

<<<<<<< HEAD
=======

>>>>>>> develop
	public function listRecords()
	{
		if(!empty($this->request->getGet('dataSend'))){
			$arrayData = json_decode($this->request->getGet('dataSend'), TRUE);
<<<<<<< HEAD

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
=======
			$strCodeCountry = $this->objModels->modelParameter
									->getTableName($arrayData['db']['table']);
			$model = 'model' . ucfirst($strCodeCountry);

			if(empty($arrayData['fields']['id'])){
				$arrayResult = $this->objModels->$model
												->getWhere(['active' => 1])
												->getResult();
			}else{
				$arrayResult = $this->objModels->$model
								->getWhere([
											'id' => $arrayData['fields']['id'],
											'active' => 1
										])
								->getResult();
			}

			$arrayResponse = [
>>>>>>> develop
                "content" => $arrayResult, 
                "error" => 0
            ];
        }else{
            $arrayResult = [
                "content" => "Datos incompletos para realizar esta solicitud", 
                "error" => 101
            ];
        }
        
<<<<<<< HEAD
        echo json_encode($arrayResult);
	}


	


>>>>>>> d75ef44... Nuevas tablas, modelos. Consumo de datos: listado general
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

=======
        echo json_encode($arrayResponse);
	}

>>>>>>> develop
}
